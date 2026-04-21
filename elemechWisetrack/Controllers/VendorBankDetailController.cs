using elemechWisetrack.BusinessLayer;
using elemechWisetrack.Models;
using CareerCracker.S3Services;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;
using NuGet.Protocol.Plugins;
using System.Security.Claims;

namespace elemechWisetrack.Controllers
{
    [ApiController]
    [Route("api/bank")]
    [Authorize]
    public class VendorBankDetailController : ControllerBase
    {
        private readonly IBusinessLayer _businessLayer;
        public VendorBankDetailController(IBusinessLayer businessLayer)
        {
            _businessLayer = businessLayer;
        }

        private async Task<string?> ResolveCancelledChequeImageAsync(IFormCollection form)
        {
            var chequeFile =
                form.Files.FirstOrDefault(f => string.Equals(f.Name, "CancelledChequeImage", StringComparison.OrdinalIgnoreCase))
                ?? form.Files.FirstOrDefault(f => string.Equals(f.Name, "cancelledChequeImage", StringComparison.OrdinalIgnoreCase));

            if (chequeFile != null && chequeFile.Length > 0)
            {
                return await S3StorageHelper.UploadFileAsync(chequeFile, "vendor/bank");
            }

            // Allow direct URL/path if frontend sends text value.
            if (!string.IsNullOrWhiteSpace(form["CancelledChequeImage"]))
                return form["CancelledChequeImage"];
            if (!string.IsNullOrWhiteSpace(form["cancelledChequeImage"]))
                return form["cancelledChequeImage"];

            return null;
        }


        [Route("add")]
        [HttpPost]
        [Consumes("multipart/form-data", "application/x-www-form-urlencoded")]
        public async Task<IActionResult> AddBank([FromForm] VandorBankDetail request)
        {
            try
            {
                var userId =
                    User.FindFirst(ClaimTypes.Email)?.Value ??
                    User.FindFirst("email")?.Value ??
                    User.FindFirst("UserEmail")?.Value;

                if (string.IsNullOrWhiteSpace(request.BankName) ||
                    string.IsNullOrWhiteSpace(request.AccountHolderName) ||
                    string.IsNullOrWhiteSpace(request.AccountNumber) ||
                    string.IsNullOrWhiteSpace(request.IFSCCode))
                {
                    return BadRequest("All required fields must be provided!");
                }

                var form = await Request.ReadFormAsync();
                var chequeImageUrl = await ResolveCancelledChequeImageAsync(form);
                if (!string.IsNullOrWhiteSpace(chequeImageUrl))
                {
                    request.CancelledChequeImage = chequeImageUrl;
                }

                var data = await _businessLayer.AddBankDetail(userId, request);

                return Ok(new
                {
                    data = data,
                    message = "Added successfully!"
                });
            }
            catch (Exception ex)
            {
                return StatusCode(500, new { Message = ex.Message });
            }
        }

        [Route("get/{userId}")]
        [HttpGet]
        public async Task<IActionResult> GetBankDetailByUserId(string userId)
        {
            var loggedInUserId =
                User.FindFirst("VendorId")?.Value ??
                User.FindFirst("vendorId")?.Value ??
                User.FindFirst("UserId")?.Value ??
                User.FindFirst("userId")?.Value ??
                User.FindFirst(ClaimTypes.NameIdentifier)?.Value;

            // Prefer token user for vendor calls; fallback to route userId for admin flows.
            var effectiveUserId = !string.IsNullOrWhiteSpace(loggedInUserId) ? loggedInUserId : userId;
            if (string.IsNullOrWhiteSpace(effectiveUserId))
            {
                return BadRequest(new { Success = false, Message = "UserId is required" });
            }

            try
            {
                var data = await _businessLayer.GetBankDetailByUserId(effectiveUserId);

                if (data == null)
                {
                    return NotFound(new
                    {
                        Success = false,
                        Message = "Bank details not found"
                    });
                }

                return Ok(new
                {
                    Success = true,
                    Data = data
                });
            }
            catch (Exception ex)
            {
                return StatusCode(500, new { Message = ex.Message });
            }

        }


        [Route("get")]
        [HttpGet]
        public async Task<IActionResult> GetBankDetail()
        {

            try
            {
                var data = await _businessLayer.GetVendorBankDetail();

                if (data == null)
                {
                    return NotFound(new
                    {
                        Success = false,
                        Message = "Bank details not found"
                    });
                }

                return Ok(new
                {
                    Success = true,
                    Data = data
                });
            }
            catch (Exception ex)
            {
                return StatusCode(500, new { Message = ex.Message });
            }

        }

        [HttpPut("update-bank/{bankDetailId}")]
        [Consumes("multipart/form-data", "application/x-www-form-urlencoded")]
        public async Task<IActionResult> UpdateBank(int bankDetailId, [FromForm] VandorBankDetail request)
        {
            try
            {

                string userEmail =
                   User.FindFirst(ClaimTypes.Email)?.Value ??
                   User.FindFirst("email")?.Value ??
                   User.FindFirst("UserEmail")?.Value;

                var form = await Request.ReadFormAsync();
                var chequeImageUrl = await ResolveCancelledChequeImageAsync(form);
                if (!string.IsNullOrWhiteSpace(chequeImageUrl))
                {
                    request.CancelledChequeImage = chequeImageUrl;
                }


                var result = await _businessLayer.UpdateBankDetail(userEmail, bankDetailId, request);

                return Ok(result);
            }
            catch (Exception ex)
            {
                return StatusCode(500, new
                {
                    Success = false,
                    Message = ex.Message
                });
            }
        }

        [Route("delete/{bankId}")]
        [HttpDelete]
        public async Task<IActionResult>DeleteVendorBankDetail(int bankId)
        {
            if (bankId <= 0)
            {
                return BadRequest("Bank detail not found!");
            }

            try
            {
                var bankdata = await _businessLayer.DeleteVendorBankDetail(bankId);
                return Ok(new
                {
                    success = true,
                    data = bankdata,
                    message = " Bank Detail delete successfully"
                });
            }
            catch(Exception ex)
            {
                return StatusCode(500, new
                {
                    Success = false,
                    Message = ex.Message
                });
            }
        }

    }
}
