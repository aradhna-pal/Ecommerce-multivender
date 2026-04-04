const getBlog = "https://api.workarya.com/api/blogs";
const imageBaseUrl = "https://api.workarya.com";
const blogDetails = "https://api.workarya.com/api/blogs/"; // Append blog ID for details

const getQueryParam = (name) => new URLSearchParams(window.location.search).get(name);

const formatBlogDate = (isoString) => {
    if (!isoString) return "";
    const date = new Date(isoString);
    if (isNaN(date)) return isoString;
    return date.toLocaleDateString(undefined, { year: "numeric", month: "long", day: "numeric" });
};

const fillBlogDetail = (blog) => {
    if (!blog) return;

    const mainImageEl = document.querySelector("#blog-detail-image img");
    const titleEl = document.getElementById("blog-detail-title");
    const metaEl = document.getElementById("blog-meta");
    const contentEl = document.getElementById("blog-detail-content");

    if (mainImageEl) {
        mainImageEl.src = blog.image ? `${imageBaseUrl}${blog.image}` : "./assets/images/inner-page/blog/1.jpg";
        mainImageEl.alt = blog.title || "Blog Image";
    }

    if (titleEl) titleEl.textContent = blog.title || "No Title";

    if (metaEl) {
        const publishedDate = formatBlogDate(blog.created_at || blog.updated_at);
        const category = (blog.tags && blog.tags.length && blog.tags[0]) || "Blog";

        metaEl.innerHTML = `
            <li>${category}</li>
            <li>Published on ${publishedDate}</li>
            <li>
                <form>
                    <input class="form-check-input" type="checkbox" id="checkBox">
                    <label for="checkBox" class="form-label">12 Appreciations</label>
                </form>
            </li>
        `;
    }

    if (contentEl) {
        let body = (blog.content || blog.description || "").trim();
        if (!body) body = "No description available.";

        contentEl.innerHTML = `<p>${body.replace(/\r\n|\n|\r/g, "<br>")}</p>`;
    }
};

const renderRecentPosts = (blogs, currentId) => {
    const sideRecent = document.getElementById("blog-recent-sidebar");
    const relatedSlider = document.getElementById("related-blog-slider");

    if (!blogs || !blogs.length) {
        if (sideRecent) sideRecent.innerHTML = `<p>No recent posts found.</p>`;
        if (relatedSlider) relatedSlider.innerHTML = `<p>No recent posts found.</p>`;
        return;
    }

    const sorted = blogs
        .slice()
        .filter((item) => item.id !== currentId)
        .sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

    const top4 = sorted.slice(0, 4);

    if (sideRecent) {
        sideRecent.innerHTML = top4
            .map((bg) => {
                const link = bg.slug ? `blog-detail.php?slug=${encodeURIComponent(bg.slug)}` : `blog-detail.php?id=${encodeURIComponent(bg.id)}`;
                const image = bg.image ? `${imageBaseUrl}${bg.image}` : "./assets/images/inner-page/blog/1.jpg";
                const date = formatBlogDate(bg.created_at);
                return `
                    <div class="recent-box">
                        <a href="${link}" class="recent-image">
                            <img src="${image}" class="img-fluid" alt="${bg.title || "Recent"}">
                        </a>
                        <div class="recent-detail">
                            <a href="${link}">
                                <h3 class="recent-name">${bg.title || "Untitled"}</h3>
                            </a>
                            <p>${date || "Unknown date"}</p>
                        </div>
                    </div>
                `;
            })
            .join("");
    }

    if (relatedSlider) {
        relatedSlider.innerHTML = top4
            .map((bg) => {
                const link = bg.slug ? `blog-detail.php?slug=${encodeURIComponent(bg.slug)}` : `blog-detail.php?id=${encodeURIComponent(bg.id)}`;
                const image = bg.image ? `${imageBaseUrl}${bg.image}` : "./assets/images/inner-page/blog/1.jpg";
                const title = bg.title || "Untitled";
                const date = formatBlogDate(bg.created_at);
                const description = (bg.description || bg.content || "").replace(/<[^>]*>/g, "").slice(0, 120) + "...";

                return `
                    <div class="swiper-slide">
                        <div class="blog-box h-100 sticky-blog-box">
                            <div class="blog-image">
                                <a href="${link}">
                                    <img src="${image}" class="img-fluid" alt="${title}">
                                </a>
                                <i class="ri-pushpin-fill pinned"></i>
                            </div>
                            <div class="blog-contain">
                                <a href="${link}">
                                    <h3>${title}</h3>
                                    <i class="ri-arrow-right-up-line"></i>
                                </a>
                                <p class="blog-desc">${description}</p>
                            </div>
                        </div>
                    </div>
                `;
            })
            .join("");
    }
};

