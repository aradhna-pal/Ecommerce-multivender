using elemechWisetrack.Models;
using Microsoft.AspNetCore.Mvc;
using Npgsql;

namespace elemechWisetrack.DataBaseLayer
{
    public interface IDataBaseLayer_VendorBusiness
    {
        Task<object> AddVendorBusinessDetail(string userEmail, VendorBusinessDetails request);
        Task<object> GetVendorBusinessDetail();
        Task<object> GetVendorBusinessDatailByEmail(string userEmail);
        Task<object> UpdateVendorBusinessDetail(Guid busiDetailId, string userEmail, [FromBody] VendorBusinessDetails request);
        Task<object> DeleteVendorBusinessDetail(Guid busiDetailId);
    }

    public partial interface IDataBaseLayer : IDataBaseLayer_VendorBusiness { }

    public partial class DataBaseLayer
    {
        public async Task<object> AddVendorBusinessDetail(string userEmail, VendorBusinessDetails request)
        {
            try
            {
                using (var conn = new NpgsqlConnection(DbConnection))
                {
                    await conn.OpenAsync();

                    // ✅ 1. Get VendorId using Email
                    string getUserQuery = @"SELECT ""Id"" 
                                    FROM ""AspNetUsers"" 
                                    WHERE ""Email"" = @Email 
                                    LIMIT 1;";

                    Guid vendorId;
                    string vendorIdText;

                    using (var userCmd = new NpgsqlCommand(getUserQuery, conn))
                    {
                        userCmd.Parameters.AddWithValue("@Email", userEmail);

                        var result = await userCmd.ExecuteScalarAsync();
                        if (result == null)
                        {
                            return new
                            {
                                Status = false,
                                Message = "User not found."
                            };
                        }

                        vendorIdText = result.ToString() ?? string.Empty;
                        if (!Guid.TryParse(vendorIdText, out vendorId))
                        {
                            return new
                            {
                                Status = false,
                                Message = "Invalid vendor id format."
                            };
                        }
                    }

                    // ✅ 2. Upsert Business Detail by VendorId
                    const string existingQuery = @"
            SELECT ""Id""
            FROM ""VendorBusinessDetails""
            WHERE ""VendorId"" = @VendorId
            ORDER BY ""CreatedAt"" DESC
            LIMIT 1;";

                    object? existingBusinessId = null;
                    using (var existingCmd = new NpgsqlCommand(existingQuery, conn))
                    {
                        existingCmd.Parameters.AddWithValue("@VendorId", vendorId);
                        existingBusinessId = await existingCmd.ExecuteScalarAsync();
                    }

                    if (existingBusinessId != null)
                    {
                        string updateQuery = @"
            UPDATE ""VendorBusinessDetails""
            SET
                ""BusinessName"" = @BusinessName,
                ""BusinessType"" = @BusinessType,
                ""BusinessCategory"" = @BusinessCategory,
                ""BusinessDescription"" = @BusinessDescription,
                ""GSTNumber"" = @GSTNumber,
                ""PANNumber"" = @PANNumber,
                ""CINNumber"" = @CINNumber,
                ""UdyamRegistrationNumber"" = @UdyamRegistrationNumber,
                ""AddressLine1"" = @AddressLine1,
                ""AddressLine2"" = @AddressLine2,
                ""City"" = @City,
                ""State"" = @State,
                ""Country"" = @Country,
                ""Pincode"" = @Pincode,
                ""BusinessEmail"" = @BusinessEmail,
                ""BusinessPhone"" = @BusinessPhone,
                ""AlternatePhone"" = @AlternatePhone,
                ""WebsiteUrl"" = @WebsiteUrl,
                ""GSTDocumentUrl"" = @GSTDocumentUrl,
                ""PANDocumentUrl"" = @PANDocumentUrl,
                ""CINCertificateUrl"" = @CINCertificateUrl,
                ""AadharDocumentUrl"" = @AadharDocumentUrl,
                ""AddressProofImageUrl"" = @AddressProofImageUrl,
                ""BusinessLogoUrl"" = @BusinessLogoUrl,
                ""UpdatedAt"" = @UpdatedAt
            WHERE ""Id"" = @Id
              AND ""VendorId"" = @VendorId;";

                        using (var cmd = new NpgsqlCommand(updateQuery, conn))
                        {
                            cmd.Parameters.AddWithValue("@Id", Guid.Parse(existingBusinessId.ToString()!));
                            cmd.Parameters.AddWithValue("@VendorId", vendorId);
                            cmd.Parameters.AddWithValue("@BusinessName", request.BusinessName ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@BusinessType", request.BusinessType ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@BusinessCategory", request.BusinessCategory ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@BusinessDescription", request.BusinessDescription ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@GSTNumber", request.GSTNumber ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@PANNumber", request.PANNumber ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@CINNumber", request.CINNumber ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@UdyamRegistrationNumber", request.UdyamRegistrationNumber ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@AddressLine1", request.AddressLine1);
                            cmd.Parameters.AddWithValue("@AddressLine2", request.AddressLine2 ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@City", request.City);
                            cmd.Parameters.AddWithValue("@State", request.State);
                            cmd.Parameters.AddWithValue("@Country", request.Country ?? "India");
                            cmd.Parameters.AddWithValue("@Pincode", request.Pincode);
                            cmd.Parameters.AddWithValue("@BusinessEmail", request.BusinessEmail ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@BusinessPhone", request.BusinessPhone ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@AlternatePhone", request.AlternatePhone ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@WebsiteUrl", request.WebsiteUrl ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@GSTDocumentUrl", request.GSTDocumentUrl ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@PANDocumentUrl", request.PANDocumentUrl ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@CINCertificateUrl", request.CINCertificateUrl ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@AadharDocumentUrl", request.AadharDocumentUrl ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@AddressProofImageUrl", request.AddressProofImageUrl ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@BusinessLogoUrl", request.BusinessLogoUrl ?? (object)DBNull.Value);
                            cmd.Parameters.AddWithValue("@UpdatedAt", DateTime.UtcNow);
                            await cmd.ExecuteNonQueryAsync();
                        }

                        return new
                        {
                            Status = true,
                            Message = "Vendor business detail updated successfully."
                        };
                    }

                    string insertQuery = @"
            INSERT INTO ""VendorBusinessDetails""(
                ""VendorId"",
                ""BusinessName"",
                ""BusinessType"",
                ""BusinessCategory"",
                ""BusinessDescription"",
                ""GSTNumber"",
                ""PANNumber"",
                ""CINNumber"",
                ""UdyamRegistrationNumber"",
                ""AddressLine1"",
                ""AddressLine2"",
                ""City"",
                ""State"",
                ""Country"",
                ""Pincode"",
                ""BusinessEmail"",
                ""BusinessPhone"",
                ""AlternatePhone"",
                ""WebsiteUrl"",
                ""GSTDocumentUrl"",
                ""PANDocumentUrl"",
                ""CINCertificateUrl"",
                ""AadharDocumentUrl"",
                ""AddressProofImageUrl"",
                ""BusinessLogoUrl""
            )
            VALUES (
                @VendorId,
                @BusinessName,
                @BusinessType,
                @BusinessCategory,
                @BusinessDescription,
                @GSTNumber,
                @PANNumber,
                @CINNumber,
                @UdyamRegistrationNumber,
                @AddressLine1,
                @AddressLine2,
                @City,
                @State,
                @Country,
                @Pincode,
                @BusinessEmail,
                @BusinessPhone,
                @AlternatePhone,
                @WebsiteUrl,
                @GSTDocumentUrl,
                @PANDocumentUrl,
                @CINCertificateUrl,
                @AadharDocumentUrl,
                @AddressProofImageUrl,
                @BusinessLogoUrl
            );";

                    using (var cmd = new NpgsqlCommand(insertQuery, conn))
                    {
                        cmd.Parameters.AddWithValue("@VendorId", vendorId);
                        cmd.Parameters.AddWithValue("@BusinessName", request.BusinessName ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@BusinessType", request.BusinessType ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@BusinessCategory", request.BusinessCategory ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@BusinessDescription", request.BusinessDescription ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@GSTNumber", request.GSTNumber ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@PANNumber", request.PANNumber ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@CINNumber", request.CINNumber ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@UdyamRegistrationNumber", request.UdyamRegistrationNumber ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@AddressLine1", request.AddressLine1);
                        cmd.Parameters.AddWithValue("@AddressLine2", request.AddressLine2 ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@City", request.City);
                        cmd.Parameters.AddWithValue("@State", request.State);
                        cmd.Parameters.AddWithValue("@Country", request.Country ?? "India");
                        cmd.Parameters.AddWithValue("@Pincode", request.Pincode);
                        cmd.Parameters.AddWithValue("@BusinessEmail", request.BusinessEmail ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@BusinessPhone", request.BusinessPhone ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@AlternatePhone", request.AlternatePhone ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@WebsiteUrl", request.WebsiteUrl ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@GSTDocumentUrl", request.GSTDocumentUrl ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@PANDocumentUrl", request.PANDocumentUrl ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@CINCertificateUrl", request.CINCertificateUrl ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@AadharDocumentUrl", request.AadharDocumentUrl ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@AddressProofImageUrl", request.AddressProofImageUrl ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@BusinessLogoUrl", request.BusinessLogoUrl ?? (object)DBNull.Value);

                        await cmd.ExecuteNonQueryAsync();
                    }

                    return new
                    {
                        Status = true,
                        Message = "Vendor business detail added successfully."
                    };
                }
            }
            catch (Exception ex)
            {
                return new
                {
                    Status = false,
                    Message = "Error occurred.",
                    Error = ex.Message
                };
            }
        }

        public async Task<object> GetVendorBusinessDetail()
        {
            try
            {
                using (var conn = new NpgsqlConnection(DbConnection))
                {
                    await conn.OpenAsync();

                    string query = @"SELECT *
                             FROM ""VendorBusinessDetails""
                             ORDER BY ""CreatedAt"" DESC;";

                    using (var cmd = new NpgsqlCommand(query, conn))
                    using (var reader = await cmd.ExecuteReaderAsync())
                    {
                        var list = new List<object>();

                        while (await reader.ReadAsync())
                        {
                            list.Add(new
                            {
                                Id = reader["Id"],
                                VendorId = reader["VendorId"],
                                BusinessName = reader["BusinessName"],
                                BusinessType = reader["BusinessType"],
                                BusinessCategory = reader["BusinessCategory"],
                                BusinessDescription = reader["BusinessDescription"],
                                GSTNumber = reader["GSTNumber"],
                                PANNumber = reader["PANNumber"],
                                CINNumber = reader["CINNumber"],
                                UdyamRegistrationNumber = reader["UdyamRegistrationNumber"],
                                AddressLine1 = reader["AddressLine1"],
                                AddressLine2 = reader["AddressLine2"],
                                City = reader["City"],
                                State = reader["State"],
                                Country = reader["Country"],
                                Pincode = reader["Pincode"],
                                BusinessEmail = reader["BusinessEmail"],
                                BusinessPhone = reader["BusinessPhone"],
                                AlternatePhone = reader["AlternatePhone"],
                                WebsiteUrl = reader["WebsiteUrl"],
                                GSTDocumentUrl = reader["GSTDocumentUrl"],
                                PANDocumentUrl = reader["PANDocumentUrl"],
                                CINCertificateUrl = reader["CINCertificateUrl"],
                                AadharDocumentUrl = reader["AadharDocumentUrl"],
                                AddressProofImageUrl = reader["AddressProofImageUrl"],
                                BusinessLogoUrl = reader["BusinessLogoUrl"],
                                IsVerified = reader["IsVerified"],
                                IsActive = reader["IsActive"],
                                CreatedAt = reader["CreatedAt"],
                                UpdatedAt = reader["UpdatedAt"]
                            });
                        }

                        return new
                        {
                            Status = true,
                            Count = list.Count,
                            Data = list
                        };
                    }
                }
            }
            catch (Exception ex)
            {
                return new
                {
                    Status = false,
                    Message = "Error occurred",
                    Error = ex.Message
                };
            }
        }

        public async Task<object> GetVendorBusinessDatailByEmail(string userEmail)
        {
            try
            {
                using (var conn = new NpgsqlConnection(DbConnection))
                {
                    await conn.OpenAsync();

                    // 1️⃣ Get VendorId using Email
                    string getUserQuery = @"
                SELECT ""Id""
                FROM ""AspNetUsers""
                WHERE ""Email"" = @Email
                LIMIT 1;";

                    Guid vendorId;
                    string vendorIdText;

                    using (var userCmd = new NpgsqlCommand(getUserQuery, conn))
                    {
                        userCmd.Parameters.AddWithValue("@Email", userEmail);
                        var result = await userCmd.ExecuteScalarAsync();

                        if (result == null)
                        {
                            return new
                            {
                                Status = false,
                                Message = "User not found"
                            };
                        }

                        vendorIdText = result.ToString() ?? string.Empty;
                        if (!Guid.TryParse(vendorIdText, out vendorId))
                        {
                            return new
                            {
                                Status = false,
                                Message = "Invalid vendor id format."
                            };
                        }
                    }

                    string? vendorStatus = null;
                    string? adminReviewMessage = null;
                    string? reviewedBy = null;
                    object? reviewedAt = null;

                    const string getReviewQuery = @"
                SELECT ""Status"", ""RejectionReason"", ""ApprovedBy"", ""ApprovedAt""
                FROM ""AspNetUsers""
                WHERE ""Id"" = @VendorId
                LIMIT 1;";

                    using (var reviewCmd = new NpgsqlCommand(getReviewQuery, conn))
                    {
                        reviewCmd.Parameters.AddWithValue("@VendorId", vendorIdText);
                        using var reviewReader = await reviewCmd.ExecuteReaderAsync();
                        if (await reviewReader.ReadAsync())
                        {
                            vendorStatus = reviewReader["Status"]?.ToString();
                            adminReviewMessage = reviewReader["RejectionReason"]?.ToString();
                            reviewedBy = reviewReader["ApprovedBy"]?.ToString();
                            reviewedAt = reviewReader["ApprovedAt"] == DBNull.Value ? null : reviewReader["ApprovedAt"];
                        }
                    }

                    // 2️⃣ Get Business Details
                    string getQuery = @"
                SELECT *
                FROM ""VendorBusinessDetails""
                WHERE ""VendorId""::text = @VendorId
                LIMIT 1;";

                    using (var cmd = new NpgsqlCommand(getQuery, conn))
                    {
                        cmd.Parameters.AddWithValue("@VendorId", vendorIdText);

                        using (var reader = await cmd.ExecuteReaderAsync())
                        {
                            if (!reader.HasRows)
                            {
                                return new
                                {
                                    Status = false,
                                    Message = "No business details found"
                                };
                            }

                            await reader.ReadAsync();

                            return new
                            {
                                Status = true,
                                Data = new
                                {
                                    Id = reader["Id"],
                                    VendorId = reader["VendorId"],
                                    BusinessName = reader["BusinessName"],
                                    BusinessType = reader["BusinessType"],
                                    BusinessCategory = reader["BusinessCategory"],
                                    BusinessDescription = reader["BusinessDescription"],
                                    GSTNumber = reader["GSTNumber"],
                                    PANNumber = reader["PANNumber"],
                                    CINNumber = reader["CINNumber"],
                                    UdyamRegistrationNumber = reader["UdyamRegistrationNumber"],
                                    AddressLine1 = reader["AddressLine1"],
                                    AddressLine2 = reader["AddressLine2"],
                                    City = reader["City"],
                                    State = reader["State"],
                                    Country = reader["Country"],
                                    Pincode = reader["Pincode"],
                                    BusinessEmail = reader["BusinessEmail"],
                                    BusinessPhone = reader["BusinessPhone"],
                                    AlternatePhone = reader["AlternatePhone"],
                                    WebsiteUrl = reader["WebsiteUrl"],
                                    GSTDocumentUrl = reader["GSTDocumentUrl"],
                                    PANDocumentUrl = reader["PANDocumentUrl"],
                                    CINCertificateUrl = reader["CINCertificateUrl"],
                                    AadharDocumentUrl = reader["AadharDocumentUrl"],
                                    AddressProofImageUrl = reader["AddressProofImageUrl"],
                                    BusinessLogoUrl = reader["BusinessLogoUrl"],
                                    IsVerified = reader["IsVerified"],
                                    IsActive = reader["IsActive"],
                                    CreatedAt = reader["CreatedAt"],
                                    UpdatedAt = reader["UpdatedAt"],
                                    VendorStatus = vendorStatus,
                                    AdminReviewMessage = adminReviewMessage,
                                    ReviewedBy = reviewedBy,
                                    ReviewedAt = reviewedAt
                                }
                            };
                        }
                    }
                }
            }
            catch (Exception ex)
            {
                return new
                {
                    Status = false,
                    Message = "Error occurred",
                    Error = ex.Message
                };
            }
        }

        public async Task<object> UpdateVendorBusinessDetail(
    Guid busiDetailId,
    string userEmail,
    VendorBusinessDetails request)
        {
            try
            {
                using (var conn = new NpgsqlConnection(DbConnection))
                {
                    await conn.OpenAsync();

                    // 🔹 1. Get VendorId from AspNetUsers
                    string getUserQuery = @"
                SELECT ""Id""
                FROM ""AspNetUsers""
                WHERE ""Email"" = @Email
                LIMIT 1;";

                    Guid vendorId;

                    using (var userCmd = new NpgsqlCommand(getUserQuery, conn))
                    {
                        userCmd.Parameters.AddWithValue("@Email", userEmail);

                        var result = await userCmd.ExecuteScalarAsync();
                        if (result == null)
                        {
                            return new { Status = false, Message = "User not found" };
                        }

                        if (!Guid.TryParse(result.ToString(), out vendorId))
                        {
                            return new { Status = false, Message = "Invalid vendor id format." };
                        }
                    }

                    // 🔹 2. Update only if record belongs to this vendor
                    string updateQuery = @"
                UPDATE ""VendorBusinessDetails""
                SET
                    ""BusinessName"" = @BusinessName,
                    ""BusinessType"" = @BusinessType,
                    ""BusinessCategory"" = @BusinessCategory,
                    ""BusinessDescription"" = @BusinessDescription,
                    ""GSTNumber"" = @GSTNumber,
                    ""PANNumber"" = @PANNumber,
                    ""CINNumber"" = @CINNumber,
                    ""UdyamRegistrationNumber"" = @UdyamRegistrationNumber,
                    ""AddressLine1"" = @AddressLine1,
                    ""AddressLine2"" = @AddressLine2,
                    ""City"" = @City,
                    ""State"" = @State,
                    ""Country"" = @Country,
                    ""Pincode"" = @Pincode,
                    ""BusinessEmail"" = @BusinessEmail,
                    ""BusinessPhone"" = @BusinessPhone,
                    ""AlternatePhone"" = @AlternatePhone,
                    ""WebsiteUrl"" = @WebsiteUrl,
                    ""GSTDocumentUrl"" = @GSTDocumentUrl,
                    ""PANDocumentUrl"" = @PANDocumentUrl,
                    ""CINCertificateUrl"" = @CINCertificateUrl,
                    ""AadharDocumentUrl"" = @AadharDocumentUrl,
                    ""AddressProofImageUrl"" = @AddressProofImageUrl,
                    ""BusinessLogoUrl"" = @BusinessLogoUrl,
                    ""UpdatedAt"" = @UpdatedAt
                WHERE ""Id"" = @Id
                AND ""VendorId"" = @VendorId;";

                    using (var cmd = new NpgsqlCommand(updateQuery, conn))
                    {
                        cmd.Parameters.AddWithValue("@Id", busiDetailId);
                        cmd.Parameters.AddWithValue("@VendorId", vendorId);

                        cmd.Parameters.AddWithValue("@BusinessName", request.BusinessName ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@BusinessType", request.BusinessType ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@BusinessCategory", request.BusinessCategory ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@BusinessDescription", request.BusinessDescription ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@GSTNumber", request.GSTNumber ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@PANNumber", request.PANNumber ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@CINNumber", request.CINNumber ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@UdyamRegistrationNumber", request.UdyamRegistrationNumber ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@AddressLine1", request.AddressLine1 ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@AddressLine2", request.AddressLine2 ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@City", request.City ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@State", request.State ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@Country", request.Country ?? "India");
                        cmd.Parameters.AddWithValue("@Pincode", request.Pincode ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@BusinessEmail", request.BusinessEmail ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@BusinessPhone", request.BusinessPhone ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@AlternatePhone", request.AlternatePhone ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@WebsiteUrl", request.WebsiteUrl ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@GSTDocumentUrl", request.GSTDocumentUrl ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@PANDocumentUrl", request.PANDocumentUrl ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@CINCertificateUrl", request.CINCertificateUrl ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@AadharDocumentUrl", request.AadharDocumentUrl ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@AddressProofImageUrl", request.AddressProofImageUrl ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@BusinessLogoUrl", request.BusinessLogoUrl ?? (object)DBNull.Value);
                        cmd.Parameters.AddWithValue("@UpdatedAt", DateTime.UtcNow);

                        int rowsAffected = await cmd.ExecuteNonQueryAsync();

                        if (rowsAffected == 0)
                        {
                            return new
                            {
                                Status = false,
                                Message = "Update failed or record not found"
                            };
                        }
                    }

                    return new
                    {
                        Status = true,
                        Message = "Vendor business detail updated successfully"
                    };
                }
            }
            catch (Exception ex)
            {
                return new
                {
                    Status = false,
                    Message = "Error occurred",
                    Error = ex.Message
                };
            }
        }

        public async Task<object> DeleteVendorBusinessDetail(Guid busiDetailId)
        {
            try
            {
                using (var conn = new NpgsqlConnection(DbConnection))
                {
                    await conn.OpenAsync();

                    string deleteQuery = @"
                DELETE FROM ""VendorBusinessDetails""
                WHERE ""Id"" = @Id;";

                    using (var cmd = new NpgsqlCommand(deleteQuery, conn))
                    {
                        cmd.Parameters.AddWithValue("@Id", busiDetailId);

                        int rowsAffected = await cmd.ExecuteNonQueryAsync();

                        if (rowsAffected == 0)
                        {
                            return new
                            {
                                Status = false,
                                Message = "Record not found"
                            };
                        }
                    }

                    return new
                    {
                        Status = true,
                        Message = "Vendor business detail deleted successfully"
                    };
                }
            }
            catch (Exception ex)
            {
                return new
                {
                    Status = false,
                    Message = "Error occurred",
                    Error = ex.Message
                };
            }
        }



    }
}
