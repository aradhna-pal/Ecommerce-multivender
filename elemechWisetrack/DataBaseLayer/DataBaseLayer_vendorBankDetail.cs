using elemechWisetrack.Models;
using Microsoft.AspNetCore.Mvc;
using Npgsql;

namespace elemechWisetrack.DataBaseLayer
{
    public interface IDataBaseLayer_vendorBankDetail
    {
    }

    public partial interface IDataBaseLayer : IDataBaseLayer_vendorBankDetail
    {
        Task<object> AddBankDetail(string userId, [FromBody] VandorBankDetail request);
        Task<object?> GetBankDetailByUserId(string userId);
        Task<List<object>> GetVendorBankDetail();
        Task<object> UpdateBankDetail(string userEmail, int bankDetailId, VandorBankDetail request);
        Task<object> DeleteVendorBankDetail(int bankId);
    }

    public partial class DataBaseLayer
    {
        public async Task<object> AddBankDetail(string userId, VandorBankDetail request)
        {
            if (userId == null)
                return new { Success = false, Message = "Email is required" };

            if (string.IsNullOrWhiteSpace(request.BankName) ||
                string.IsNullOrWhiteSpace(request.AccountHolderName) ||
                string.IsNullOrWhiteSpace(request.AccountNumber) ||
                string.IsNullOrWhiteSpace(request.IFSCCode))
            {
                return new { Success = false, Message = "All required fields must be provided." };
            }

            try
            {
                using (var con = new NpgsqlConnection(DbConnection))
                {
                    await con.OpenAsync();

                    const string getUserQuery = @"
                SELECT ""Id""
                FROM ""AspNetUsers""
                WHERE ""Email"" = @Email
                LIMIT 1;";

                    string vendorId;
                    using (var userCmd = new NpgsqlCommand(getUserQuery, con))
                    {
                        userCmd.Parameters.AddWithValue("@Email", userId);
                        var userResult = await userCmd.ExecuteScalarAsync();
                        if (userResult == null)
                        {
                            return new { Success = false, Message = "User not found" };
                        }
                        vendorId = userResult.ToString()!;
                    }

                    const string getExistingQuery = @"
                SELECT ""Id""
                FROM ""VendorBankDetails""
                WHERE ""VendorId"" = @VendorId
                ORDER BY ""CreatedDate"" DESC
                LIMIT 1;";

                    object? existingBankId;
                    using (var existingCmd = new NpgsqlCommand(getExistingQuery, con))
                    {
                        existingCmd.Parameters.AddWithValue("@VendorId", vendorId);
                        existingBankId = await existingCmd.ExecuteScalarAsync();
                    }

                    if (existingBankId != null)
                    {
                        const string updateQuery = @"
                UPDATE ""VendorBankDetails""
                SET
                    ""BankName"" = @BankName,
                    ""AccountHolderName"" = @AccountHolderName,
                    ""AccountNumber"" = @AccountNumber,
                    ""IFSCCode"" = @IFSCCode,
                    ""BranchName"" = @BranchName,
                    ""CancelledChequeImage"" = @CancelledChequeImage,
                    ""UpdatedDate"" = CURRENT_TIMESTAMP
                WHERE ""Id"" = @Id
                  AND ""VendorId"" = @VendorId
                RETURNING ""Id"";";

                        using (var updateCmd = new NpgsqlCommand(updateQuery, con))
                        {
                            updateCmd.Parameters.AddWithValue("@Id", Convert.ToInt32(existingBankId));
                            updateCmd.Parameters.AddWithValue("@VendorId", vendorId);
                            updateCmd.Parameters.AddWithValue("@BankName", request.BankName);
                            updateCmd.Parameters.AddWithValue("@AccountHolderName", request.AccountHolderName);
                            updateCmd.Parameters.AddWithValue("@AccountNumber", request.AccountNumber);
                            updateCmd.Parameters.AddWithValue("@IFSCCode", request.IFSCCode);
                            updateCmd.Parameters.AddWithValue("@BranchName", (object?)request.BranchName ?? DBNull.Value);
                            updateCmd.Parameters.AddWithValue("@CancelledChequeImage", (object?)request.CancelledChequeImage ?? DBNull.Value);

                            var updatedId = await updateCmd.ExecuteScalarAsync();
                            return new
                            {
                                Success = true,
                                Message = "Bank details updated successfully",
                                BankDetailId = updatedId
                            };
                        }
                    }

                    string query = @"
            INSERT INTO ""VendorBankDetails""
            (
                ""VendorId"",
                ""BankName"",
                ""AccountHolderName"",
                ""AccountNumber"",
                ""IFSCCode"",
                ""BranchName"",
                ""CancelledChequeImage"",
                ""IsActive"",
                ""CreatedDate""
            )
            VALUES
            (
                @VendorId,
                @BankName,
                @AccountHolderName,
                @AccountNumber,
                @IFSCCode,
                @BranchName,
                @CancelledChequeImage,
                @IsActive,
                CURRENT_TIMESTAMP
            )
            RETURNING ""Id"";";

                    using (var cmd = new NpgsqlCommand(query, con))
                    {
                        cmd.Parameters.AddWithValue("@VendorId", vendorId);
                        cmd.Parameters.AddWithValue("@BankName", request.BankName);
                        cmd.Parameters.AddWithValue("@AccountHolderName", request.AccountHolderName);
                        cmd.Parameters.AddWithValue("@AccountNumber", request.AccountNumber);
                        cmd.Parameters.AddWithValue("@IFSCCode", request.IFSCCode);
                        cmd.Parameters.AddWithValue("@BranchName",
                            (object?)request.BranchName ?? DBNull.Value);
                        cmd.Parameters.AddWithValue("@CancelledChequeImage",
                            (object?)request.CancelledChequeImage ?? DBNull.Value);
                        cmd.Parameters.AddWithValue("@IsActive", true);

                        var insertedId = await cmd.ExecuteScalarAsync();

                        return new
                        {
                            Success = true,
                            Message = "Bank details added successfully",
                            BankDetailId = insertedId
                        };
                    }
                }
            }
            catch (Exception ex)
            {
                return new
                {
                    Success = false,
                    Message = "Error while adding bank details",
                    Error = ex.Message
                };
            }
        }

