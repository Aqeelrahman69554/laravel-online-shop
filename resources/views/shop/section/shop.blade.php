    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <form action="{{ route('shop') }}" method="GET" class="shop-search-form input-group w-75 mx-auto d-flex">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <input type="search" name="search" class="form-control p-3" placeholder="keywords"
                            value="{{ request('search') }}"
                            aria-describedby="search-icon-1">
                        <button id="search-icon-1" type="submit" class="input-group-text p-3 border-0">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">List Product Buku</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <!-- Top Filter -->
                    <div class="row mb-5 align-items-center g-3">

                        <!-- Search -->
                        <div class="col-lg-4">
                            <form action="{{ route('shop') }}" method="GET" class="shop-search-form input-group">
                                @if (request('category'))
                                    <input type="hidden" name="category" value="{{ request('category') }}">
                                @endif
                                <input id="shop-search-input" type="search" name="search"
                                    class="form-control py-3 border-0 shadow-sm" placeholder="Cari buku..."
                                    value="{{ request('search') }}">
                                <button type="submit" class="input-group-text bg-white border-0 shadow-sm">
                                    <i class="fa fa-search text-secondary"></i>
                                </button>
                            </form>
                        </div>

                        <!-- Categories -->
                        <div class="col-lg-5">
                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('shop') }}"
                                    data-category=""
                                    class="shop-category-btn btn btn-sm rounded-pill px-4 {{ request('category') ? 'btn-light' : 'btn-success text-white' }}">

                                    Semua

                                </a>
                                @foreach ($categories as $category)
                                    <a href="{{ route('shop', ['category' => $category->id]) }}"
                                        data-category="{{ $category->id }}"
                                        class="shop-category-btn btn btn-sm rounded-pill px-4 {{ request('category') == $category->id ? 'btn-success text-white' : 'btn-light' }}">

                                        {{ $category->name }}

                                    </a>
                                @endforeach

                            </div>
                        </div>



                    </div>

                    <!-- Product Grid -->
                    <div class="row g-4 justify-content-center">

                        <div class="col-lg-12">
                            <div id="shop-product-list">
                                @include('shop.partials.shop-product-list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const productList = document.getElementById("shop-product-list");
            const categoryButtons = document.querySelectorAll(".shop-category-btn");
            const searchForms = document.querySelectorAll(".shop-search-form");

            if (!productList || categoryButtons.length === 0) {
                return;
            }

            function setActiveCategory(categoryId) {
                categoryButtons.forEach(function(button) {
                    button.classList.remove("btn-success", "text-white");
                    button.classList.add("btn-light");

                    if (button.dataset.category === categoryId) {
                        button.classList.remove("btn-light");
                        button.classList.add("btn-success", "text-white");
                    }
                });
            }

            function getActiveCategory() {
                const activeButton = document.querySelector(".shop-category-btn.btn-success");

                return activeButton ? activeButton.dataset.category : "";
            }

            function getSearchKeyword() {
                const searchInput = document.getElementById("shop-search-input");

                return searchInput ? searchInput.value.trim() : "";
            }

            function buildShopUrl(categoryId = getActiveCategory(), searchKeyword = getSearchKeyword()) {
                const url = new URL("{{ route('shop') }}", window.location.origin);

                if (categoryId) {
                    url.searchParams.set("category", categoryId);
                }

                if (searchKeyword) {
                    url.searchParams.set("search", searchKeyword);
                }

                return url.toString();
            }

            function loadShopProducts(url, categoryId = null) {
                productList.classList.add("product-loading");

                fetch(url, {
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        }
                    })
                    .then(function(response) {
                        return response.text();
                    })
                    .then(function(html) {
                        setTimeout(function() {
                            productList.innerHTML = html;
                            productList.classList.remove("product-loading");
                            productList.classList.add("product-show");

                            if (categoryId !== null) {
                                setActiveCategory(categoryId);
                            }

                            window.history.pushState({}, "", url);

                            setTimeout(function() {
                                productList.classList.remove("product-show");
                            }, 400);
                        }, 200);
                    });
            }

            categoryButtons.forEach(function(button) {
                button.addEventListener("click", function(e) {
                    e.preventDefault();
                    loadShopProducts(buildShopUrl(this.dataset.category), this.dataset.category);
                });
            });

            searchForms.forEach(function(form) {
                form.addEventListener("submit", function(e) {
                    e.preventDefault();

                    const input = form.querySelector('input[name="search"]');
                    const searchKeyword = input ? input.value.trim() : "";

                    document.querySelectorAll('input[name="search"]').forEach(function(searchInput) {
                        searchInput.value = searchKeyword;
                    });

                    loadShopProducts(buildShopUrl(getActiveCategory(), searchKeyword));
                });
            });

            productList.addEventListener("click", function(e) {
                const paginationLink = e.target.closest(".shop-pagination a");

                if (!paginationLink || paginationLink.classList.contains("disabled") ||
                    paginationLink.classList.contains("active")) {
                    return;
                }

                e.preventDefault();
                loadShopProducts(paginationLink.href);
            });
        });
    </script>
