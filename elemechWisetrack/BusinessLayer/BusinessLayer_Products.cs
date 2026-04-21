using elemechWisetrack.Models;
using elemechWisetrack.others;
using Microsoft.AspNetCore.Http.HttpResults;
using Microsoft.AspNetCore.Mvc;
using System.Text.RegularExpressions;

namespace elemechWisetrack.BusinessLayer
{
    public interface IBusinessLayer_Products
    {
        Task<object> AddProduct(string userEmail, ProductInsertModel request);
        Task<object> GetProducts();
        Task<object> GetProductsFiltered(
            IReadOnlyList<Guid>? brandIds,
            IReadOnlyList<Guid>? colorIds,
            IReadOnlyList<Guid>? sizeIds,
            IReadOnlyList<Guid>? categoryIds,
            string? search);
        Task<object> GetProductById(Guid id);
        Task<object> GetRelatedProducts(Guid productId, int limit);
        Task<object> GetSoftDeletedProducts();
        Task<object> UpdateProduct(Guid id, ProductInsertModel request);
        Task<object> SoftDeleteProduct(Guid id);
        Task<object> DeleteProduct(Guid id);
        Task<object> UploadProductsExcel(IFormFile file, string userEmail);
        Task<byte[]> ExportProductsExcel();
    }

    public partial interface IBusinessLayer : IBusinessLayer_Products
    {

    }

    public partial class BusinessLayer
    {
        public async Task<object> AddProduct(string userEmail, ProductInsertModel request)
        {
            string slug = CreateProductSlug(request.Name);
            return await _dataBaseLayer.AddProduct(userEmail, request, slug);
        }

        public async Task<object> GetProducts()
        {
            return await _dataBaseLayer.GetProducts();
        }

        public async Task<object> GetProductsFiltered(
            IReadOnlyList<Guid>? brandIds,
            IReadOnlyList<Guid>? colorIds,
            IReadOnlyList<Guid>? sizeIds,
            IReadOnlyList<Guid>? categoryIds,
            string? search)
        {
            return await _dataBaseLayer.GetProductsFiltered(
                brandIds,
                colorIds,
                sizeIds,
                categoryIds,
                search);
        }

        public async Task<object> GetProductById(Guid id)
        {
            return await _dataBaseLayer.GetProductById(id);
        }

        public async Task<object> GetRelatedProducts(Guid productId, int limit)
        {
            return await _dataBaseLayer.GetRelatedProducts(productId, limit);
        }

        public async Task<object> GetSoftDeletedProducts()
        {
            return await _dataBaseLayer.GetSoftDeletedProducts();
        }

        public async Task<object> UpdateProduct(Guid id, ProductInsertModel request)
        {
            string slug = CreateProductSlug(request.Name);
            return await _dataBaseLayer.UpdateProduct(id, request, slug);
        }

        public async Task<object> SoftDeleteProduct(Guid id)
        {
            return await _dataBaseLayer.SoftDeleteProduct(id);
        }

        public async Task<object> DeleteProduct(Guid id)
        {
            return await _dataBaseLayer.DeleteProduct(id);
        }

        public async Task<object> UploadProductsExcel(IFormFile file, string userEmail)
        {
            var products = ExcelReader.ReadExcelData(file);
            return await _dataBaseLayer.InsertExcelFileProducts(products, userEmail);
        }

        public async Task<byte[]> ExportProductsExcel()
        {
            return await _dataBaseLayer.ExportProductsExcel();
        }

        private static string CreateProductSlug(string? name)
        {
            if (string.IsNullOrWhiteSpace(name))
            {
                return Guid.NewGuid().ToString("N");
            }

            string slug = name.Trim().ToLowerInvariant();
            slug = Regex.Replace(slug, @"\s+", "-");
            slug = Regex.Replace(slug, @"[^a-z0-9\-]", string.Empty);
            slug = Regex.Replace(slug, @"\-{2,}", "-").Trim('-');

            return string.IsNullOrWhiteSpace(slug) ? Guid.NewGuid().ToString("N") : slug;
        }
    }
}