        public async Task<object?> GetBankDetailByUserId(string userId)
        {
            try
            {
                using (var con = new NpgsqlConnection(DbConnection))
                {
                    await con.OpenAsync();

                    string bankQuery = @"SELECT 
                                ""Id"",
                                ""VendorId"",
                                ""BankName"",
                                ""AccountHolderName"",
                                ""AccountNumber"",
                                ""IFSCCode"",
                                ""BranchName"",
                                ""CancelledChequeImage"",
                                ""IsActive"",
                                ""CreatedDate""
                             FROM ""VendorBankDetails""
                             WHERE ""VendorId"" = @VendorId
                             LIMIT 1;";

                    using (var cmd = new NpgsqlCommand(bankQuery, con))
                    {
                        cmd.Parameters.AddWithValue("@VendorId", userId.ToString());

                        using (var reader = await cmd.ExecuteReaderAsync())
                        {
                            if (await reader.ReadAsync())
                            {
                                return new
                                {
                                    Id = reader["Id"],
                                    VendorId = reader["VendorId"],
                                    BankName = reader["BankName"],
                                    AccountHolderName = reader["AccountHolderName"],
                                    AccountNumber = reader["AccountNumber"],
                                    IFSCCode = reader["IFSCCode"],
                                    BranchName = reader["BranchName"],
                                    CancelledChequeImage = reader["CancelledChequeImage"],
                                    IsActive = reader["IsActive"],
                                    CreatedDate = reader["CreatedDate"]
                                };
                            }
                        }
                    }
                }

                return null; // IMPORTANT
            }
            catch
            {
                throw; // let controller handle it
            }
        }

        public async Task<List<object>> GetVendorBankDetail()
        {
            var bankList = new List<object>();

            try
            {
                using (var con = new NpgsqlConnection(DbConnection))
                {
                    await con.OpenAsync();

                    string bankQuery = @"SELECT 
                        ""Id"",
                        ""VendorId"",
                        ""BankName"",
                        ""AccountHolderName"",
                        ""AccountNumber"",
                        ""IFSCCode"",
                        ""BranchName"",
                        ""CancelledChequeImage"",
                        ""IsActive"",
                        ""CreatedDate""
                     FROM ""VendorBankDetails"";";

                    using (var cmd = new NpgsqlCommand(bankQuery, con))
                    using (var reader = await cmd.ExecuteReaderAsync())
                    {
                        while (await reader.ReadAsync()) // 🔥 important change
                        {
                            bankList.Add(new
                            {
                                Id = reader["Id"],
                                VendorId = reader["VendorId"],
                                BankName = reader["BankName"],
                                AccountHolderName = reader["AccountHolderName"],
                                AccountNumber = reader["AccountNumber"],
                                IFSCCode = reader["IFSCCode"],
                                BranchName = reader["BranchName"],
                                CancelledChequeImage = reader["CancelledChequeImage"],
                                IsActive = reader["IsActive"],
                                CreatedDate = reader["CreatedDate"]
                            });
                        }
                    }
                }

                return bankList;
            }
            catch
            {
                throw;
            }
        }

