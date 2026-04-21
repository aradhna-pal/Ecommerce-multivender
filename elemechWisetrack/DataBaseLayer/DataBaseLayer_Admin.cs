using Npgsql;
using elemechWisetrack.Models;

namespace elemechWisetrack.DataBaseLayer
{
    public interface IDataBaseLayer_Admin
    {
        Task<object> ApproveVendor(string userId, string adminEmail);
        Task<object> RejectVendor(string userId, string adminEmail, string reason);
        Task<object> GetAllVendors();
        Task<object> GetAllUsersByRole();
        Task<object> AddVendorReviewRemark(string userId, string adminEmail, string message);
        Task<object> GetVendorDetailsById(string userId);
        Task<object> GetVendorProfileByEmail(string userEmail);
        Task<object> UpdateVendorProfileByEmail(string userEmail, VendorProfileUpdateRequest request);

    }

    public partial interface IDataBaseLayer : IDataBaseLayer_Admin { }

    public partial class DataBaseLayer
    {
        public async Task<object> ApproveVendor(string userId, string adminEmail)
        {
            try
            {
                using (var conn = new NpgsqlConnection(DbConnection))
                {
                    await conn.OpenAsync();

                    string query = @"
                UPDATE ""AspNetUsers""
                SET 
                    ""Status"" = @status,
                    ""ApprovedBy"" = @approvedBy,
                    ""ApprovedAt"" = @approvedAt
                WHERE ""Id"" = @userId
            ";

                    using (var cmd = new NpgsqlCommand(query, conn))
                    {
                        cmd.Parameters.AddWithValue("@status", "approved");
                        cmd.Parameters.AddWithValue("@approvedBy", (object?)adminEmail ?? DBNull.Value);
                        cmd.Parameters.AddWithValue("@approvedAt", DateTime.UtcNow);
                        cmd.Parameters.AddWithValue("@userId", userId);

                        int rows = await cmd.ExecuteNonQueryAsync();

                        if (rows == 0)
                        {
                            return new { success = false, message = "Vendor not found" };
                        }
                    }
                }

                return new { success = true, message = "Vendor approved successfully" };
            }
            catch (Exception ex)
            {
                return new
                {
                    success = false,
                    message = ex.InnerException?.Message ?? ex.Message
                };
            }
        }

        public async Task<object> RejectVendor(string userId, string adminEmail, string reason)
        {
            try
            {
                using (var conn = new NpgsqlConnection(DbConnection))
                {
                    await conn.OpenAsync();

                    string query = @"
                UPDATE ""AspNetUsers""
                SET 
                    ""Status"" = @status,
                    ""ApprovedBy"" = @approvedBy,
                    ""ApprovedAt"" = @approvedAt,
                    ""RejectionReason"" = @reason
                WHERE ""Id"" = @userId
            ";

                    using (var cmd = new NpgsqlCommand(query, conn))
                    {
                        cmd.Parameters.AddWithValue("@status", "rejected");
                        cmd.Parameters.AddWithValue("@approvedBy", (object?)adminEmail ?? DBNull.Value);
                        cmd.Parameters.AddWithValue("@approvedAt", DateTime.UtcNow);
                        cmd.Parameters.AddWithValue("@reason", (object?)reason ?? DBNull.Value);
                        cmd.Parameters.AddWithValue("@userId", userId);

                        int rows = await cmd.ExecuteNonQueryAsync();

                        if (rows == 0)
                        {
                            return new { success = false, message = "Vendor not found" };
                        }
                    }
                }

                return new { success = true, message = "Vendor rejected successfully" };
            }
            catch (Exception ex)
            {
                return new
                {
                    success = false,
                    message = ex.InnerException?.Message ?? ex.Message
                };
            }
        }

