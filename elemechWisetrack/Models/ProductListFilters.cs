namespace elemechWisetrack.Models
{
    /// <summary>Query options for GET /api/products/list — multi-select filters + global search.</summary>
    public sealed class ProductListFilters
    {
        /// <summary>Repeat query key <c>brandIds</c>.</summary>
        public List<Guid>? BrandIds { get; set; }

        /// <summary>Repeat <c>colorIds</c>.</summary>
        public List<Guid>? ColorIds { get; set; }

        /// <summary>Repeat <c>sizeIds</c>.</summary>
        public List<Guid>? SizeIds { get; set; }

        /// <summary>Repeat <c>categoryIds</c>. Any depth: matches products in that category or under it (tree).</summary>
        public List<Guid>? CategoryIds { get; set; }

        /// <summary>Comma-separated GUIDs; merged with <see cref="BrandIds"/>.</summary>
        public string? Brands { get; set; }

        public string? Colors { get; set; }
        public string? Sizes { get; set; }
        public string? Categories { get; set; }

        /// <summary>Global text search.</summary>
        public string? Search { get; set; }

        /// <summary>Alias for <see cref="Search"/>.</summary>
        public string? Q { get; set; }
    }
}
