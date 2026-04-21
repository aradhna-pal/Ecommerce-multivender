namespace elemechWisetrack.BusinessLayer
{
    public interface IBusinessLayer_Dashboard
    {
        Task<object> GetVendorDashboardByEmail(string email);
        Task<object> GetSuperAdminDashboard();
    }

    public partial interface IBusinessLayer : IBusinessLayer_Dashboard { }

    public partial class BusinessLayer
    {
        public async Task<object> GetVendorDashboardByEmail(string email)
        {
            return await _dataBaseLayer.GetVendorDashboardByEmail(email);
        }

        public async Task<object> GetSuperAdminDashboard()
        {
            return await _dataBaseLayer.GetSuperAdminDashboard();
        }
    }
}