        public async Task<object> GetAllVendors()
        {
            try
            {
                using (var conn = new NpgsqlConnection(DbConnection))
                {
                    await conn.OpenAsync();

                    string query = @"
                SELECT 
                    ""Id"",
                    ""Email"",
                    ""UserName"",
                    ""FirstName"",
                    ""LastName"",
                    ""PhoneNumber"",
                    ""IsActive"",
                    ""CreateDate"",
                    ""ProfileImage"",
                    ""AccessKey"",
                    ""Lastotp"",
                    ""PasswordChangeTime"",
                    ""PasswordChangeBy"",
                    ""OrgId"",
                    ""userType"",
                    ""signupsource"",
                    ""sourcetype"",
                    ""address"",
                    ""IsVendor"",
                    ""Status"",
                    ""ApprovedBy"",
                    ""ApprovedAt"",
                    ""RejectionReason""
                FROM ""AspNetUsers""
                WHERE ""sourcetype"" = 'vendor'
                ORDER BY ""CreateDate"" DESC
            ";

                    using (var cmd = new NpgsqlCommand(query, conn))
                    using (var reader = await cmd.ExecuteReaderAsync())
                    {
                        var list = new List<object>();

                        while (await reader.ReadAsync())
                        {
                            list.Add(new
                            {
                                Id = reader["Id"]?.ToString(),
                                Email = reader["Email"]?.ToString(),
                                UserName = reader["UserName"]?.ToString(),
                                FirstName = reader["FirstName"]?.ToString(),
                                LastName = reader["LastName"]?.ToString(),
                                PhoneNumber = reader["PhoneNumber"]?.ToString(),
                                ProfileImage = reader["ProfileImage"]?.ToString(),

                                IsActive = reader["IsActive"] != DBNull.Value && (bool)reader["IsActive"],
                                CreateDate = reader["CreateDate"] == DBNull.Value ? null : reader["CreateDate"],

                                AccessKey = reader["AccessKey"]?.ToString(),
                                Lastotp = reader["Lastotp"]?.ToString(),

                                PasswordChangeTime = reader["PasswordChangeTime"] == DBNull.Value ? null : reader["PasswordChangeTime"],
                                PasswordChangeBy = reader["PasswordChangeBy"]?.ToString(),

                                OrgId = reader["OrgId"]?.ToString(),
                                UserType = reader["userType"] == DBNull.Value ? null : reader["userType"],

                                SignupSource = reader["signupsource"]?.ToString(),
                                SourceType = reader["sourcetype"]?.ToString(),

                                Address = reader["address"]?.ToString(),

                                IsVendor = reader["IsVendor"] != DBNull.Value && (bool)reader["IsVendor"],
                                Status = reader["Status"]?.ToString(),

                                ApprovedBy = reader["ApprovedBy"]?.ToString(),
                                ApprovedAt = reader["ApprovedAt"] == DBNull.Value ? null : reader["ApprovedAt"],

                                RejectionReason = reader["RejectionReason"]?.ToString()
                            });
                        }

                        return new
                        {
                            success = true,
                            count = list.Count,
                            data = list
                        };
                    }
                }
            }
            catch (Exception ex)
            {
                return new
                {
                    success = false,
                    message = ex.InnerException?.Message ?? ex.Message
                };
            }
        }
        public async Task<object> GetAllUsersByRole()
        {
            try
            {
                using (var conn = new NpgsqlConnection(DbConnection))
                {
                    await conn.OpenAsync();

                    string query = @"
                SELECT 
                    u.""Id"",
                    u.""Email"",
                    u.""UserName"",
                    u.""FirstName"",
                    u.""LastName"",
                    u.""PhoneNumber"",
                    u.""IsActive"",
                    u.""CreateDate"",
                    r.""Name"" AS ""RoleName""
                FROM ""AspNetUsers"" u
                INNER JOIN ""AspNetUserRoles"" ur ON u.""Id"" = ur.""UserId""
                INNER JOIN ""AspNetRoles"" r ON ur.""RoleId"" = r.""Id""
                WHERE r.""Name"" = @role
                ORDER BY u.""CreateDate"" DESC
            ";

                    using (var cmd = new NpgsqlCommand(query, conn))
                    {
                        cmd.Parameters.AddWithValue("@role", "USER");

                        using (var reader = await cmd.ExecuteReaderAsync())
                        {
                            var list = new List<object>();

                            while (await reader.ReadAsync())
                            {
                                list.Add(new
                                {
                                    Id = reader["Id"]?.ToString(),
                                    Email = reader["Email"]?.ToString(),
                                    UserName = reader["UserName"]?.ToString(),
                                    FirstName = reader["FirstName"]?.ToString(),
                                    LastName = reader["LastName"]?.ToString(),
                                    PhoneNumber = reader["PhoneNumber"]?.ToString(),
                                    IsActive = reader["IsActive"] != DBNull.Value && (bool)reader["IsActive"],
                                    CreateDate = reader["CreateDate"] == DBNull.Value ? null : reader["CreateDate"],
                                    Role = reader["RoleName"]?.ToString()
                                });
                            }

                            return new
                            {
                                success = true,
                                count = list.Count,
                                data = list
                            };
                        }
                    }
                }
            }
            catch (Exception ex)
            {
                return new
                {
                    success = false,
                    message = ex.InnerException?.Message ?? ex.Message
                };
            }
        }