        public async Task<object> UpdateBankDetail(string userEmail, int bankDetailId, VandorBankDetail request)
        {
            if (string.IsNullOrWhiteSpace(userEmail))
                return new { Success = false, Message = "User email is required" };

            if (bankDetailId <= 0)
                return new { Success = false, Message = "BankDetailId is required" };

            if (string.IsNullOrWhiteSpace(request.BankName) ||
                string.IsNullOrWhiteSpace(request.AccountHolderName) ||
                string.IsNullOrWhiteSpace(request.AccountNumber) ||
                string.IsNullOrWhiteSpace(request.IFSCCode))
            {
                return new { Success = false, Message = "All required fields must be provided." };
            }

            try
            {
                using (var con = new NpgsqlConnection(DbConnection))
                {
                    await con.OpenAsync();

                    // 🔥 STEP 1: Get UserId from AspNetUsers
                    string getUserQuery = @"
                SELECT ""Id""
                FROM ""AspNetUsers""
                WHERE ""Email"" = @Email
                LIMIT 1;";

                    Guid userId;

                    using (var userCmd = new NpgsqlCommand(getUserQuery, con))
                    {
                        userCmd.Parameters.AddWithValue("@Email", userEmail);

                        var result = await userCmd.ExecuteScalarAsync();

                        if (result == null)
                        {
                            return new
                            {
                                Success = false,
                                Message = "User not found"
                            };
                        }

                        userId = Guid.Parse(result.ToString());
                    }

                    // 🔥 STEP 2: Update VendorBankDetails
                    string updateQuery = @"
                UPDATE ""VendorBankDetails""
                SET
                    ""BankName"" = @BankName,
                    ""AccountHolderName"" = @AccountHolderName,
                    ""AccountNumber"" = @AccountNumber,
                    ""IFSCCode"" = @IFSCCode,
                    ""BranchName"" = @BranchName,
                    ""CancelledChequeImage"" = @CancelledChequeImage
                WHERE ""Id"" = @Id
                AND ""VendorId"" = @VendorId
                RETURNING ""Id"";";

                    using (var cmd = new NpgsqlCommand(updateQuery, con))
                    {
                        cmd.Parameters.AddWithValue("@Id", bankDetailId);

                        // ✅ IMPORTANT FIX (UUID/VARCHAR mismatch solved)
                        cmd.Parameters.AddWithValue("@VendorId", userId.ToString());

                        cmd.Parameters.AddWithValue("@BankName", request.BankName);
                        cmd.Parameters.AddWithValue("@AccountHolderName", request.AccountHolderName);
                        cmd.Parameters.AddWithValue("@AccountNumber", request.AccountNumber);
                        cmd.Parameters.AddWithValue("@IFSCCode", request.IFSCCode);
                        cmd.Parameters.AddWithValue("@BranchName",
                            (object?)request.BranchName ?? DBNull.Value);
                        cmd.Parameters.AddWithValue("@CancelledChequeImage",
                            (object?)request.CancelledChequeImage ?? DBNull.Value);

                        var updatedId = await cmd.ExecuteScalarAsync();

                        if (updatedId == null)
                        {
                            return new
                            {
                                Success = false,
                                Message = "Bank detail not found or not authorized"
                            };
                        }

                        return new
                        {
                            Success = true,
                            Message = "Bank details updated successfully",
                            BankDetailId = updatedId
                        };
                    }
                }
            }
            catch (Exception ex)
            {
                return new
                {
                    Success = false,
                    Message = "Error while updating bank details",
                    Error = ex.Message
                };
            }
        }

        public async Task<object> DeleteVendorBankDetail(int bankId)
        {
            if (bankId <= 0)
                return new { Success = false, Message = "BankId is required" };

            try
            {
                using (var con = new NpgsqlConnection(DbConnection))
                {
                    await con.OpenAsync();

                    string deleteQuery = @"
                DELETE FROM ""VendorBankDetails""
                WHERE ""Id"" = @Id
                RETURNING ""Id"";";

                    using (var cmd = new NpgsqlCommand(deleteQuery, con))
                    {
                        cmd.Parameters.AddWithValue("@Id", bankId);

                        var deletedId = await cmd.ExecuteScalarAsync();

                        if (deletedId == null)
                        {
                            return new
                            {
                                Success = false,
                                Message = "Bank detail not found"
                            };
                        }

                        return new
                        {
                            Success = true,
                            Message = "Bank detail deleted successfully",
                            BankDetailId = deletedId
                        };
                    }
                }
            }
            catch (Exception ex)
            {
                return new
                {
                    Success = false,
                    Message = "Error while deleting bank detail",
                    Error = ex.Message
                };
            }
        }



    }
}
