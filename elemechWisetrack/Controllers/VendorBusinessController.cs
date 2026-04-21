using elemechWisetrack.BusinessLayer;
using elemechWisetrack.Models;
using CareerCracker.S3Services;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;
using System.Security.Claims;

namespace elemechWisetrack.Controllers
{
    [ApiController]
    [Route("api/vendor/business")]
    [Authorize (Roles="ADMIN,SUPERADMIN")]

    public class VendorBusinessController : ControllerBase
    {
        private readonly IBusinessLayer _businessLayer;
        public VendorBusinessController(IBusinessLayer businessLayer)
        {
            _businessLayer = businessLayer;
        }

        private static string? GetFormValue(IFormCollection form, string key)
        {
            return !string.IsNullOrWhiteSpace(form[key]) ? form[key].ToString() : null;
        }

        private static IFormFile? GetFormFile(IFormCollection form, string key)
        {
            return form.Files.FirstOrDefault(f => string.Equals(f.Name, key, StringComparison.OrdinalIgnoreCase));
        }

        private async Task<string?> ResolveBusinessFileAsync(IFormCollection form, string fieldName, string folderPrefix)
        {
            var file = GetFormFile(form, fieldName);
            if (file != null && file.Length > 0)
            {
                return await S3StorageHelper.UploadFileAsync(file, folderPrefix);
            }

            return GetFormValue(form, fieldName);
        }

        private static string[] GetMissingRequiredDocumentFields(VendorBusinessDetails request)
        {
            var missing = new List<string>();
            if (string.IsNullOrWhiteSpace(request.GSTDocumentUrl)) missing.Add("gstDocumentUrl");
            if (string.IsNullOrWhiteSpace(request.PANDocumentUrl)) missing.Add("panDocumentUrl");
            if (string.IsNullOrWhiteSpace(request.CINCertificateUrl)) missing.Add("cinCertificateUrl");
            if (string.IsNullOrWhiteSpace(request.AadharDocumentUrl)) missing.Add("aadharDocumentUrl");
            if (string.IsNullOrWhiteSpace(request.AddressProofImageUrl)) missing.Add("addressProofImageUrl");
            if (string.IsNullOrWhiteSpace(request.BusinessLogoUrl)) missing.Add("businessLogoUrl");
            return missing.ToArray();
        }

        [Route("insert")]
        [HttpPost]
        [Consumes("multipart/form-data", "application/x-www-form-urlencoded")]
        public async Task<IActionResult> AddVendorBusinessDetail([FromForm] VendorBusinessDetails request) 
        {
            if (request == null) 
            {
                return BadRequest(" Some fields are required");
            }


            try
            {
                var form = await Request.ReadFormAsync();
                request.GSTDocumentUrl = await ResolveBusinessFileAsync(form, "gstDocumentUrl", "vendor/business/gst");
                request.PANDocumentUrl = await ResolveBusinessFileAsync(form, "panDocumentUrl", "vendor/business/pan");
                request.CINCertificateUrl = await ResolveBusinessFileAsync(form, "cinCertificateUrl", "vendor/business/cin");
                request.AadharDocumentUrl = await ResolveBusinessFileAsync(form, "aadharDocumentUrl", "vendor/business/aadhar");
                request.AddressProofImageUrl = await ResolveBusinessFileAsync(form, "addressProofImageUrl", "vendor/business/address-proof");
                request.BusinessLogoUrl = await ResolveBusinessFileAsync(form, "businessLogoUrl", "vendor/business/logo");

                var missingFields = GetMissingRequiredDocumentFields(request);
                if (missingFields.Length > 0)
                {
                    return BadRequest(new
                    {
                        Success = false,
                        Message = $"Required business document fields missing: {string.Join(", ", missingFields)}"
                    });
                }

                string userEmail =
                   User.FindFirst(ClaimTypes.Email)?.Value ??
                   User.FindFirst("email")?.Value ??
                   User.FindFirst("UserEmail")?.Value;

                var data = await _businessLayer.AddVendorBusinessDetail(userEmail, request);
                return Ok(new
                {
                    Suceess = true,
                    data = data,
                    Message = "Add BusinessDetail Successfully"
                });
            }
            catch (Exception ex) 
            { 
                return StatusCode(500, ex.Message);
            }
        }