        public async Task<object> AddVendorReviewRemark(string userId, string adminEmail, string message)
        {
            if (string.IsNullOrWhiteSpace(userId))
                return new { success = false, message = "Vendor id is required" };

            if (string.IsNullOrWhiteSpace(message))
                return new { success = false, message = "Review message is required" };

            try
            {
                using var conn = new NpgsqlConnection(DbConnection);
                await conn.OpenAsync();

                const string query = @"
                UPDATE ""AspNetUsers""
                SET
                    ""Status"" = @status,
                    ""RejectionReason"" = @message,
                    ""ApprovedBy"" = @adminEmail,
                    ""ApprovedAt"" = @approvedAt
                WHERE ""Id"" = @userId
                  AND ""IsVendor"" = true;";

                using var cmd = new NpgsqlCommand(query, conn);
                cmd.Parameters.AddWithValue("@status", "changes_requested");
                cmd.Parameters.AddWithValue("@message", message);
                cmd.Parameters.AddWithValue("@adminEmail", (object?)adminEmail ?? DBNull.Value);
                cmd.Parameters.AddWithValue("@approvedAt", DateTime.UtcNow);
                cmd.Parameters.AddWithValue("@userId", userId);

                int rows = await cmd.ExecuteNonQueryAsync();
                if (rows == 0)
                    return new { success = false, message = "Vendor not found" };

                return new { success = true, message = "Review message saved successfully" };
            }
            catch (Exception ex)
            {
                return new
                {
                    success = false,
                    message = ex.InnerException?.Message ?? ex.Message
                };
            }
        }