const renderBlogDetailPage = async () => {
    if (!window.location.pathname.toLowerCase().includes("blog-detail.php")) return;

    const id = getQueryParam("id");
    const slug = getQueryParam("slug");

    let blogData = null;

    if (id) {
        try {
            const response = await fetch(`${blogDetails}${encodeURIComponent(id)}`);
            if (response.ok) blogData = await response.json();
        } catch (error) {
            console.error("Error fetching blog detail by id:", error);
        }
    }

    if (!blogData && slug) {
        try {
            const response = await fetch(getBlog);
            const data = await response.json();
            const blogList = Array.isArray(data) ? data : data.data || [];
            blogData = blogList.find((item) => item.slug === slug || item.id === slug);
        } catch (error) {
            console.error("Error fetching blog detail by slug:", error);
        }
    }

    if (!blogData) {
        console.error("Blog not found", { id, slug });
        return;
    }

    fillBlogDetail(blogData);

    try {
        const response = await fetch(getBlog);
        const data = await response.json();
        const blogList = Array.isArray(data) ? data : data.data || [];
        renderRecentPosts(blogList, blogData.id);
    } catch (error) {
        console.error("Error fetching recent blogs:", error);
    }
};

const ITEMS_PER_PAGE = 8;

const createBlogCardHTML = (blog) => {
    const blogImage = blog.image
        ? `${imageBaseUrl}${blog.image}`
        : "./assets/images/inner-page/blog/1.jpg";

    const blogTitle = blog.title || "No Title";

    const blogDescription = (blog.description || blog.content || "No description available")
        .replace(/<[^>]*>/g, "")
        .replace(/\r\n|\n|\r/g, " ")
        .trim()
        .slice(0, 180) + "...";

    const blogUrl = blog.slug
        ? `blog-detail.php?slug=${encodeURIComponent(blog.slug)}`
        : blog.id
            ? `blog-detail.php?id=${encodeURIComponent(blog.id)}`
            : "#";

    return `
        <div class="col-sm-6">
            <div class="blog-box h-100 sticky-blog-box">
                <div class="blog-image">
                    <a href="${blogUrl}">
                        <img src="${blogImage}" class="img-fluid blog-api-image" alt="${blogTitle}" loading="lazy">
                    </a>
                    <i class="ri-pushpin-fill pinned"></i>
                </div>
                <div class="blog-contain">
                    <a href="${blogUrl}" class="d-flex justify-content-between align-items-start gap-2 text-decoration-none">
                        <h3>${blogTitle}</h3>
                        <i class="ri-arrow-right-up-line"></i>
                    </a>
                    <p class="blog-desc">${blogDescription}</p>
                </div>
            </div>
        </div>
    `;
};

const renderBlogPagination = (totalPages, currentPage) => {
    const paginationNav = document.getElementById("blogPagination");
    if (!paginationNav) return;

    if (totalPages <= 1) {
        paginationNav.style.display = "none";
        return;
    }

    const buildPageItem = (page, label, disabled = false, active = false) => {
        if (disabled) {
            return `<li class="page-item disabled"><span class="page-link">${label}</span></li>`;
        }
        const url = new URL(window.location.href);
        url.searchParams.set("page", page);
        return `<li class="page-item ${active ? "active" : ""}"><a class="page-link" href="${url.pathname + url.search}">${label}</a></li>`;
    };

    const list = [];
    list.push(buildPageItem(Math.max(1, currentPage - 1), '<i class="ri-arrow-left-s-line"></i>', currentPage === 1));

    const startPage = Math.max(1, currentPage - 2);
    const endPage = Math.min(totalPages, currentPage + 2);

    if (startPage > 1) {
        list.push(buildPageItem(1, 1));
    }
    if (startPage > 2) {
        list.push('<li class="page-item disabled"><span class="page-link">...</span></li>');
    }

    for (let i = startPage; i <= endPage; i++) {
        list.push(buildPageItem(i, i, false, i === currentPage));
    }

    if (endPage < totalPages - 1) {
        list.push('<li class="page-item disabled"><span class="page-link">...</span></li>');
    }
    if (endPage < totalPages) {
        list.push(buildPageItem(totalPages, totalPages));
    }

    list.push(buildPageItem(Math.min(totalPages, currentPage + 1), '<i class="ri-arrow-right-s-line"></i>', currentPage === totalPages));

    const ul = paginationNav.querySelector(".pagination");
    if (ul) {
        ul.innerHTML = list.join("");
    }
    paginationNav.style.display = "";
};

