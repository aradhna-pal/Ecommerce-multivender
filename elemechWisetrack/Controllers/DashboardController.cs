using elemechWisetrack.BusinessLayer;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;
using System.Security.Claims;

namespace elemechWisetrack.Controllers
{
    [ApiController]
    [Route("api/dashboard")]
    [Authorize]
    public class DashboardController : ControllerBase
    {
        private readonly IBusinessLayer _businessLayer;

        public DashboardController(IBusinessLayer businessLayer)
        {
            _businessLayer = businessLayer;
        }

        [HttpGet("vendor")]
        public async Task<IActionResult> VendorDashboard()
        {
            var email =
                User.FindFirst(ClaimTypes.Email)?.Value ??
                User.FindFirst("email")?.Value ??
                User.FindFirst("UserEmail")?.Value;

            if (string.IsNullOrWhiteSpace(email))
                return Unauthorized(new { success = false, message = "Vendor email not found in token." });

            var result = await _businessLayer.GetVendorDashboardByEmail(email);
            return Ok(result);
        }

        [HttpGet("superadmin")]
        [Authorize(Roles = "SUPERADMIN")]
        public async Task<IActionResult> SuperAdminDashboard()
        {
            var result = await _businessLayer.GetSuperAdminDashboard();
            return Ok(result);
        }
    }
}