        public async Task<object> GetVendorDetailsById(string userId)
        {
            if (string.IsNullOrWhiteSpace(userId))
                return new { success = false, message = "Vendor id is required" };

            try
            {
                using var conn = new NpgsqlConnection(DbConnection);
                await conn.OpenAsync();

                object? vendorUser = null;
                object? business = null;
                object? bank = null;

                const string vendorQuery = @"
                SELECT
                    ""Id"", ""Email"", ""UserName"", ""FirstName"", ""LastName"",
                    ""PhoneNumber"", ""IsActive"", ""CreateDate"", ""IsVendor"", ""ProfileImage"",
                    ""Status"", ""ApprovedBy"", ""ApprovedAt"", ""RejectionReason""
                FROM ""AspNetUsers""
                WHERE ""Id"" = @userId
                  AND ""IsVendor"" = true
                LIMIT 1;";

                using (var vendorCmd = new NpgsqlCommand(vendorQuery, conn))
                {
                    vendorCmd.Parameters.AddWithValue("@userId", userId);
                    using var reader = await vendorCmd.ExecuteReaderAsync();
                    if (!await reader.ReadAsync())
                        return new { success = false, message = "Vendor not found" };

                    vendorUser = new
                    {
                        Id = reader["Id"]?.ToString(),
                        Email = reader["Email"]?.ToString(),
                        UserName = reader["UserName"]?.ToString(),
                        FirstName = reader["FirstName"]?.ToString(),
                        LastName = reader["LastName"]?.ToString(),
                        PhoneNumber = reader["PhoneNumber"]?.ToString(),
                        ProfileImage = reader["ProfileImage"]?.ToString(),
                        IsActive = reader["IsActive"],
                        CreateDate = reader["CreateDate"] == DBNull.Value ? null : reader["CreateDate"],
                        IsVendor = reader["IsVendor"],
                        Status = reader["Status"]?.ToString(),
                        ApprovedBy = reader["ApprovedBy"]?.ToString(),
                        ApprovedAt = reader["ApprovedAt"] == DBNull.Value ? null : reader["ApprovedAt"],
                        ReviewMessage = reader["RejectionReason"]?.ToString()
                    };
                }

                const string businessQuery = @"
                SELECT *
                FROM ""VendorBusinessDetails""
                WHERE ""VendorId"" = @userId
                ORDER BY ""CreatedAt"" DESC
                LIMIT 1;";

                using (var businessCmd = new NpgsqlCommand(businessQuery, conn))
                {
                    businessCmd.Parameters.AddWithValue("@userId", userId);
                    using var reader = await businessCmd.ExecuteReaderAsync();
                    if (await reader.ReadAsync())
                    {
                        business = new
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
                            UpdatedAt = reader["UpdatedAt"] == DBNull.Value ? null : reader["UpdatedAt"]
                        };
                    }
                }

                const string bankQuery = @"
                SELECT *
                FROM ""VendorBankDetails""
                WHERE ""VendorId"" = @userId
                ORDER BY ""CreatedDate"" DESC
                LIMIT 1;";

                using (var bankCmd = new NpgsqlCommand(bankQuery, conn))
                {
                    bankCmd.Parameters.AddWithValue("@userId", userId);
                    using var reader = await bankCmd.ExecuteReaderAsync();
                    if (await reader.ReadAsync())
                    {
                        bank = new
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

                return new
                {
                    success = true,
                    data = new
                    {
                        Vendor = vendorUser,
                        BusinessDetails = business,
                        BankDetails = bank
                    }
                };
            }
            catch (Exception ex)
            {
                return new
                {
                    success = false,
                    message = ex.InnerException?.Message ?? ex.Message
                };
            }
        }

        public async Task<object> GetVendorProfileByEmail(string userEmail)
        {
            if (string.IsNullOrWhiteSpace(userEmail))
                return new { success = false, message = "Vendor email is required" };

            try
            {
                using var conn = new NpgsqlConnection(DbConnection);
                await conn.OpenAsync();

                const string query = @"
                SELECT
                    ""Id"",
                    ""Email"",
                    ""FirstName"",
                    ""LastName"",
                    ""PhoneNumber"",
                    ""address"",
                    ""ProfileImage"",
                    ""Status"",
                    ""IsVendor""
                FROM ""AspNetUsers""
                WHERE ""Email"" = @Email
                LIMIT 1;";

                using var cmd = new NpgsqlCommand(query, conn);
                cmd.Parameters.AddWithValue("@Email", userEmail);
                using var reader = await cmd.ExecuteReaderAsync();

                if (!await reader.ReadAsync())
                    return new { success = false, message = "Vendor not found" };

                return new
                {
                    success = true,
                    data = new
                    {
                        VendorId = reader["Id"]?.ToString(),
                        Email = reader["Email"]?.ToString(),
                        FirstName = reader["FirstName"]?.ToString(),
                        LastName = reader["LastName"]?.ToString(),
                        PhoneNumber = reader["PhoneNumber"]?.ToString(),
                        Address = reader["address"]?.ToString(),
                        ProfileImage = reader["ProfileImage"]?.ToString(),
                        Status = reader["Status"]?.ToString(),
                        IsVendor = reader["IsVendor"] != DBNull.Value && (bool)reader["IsVendor"]
                    }
                };
            }
            catch (Exception ex)
            {
                return new
                {
                    success = false,
                    message = ex.InnerException?.Message ?? ex.Message
                };
            }
        }

        public async Task<object> UpdateVendorProfileByEmail(string userEmail, VendorProfileUpdateRequest request)
        {
            if (string.IsNullOrWhiteSpace(userEmail))
                return new { success = false, message = "Vendor email is required" };

            if (request == null)
                return new { success = false, message = "Profile payload is required" };

            try
            {
                using var conn = new NpgsqlConnection(DbConnection);
                await conn.OpenAsync();

                const string query = @"
                UPDATE ""AspNetUsers""
                SET
                    ""FirstName"" = COALESCE(@FirstName, ""FirstName""),
                    ""LastName"" = COALESCE(@LastName, ""LastName""),
                    ""PhoneNumber"" = COALESCE(@PhoneNumber, ""PhoneNumber""),
                    ""address"" = COALESCE(@Address, ""address""),
                    ""ProfileImage"" = COALESCE(@ProfileImage, ""ProfileImage"")
                WHERE ""Email"" = @Email
                  AND ""IsVendor"" = true
                RETURNING ""Id"";";

                using var cmd = new NpgsqlCommand(query, conn);
                cmd.Parameters.AddWithValue("@FirstName", (object?)request.FirstName ?? DBNull.Value);
                cmd.Parameters.AddWithValue("@LastName", (object?)request.LastName ?? DBNull.Value);
                cmd.Parameters.AddWithValue("@PhoneNumber", (object?)request.PhoneNumber ?? DBNull.Value);
                cmd.Parameters.AddWithValue("@Address", (object?)request.Address ?? DBNull.Value);
                cmd.Parameters.AddWithValue("@ProfileImage", (object?)request.ProfileImage ?? DBNull.Value);
                cmd.Parameters.AddWithValue("@Email", userEmail);

                var updatedId = await cmd.ExecuteScalarAsync();
                if (updatedId == null)
                    return new { success = false, message = "Vendor not found" };

                return new
                {
                    success = true,
                    message = "Vendor profile updated successfully",
                    vendorId = updatedId.ToString()
                };
            }
            catch (Exception ex)
            {
                return new
                {
                    success = false,
                    message = ex.InnerException?.Message ?? ex.Message
                };
            }
        }
    }
}