const renderBlogListingPage = async () => {
    const blogSection = document.getElementById("blogSection");
    if (!blogSection) return;

    const sidebarRecent = document.getElementById("blogRecentSidebar");

    try {
        const response = await fetch(getBlog);
        const data = await response.json();
        const blogs = Array.isArray(data) ? data : data.data || [];

        if (!blogs.length) {
            blogSection.innerHTML = `
                <div class="col-12 text-center">
                    <p>No blogs available.</p>
                </div>
            `;
            return;
        }

        const sortedBlogs = blogs.slice().sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

        if (sidebarRecent) {
            sidebarRecent.innerHTML = sortedBlogs.slice(0, 4).map((blog) => {
                const link = blog.slug ? `blog-detail.php?slug=${encodeURIComponent(blog.slug)}` : `blog-detail.php?id=${encodeURIComponent(blog.id)}`;
                const img = blog.image ? `${imageBaseUrl}${blog.image}` : "./assets/images/inner-page/blog/1.jpg";
                return `
                    <div class="recent-box">
                        <a href="${link}" class="recent-image">
                            <img src="${img}" class="img-fluid" alt="${blog.title || "No title"}">
                        </a>
                        <div class="recent-detail">
                            <a href="${link}"><h3 class="recent-name">${blog.title || "Untitled"}</h3></a>
                            <p>${formatBlogDate(blog.created_at)}</p>
                        </div>
                    </div>
                `;
            }).join("");
        }

        const currentPage = Math.max(1, parseInt(getQueryParam("page"), 10) || 1);
        const totalPages = Math.max(1, Math.ceil(sortedBlogs.length / ITEMS_PER_PAGE));
        const pageIndex = Math.min(currentPage, totalPages);
        const pageBlogs = sortedBlogs.slice((pageIndex - 1) * ITEMS_PER_PAGE, pageIndex * ITEMS_PER_PAGE);

        blogSection.innerHTML = pageBlogs.map((blog) => createBlogCardHTML(blog)).join("");

        renderBlogPagination(totalPages, pageIndex);
    } catch (error) {
        console.error("Error fetching blog data:", error);
        blogSection.innerHTML = `
            <div class="col-12 text-center">
                <p>Failed to load blogs.</p>
            </div>
        `;
    }
};

document.addEventListener("DOMContentLoaded", async function () { if (false) {
    const blogSection = document.getElementById("blogSection");

    if (blogSection) {
        try {
            const response = await fetch(getBlog);
            const data = await response.json();

            console.log(data, "blog data from api");

            const blogs = Array.isArray(data) ? data : data.data || [];

            blogSection.innerHTML = "";

            blogs.forEach((blog) => {
                const blogImage = blog.image
                    ? `${imageBaseUrl}${blog.image}`
                    : "./assets/images/inner-page/blog/1.jpg";

                const blogTitle = blog.title || "No Title";

                const blogDescription = (blog.description || blog.content || "No description available")
                    .replace(/<[^>]*>/g, "")
                    .replace(/\r\n|\n|\r/g, " ")
                    .trim()
                    .slice(0, 180) + "...";

                const blogUrl = blog.slug
                    ? `blog-detail.php?slug=${encodeURIComponent(blog.slug)}`
                    : blog.id
                        ? `blog-detail.php?id=${encodeURIComponent(blog.id)}`
                        : "#";

                const blogCard = `
                    <div class="col-sm-6">
                        <div class="blog-box h-100 sticky-blog-box">
                            <div class="blog-image">
                                <a href="${blogUrl}">
                                    <img src="${blogImage}" class="img-fluid blog-api-image" alt="${blogTitle}" loading="lazy">
                                </a>
                                <i class="ri-pushpin-fill pinned"></i>
                            </div>

                            <div class="blog-contain">
                                <a href="${blogUrl}" class="d-flex justify-content-between align-items-start gap-2 text-decoration-none">
                                    <h3>${blogTitle}</h3>
                                    <i class="ri-arrow-right-up-line"></i>
                                </a>

                                <p class="blog-desc">${blogDescription}</p>
                            </div>
                        </div>
                    </div>
                `;

                blogSection.innerHTML += blogCard;
            });

        } catch (error) {
            console.error("Error fetching blog data:", error);
            blogSection.innerHTML = `
                <div class="col-12 text-center">
                    <p>Failed to load blogs.</p>
                </div>
            `;
        }
    }

} });

document.addEventListener("DOMContentLoaded", async function () {
    await renderBlogListingPage();
    await renderBlogDetailPage();
});
