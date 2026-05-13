    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
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
            <h1 class="mb-4">Fresh fruits shop</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <!-- Top Filter -->
                    <div class="row mb-5 align-items-center g-3">

                        <!-- Search -->
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input type="search" class="form-control py-3 border-0 shadow-sm"
                                    placeholder="Cari buku...">
                                <span class="input-group-text bg-white border-0 shadow-sm">
                                    <i class="fa fa-search text-secondary"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Categories -->
                        <div class="col-lg-5">
                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('shop') }}"
                                    class="btn btn-sm rounded-pill px-4 {{ request('category') ? 'btn-light' : 'btn-success text-white' }}">

                                    Semua

                                </a>
                                @foreach ($categories as $category)
                                    <a href="{{ route('shop', ['category' => $category->id]) }}"
                                        class="btn btn-sm rounded-pill px-4 {{ request('category') == $category->id ? 'btn-success text-white' : 'btn-light' }}">

                                        {{ $category->name }}

                                    </a>
                                @endforeach

                            </div>
                        </div>



                    </div>

                    <!-- Product Grid -->
                    <div class="row g-4 justify-content-center">

                        <div class="col-lg-12">
                            <div class="row g-4 justify-content-center">
                                @foreach ($books as $book)
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <a href="{{ route('shopdetail', $book->id) }}">
                                            <div class="rounded-4 overflow-hidden shadow-sm h-100 product-card">
                                                <div class="fruite-img">
                                                    <img src="{{ asset('storage/' . $book->books_images) }}"
                                                        class="img-fluid w-100" alt="{{ $book->books_name }}">

                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                    style="top: 10px; left: 10px;">Fruits</div>
                                                <div class="p-3 bg-white">

                                                    <!-- Category -->
                                                    <span class="badge bg-light text-dark mb-2 px-3 py-2 rounded-pill">
                                                        Buku
                                                    </span>

                                                    <!-- Title -->
                                                    <h5 class="fw-semibold mb-2 product-title">
                                                        {{ $book->books_name }}
                                                    </h5>

                                                    <!-- Price -->
                                                    <div class="d-flex justify-content-between align-items-center mt-3">

                                                        <h5 class="text-primary fw-bold mb-0">
                                                            Rp {{ number_format($book->price, 0, ',', '.') }}
                                                        </h5>

                                                        <a href="#" class="btn btn-sm rounded-circle cart-btn">
                                                            <i class="fa fa-shopping-bag"></i>
                                                        </a>

                                                    </div>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach




                                <div class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        <a href="#" class="rounded">&laquo;</a>
                                        <a href="#" class="active rounded">1</a>
                                        <a href="#" class="rounded">2</a>
                                        <a href="#" class="rounded">3</a>
                                        <a href="#" class="rounded">4</a>
                                        <a href="#" class="rounded">5</a>
                                        <a href="#" class="rounded">6</a>
                                        <a href="#" class="rounded">&raquo;</a>
                                    </div>
                                </div>
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