        [Route("list")]
        [HttpGet]
        public async Task<IActionResult> GetVendorBusinessDetail()
        {
            try
            {
                var data = await _businessLayer.GetVendorBusinessDetail();
                return Ok(new { 
                    success = true,
                    data = data,
                    Message = "Vendor detail list successfully!"
                });
            }
            catch(Exception ex)
            {
                return StatusCode(500, new { Success = false, Message = ex.Message });
            }
        }

        [Route("get")]
        [HttpGet]
        public async Task<IActionResult> GetVendorBusinessDatailByEmail()
        {
            string userEmail =
                   User.FindFirst(ClaimTypes.Email)?.Value ??
                   User.FindFirst("email")?.Value ??
                   User.FindFirst("UserEmail")?.Value;

            if (string.IsNullOrEmpty(userEmail))
            {
                return BadRequest("User Not found!");
            }

            try
            {
                var data = await _businessLayer.GetVendorBusinessDatailByEmail(userEmail);
                return Ok(new
                {
                    Success = true,
                    data = data,
                    Message = "Get data successfully!"
                });
            }
            catch (Exception ex)
            {
                return StatusCode(500, new { Success = false, Message = ex.Message });
            }
        }

        [Route("update/{busiDetailId}")]
        [HttpPut]
        [Consumes("multipart/form-data", "application/x-www-form-urlencoded")]
        public async Task<IActionResult> UpdateVendorBusinessDetail(Guid busiDetailId, [FromForm] VendorBusinessDetails request)
        {
            if (request == null)
            {
                return BadRequest(" Some fields are required");
            }


            try
            {
                var form = await Request.ReadFormAsync();
                request.GSTDocumentUrl = await ResolveBusinessFileAsync(form, "gstDocumentUrl", "vendor/business/gst") ?? request.GSTDocumentUrl;
                request.PANDocumentUrl = await ResolveBusinessFileAsync(form, "panDocumentUrl", "vendor/business/pan") ?? request.PANDocumentUrl;
                request.CINCertificateUrl = await ResolveBusinessFileAsync(form, "cinCertificateUrl", "vendor/business/cin") ?? request.CINCertificateUrl;
                request.AadharDocumentUrl = await ResolveBusinessFileAsync(form, "aadharDocumentUrl", "vendor/business/aadhar") ?? request.AadharDocumentUrl;
                request.AddressProofImageUrl = await ResolveBusinessFileAsync(form, "addressProofImageUrl", "vendor/business/address-proof") ?? request.AddressProofImageUrl;
                request.BusinessLogoUrl = await ResolveBusinessFileAsync(form, "businessLogoUrl", "vendor/business/logo") ?? request.BusinessLogoUrl;

                string userEmail =
                   User.FindFirst(ClaimTypes.Email)?.Value ??
                   User.FindFirst("email")?.Value ??
                   User.FindFirst("UserEmail")?.Value;

                var data = await _businessLayer.UpdateVendorBusinessDetail(busiDetailId, userEmail, request);
                return Ok(new
                {
                    Suceess = true,
                    data = data,
                    Message = "Add BusinessDetail Successfully"
                });
            }
            catch (Exception ex)
            {
                return StatusCode(500, ex.Message);
            }
        }

        [Route("delete/{busiDetailId}")]
        [HttpDelete]
        public async Task<IActionResult> DeleteVendorBusinessDetail(Guid busiDetailId)
        {
            try
            {
                var data = await _businessLayer.DeleteVendorBusinessDetail(busiDetailId);
                return Ok(new { Success = true, data = data, Message = "Business detail delete successfully" });
            }
            catch (Exception ex)
            {
                return StatusCode(500, ex.Message);
            }
        }
    }


}
