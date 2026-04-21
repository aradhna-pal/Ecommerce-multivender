using Npgsql;

namespace elemechWisetrack.DataBaseLayer
{
    public interface IDataBaseLayer_Dashboard
    {
        Task<object> GetVendorDashboardByEmail(string email);
        Task<object> GetSuperAdminDashboard();
    }

    public partial interface IDataBaseLayer : IDataBaseLayer_Dashboard { }

    public partial class DataBaseLayer
    {
        public async Task<object> GetVendorDashboardByEmail(string email)
        {
            using var conn = new NpgsqlConnection(DbConnection);
            await conn.OpenAsync();

            var getUserIdSql = @"SELECT ""Id"" FROM ""AspNetUsers"" WHERE LOWER(""Email"") = LOWER(@Email) LIMIT 1";
            string? userId = null;
            using (var cmd = new NpgsqlCommand(getUserIdSql, conn))
            {
                cmd.Parameters.AddWithValue("@Email", email ?? string.Empty);
                var result = await cmd.ExecuteScalarAsync();
                userId = result?.ToString();
            }

            if (string.IsNullOrWhiteSpace(userId))
            {
                return new { success = false, message = "Vendor user not found" };
            }

            const string summarySql = @"
                SELECT
                    COUNT(DISTINCT p.id) AS total_products,
                    COUNT(DISTINCT o.id) AS total_orders,
                    COALESCE(SUM(oi.quantity), 0) AS total_items_sold,
                    COALESCE(SUM(oi.price * oi.quantity), 0) AS total_revenue
                FROM products p
                LEFT JOIN order_items oi ON oi.product_id = p.id
                LEFT JOIN orders o ON o.id = oi.order_id
                WHERE p.isdeleted = false
                  AND p.createdby::text = @CreatedBy;";

            long totalProducts = 0;
            long totalOrders = 0;
            long totalItemsSold = 0;
            decimal totalRevenue = 0;

            using (var cmd = new NpgsqlCommand(summarySql, conn))
            {
                cmd.Parameters.AddWithValue("@CreatedBy", userId);
                using var reader = await cmd.ExecuteReaderAsync();
                if (await reader.ReadAsync())
                {
                    totalProducts = reader.IsDBNull(0) ? 0 : reader.GetInt64(0);
                    totalOrders = reader.IsDBNull(1) ? 0 : reader.GetInt64(1);
                    totalItemsSold = reader.IsDBNull(2) ? 0 : reader.GetInt64(2);
                    totalRevenue = reader.IsDBNull(3) ? 0 : reader.GetDecimal(3);
                }
            }

            const string chartSql = @"
                SELECT
                    TO_CHAR(DATE_TRUNC('month', o.created_at), 'Mon') AS month_label,
                    COALESCE(SUM(oi.price * oi.quantity), 0) AS revenue
                FROM orders o
                JOIN order_items oi ON oi.order_id = o.id
                JOIN products p ON p.id = oi.product_id
                WHERE p.createdby::text = @CreatedBy
                  AND o.created_at >= DATE_TRUNC('month', NOW()) - INTERVAL '5 months'
                GROUP BY DATE_TRUNC('month', o.created_at)
                ORDER BY DATE_TRUNC('month', o.created_at);";

            var trend = new List<object>();
            using (var cmd = new NpgsqlCommand(chartSql, conn))
            {
                cmd.Parameters.AddWithValue("@CreatedBy", userId);
                using var reader = await cmd.ExecuteReaderAsync();
                while (await reader.ReadAsync())
                {
                    trend.Add(new
                    {
                        month = reader.IsDBNull(0) ? "-" : reader.GetString(0),
                        revenue = reader.IsDBNull(1) ? 0 : reader.GetDecimal(1)
                    });
                }
            }

            return new
            {
                success = true,
                data = new
                {
                    totalProducts,
                    totalOrders,
                    totalItemsSold,
                    totalRevenue,
                    trend
                }
            };
        }

        public async Task<object> GetSuperAdminDashboard()
        {
            using var conn = new NpgsqlConnection(DbConnection);
            await conn.OpenAsync();

            const string summarySql = @"
                SELECT
                    (SELECT COUNT(*) FROM products WHERE isdeleted = false) AS total_products,
                    (SELECT COUNT(*) FROM orders) AS total_orders,
                    (SELECT COUNT(*) FROM ""AspNetUsers"" WHERE ""sourcetype"" = 'vendor') AS total_vendors,
                    (SELECT COALESCE(SUM(final_amount), 0) FROM orders) AS total_revenue;";

            long totalProducts = 0;
            long totalOrders = 0;
            long totalVendors = 0;
            decimal totalRevenue = 0;

            using (var cmd = new NpgsqlCommand(summarySql, conn))
            {
                using var reader = await cmd.ExecuteReaderAsync();
                if (await reader.ReadAsync())
                {
                    totalProducts = reader.IsDBNull(0) ? 0 : reader.GetInt64(0);
                    totalOrders = reader.IsDBNull(1) ? 0 : reader.GetInt64(1);
                    totalVendors = reader.IsDBNull(2) ? 0 : reader.GetInt64(2);
                    totalRevenue = reader.IsDBNull(3) ? 0 : reader.GetDecimal(3);
                }
            }

            const string chartSql = @"
                SELECT
                    TO_CHAR(DATE_TRUNC('month', created_at), 'Mon') AS month_label,
                    COALESCE(SUM(final_amount), 0) AS revenue
                FROM orders
                WHERE created_at >= DATE_TRUNC('month', NOW()) - INTERVAL '5 months'
                GROUP BY DATE_TRUNC('month', created_at)
                ORDER BY DATE_TRUNC('month', created_at);";

            var trend = new List<object>();
            using (var cmd = new NpgsqlCommand(chartSql, conn))
            {
                using var reader = await cmd.ExecuteReaderAsync();
                while (await reader.ReadAsync())
                {
                    trend.Add(new
                    {
                        month = reader.IsDBNull(0) ? "-" : reader.GetString(0),
                        revenue = reader.IsDBNull(1) ? 0 : reader.GetDecimal(1)
                    });
                }
            }

            return new
            {
                success = true,
                data = new
                {
                    totalProducts,
                    totalOrders,
                    totalVendors,
                    totalRevenue,
                    trend
                }
            };
        }
    }
}
