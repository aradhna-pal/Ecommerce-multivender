using elemechWisetrack.BusinessLayer;
using elemechWisetrack.Models;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;
using System.Security.Claims;
using System.Linq;

namespace elemechWisetrack.Controllers
{
    [ApiController]
    [Authorize (Roles ="ADMIN, SUPERADMIN")]
    [Route("api/products")]
    public class ProductsController : ControllerBase
    {
        private readonly IBusinessLayer _businessLayer;
        public ProductsController(IBusinessLayer businessLayer)
        {
            _businessLayer = businessLayer;
        }

        [HttpPost("insert")]
        public async Task<IActionResult> Insert([FromForm] ProductInsertModel request)
        {
            string userEmail = User.FindFirst(ClaimTypes.Email)?.Value ??
                               User.FindFirst("UserName")?.Value ??
                               User.FindFirst("email")?.Value;

            var result = await _businessLayer.AddProduct(userEmail, request);
            return Ok(result);
        }

        [HttpGet("list")]
        [AllowAnonymous]
        public async Task<IActionResult> Read([FromQuery] ProductListFilters? filters = null)
        {
            filters ??= new ProductListFilters();

            var brandIds = MergeGuidFilters(filters.BrandIds, filters.Brands);
            var colorIds = MergeGuidFilters(filters.ColorIds, filters.Colors);
            var sizeIds = MergeGuidFilters(filters.SizeIds, filters.Sizes);
            var categoryIds = MergeGuidFilters(filters.CategoryIds, filters.Categories);

            string? search = string.IsNullOrWhiteSpace(filters.Search)
                ? null
                : filters.Search.Trim();
            if (search == null && !string.IsNullOrWhiteSpace(filters.Q))
                search = filters.Q.Trim();

            var result = await _businessLayer.GetProductsFiltered(
                brandIds,
                colorIds,
                sizeIds,
                categoryIds,
                search);

            return Ok(result);
        }

        private static Guid[] MergeGuidFilters(IEnumerable<Guid>? list, string? commaSeparated)
        {
            var set = new HashSet<Guid>();
            if (list != null)
            {
                foreach (var g in list)
                    set.Add(g);
            }

            if (!string.IsNullOrWhiteSpace(commaSeparated))
            {
                foreach (var part in commaSeparated.Split(
                             ',',
                             StringSplitOptions.TrimEntries | StringSplitOptions.RemoveEmptyEntries))
                {
                    if (Guid.TryParse(part, out var id))
                        set.Add(id);
                }
            }

            return set.Count == 0 ? Array.Empty<Guid>() : set.ToArray();
        }

        /// <summary>Single product for store / PDP (non-deleted only).</summary>
        [HttpGet("detail/{id:guid}")]
        [AllowAnonymous]
        public async Task<IActionResult> GetDetail(Guid id)
        {
            var result = await _businessLayer.GetProductById(id);
            return Ok(result);
        }

        /// <summary>Related products (same brand and/or category/subcategory), excludes current item.</summary>
        [HttpGet("related/{id:guid}")]
        [AllowAnonymous]
        public async Task<IActionResult> GetRelated(Guid id, [FromQuery] int limit = 12)
        {
            var result = await _businessLayer.GetRelatedProducts(id, limit);
            return Ok(result);
        }

        [HttpGet("softdeleted-list")]
        public async Task<IActionResult> SoftDeletedList()
        {
            var result = await _businessLayer.GetSoftDeletedProducts();
            return Ok(result);
        }

        [HttpPut("update/{id}")]
        public async Task<IActionResult> Update(Guid id, [FromForm] ProductInsertModel request)
        {
            var result = await _businessLayer.UpdateProduct(id, request);
            return Ok(result);
        }

        [HttpPost("import")]
        public async Task<IActionResult> ImportProducts(IFormFile file)
        {
            if (file == null || file.Length == 0)
            {
                return BadRequest(new { success = false, message = "File is required" });
            }

            string extension = Path.GetExtension(file.FileName).ToLowerInvariant();
            string[] allowedExtensions = { ".xls", ".xlsx" };

            if (!allowedExtensions.Contains(extension))
            {
                return BadRequest(new { success = false, message = "Only .xls and .xlsx files are allowed" });
            }

            string userEmail = User.FindFirst(ClaimTypes.Email)?.Value ??
                               User.FindFirst("UserName")?.Value ??
                               User.FindFirst("email")?.Value;

            var result = await _businessLayer.UploadProductsExcel(file, userEmail);
            return Ok(result);
        }

        [HttpPost("upload-excel")]
        public async Task<IActionResult> UploadProductsExcel(IFormFile file)
        {
            if (file == null || file.Length == 0)
            {
                return BadRequest(new { success = false, message = "File is required" });
            }

            string extension = Path.GetExtension(file.FileName).ToLowerInvariant();
            string[] allowedExtensions = { ".xls", ".xlsx", ".csv" };

            if (!allowedExtensions.Contains(extension))
            {
                return BadRequest(new { success = false, message = "Invalid file format. Only .xls and .xlsx files are allowed." });
            }

            string userEmail = User.FindFirst(ClaimTypes.Email)?.Value ??
                               User.FindFirst("email")?.Value ??
                               User.FindFirst("UserName")?.Value;

            var result = await _businessLayer.UploadProductsExcel(file, userEmail);
            return Ok(result);
        }

        [HttpGet("export")]
        public async Task<IActionResult> ExportProducts()
        {
            var fileBytes = await _businessLayer.ExportProductsExcel();
            return File(fileBytes,
                "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
                $"products-export-{DateTime.UtcNow:yyyyMMddHHmmss}.xlsx");
        }

        [HttpDelete("softdelete/{id}")]
        public async Task<IActionResult> SoftDelete(Guid id)
        {
            var result = await _businessLayer.SoftDeleteProduct(id);
            return Ok(result);
        }

        [HttpDelete("delete/{id}")]
        public async Task<IActionResult> Delete(Guid id)
        {
            var result = await _businessLayer.DeleteProduct(id);
            return Ok(result);
        }
    }
}
