        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <form action="{{ route('shop') }}" method="GET" class="input-group w-75 mx-auto d-flex">
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


        <br><br><br>

        <!-- Single Product Start -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">

                <div class="row g-5 align-items-start">

                    <!-- COVER -->
                    <div class="col-lg-5">
                        <div class="border rounded p-3 shadow-sm bg-white">
                            <img src="{{ asset('/storage/' . $book->books_images) }}" class="img-fluid rounded w-100"
                                style="height: 550px; object-fit: cover;" alt="{{ $book->books_name }}">
                        </div>
                    </div>

                    <!-- DETAIL -->
                    <div class="col-lg-7">

                        <!-- CATEGORY -->
                        <span class="badge bg-secondary px-3 py-2 mb-3">
                            {{ $book->category_name }}
                        </span>

                        <!-- TITLE -->
                        <h1 class="fw-bold mb-3">
                            {{ $book->books_name }}
                        </h1>

                        <!-- AUTHOR -->
                        <h5 class="text-muted mb-4">
                            Penulis : {{ $book->books_author }}
                        </h5>

                        <!-- PRICE -->
                        <h2 class="text-primary fw-bold mb-4">
                            Rp {{ number_format($book->price, 0, ',', '.') }}
                        </h2>

                        <!-- STOCK -->
                        <div class="mb-4">
                            @if ($book->stock > 0)
                                <span class="badge bg-success px-3 py-2">
                                    Stok tersedia : {{ $book->stock }}
                                </span>
                            @else
                                <span class="badge bg-danger px-3 py-2">
                                    Stok Habis
                                </span>
                            @endif
                        </div>

                        <!-- DESCRIPTION -->
                        <div class="mb-4">
                            <h5 class="fw-bold">Deskripsi Buku</h5>

                            <p class="text-muted" style="line-height: 1.9;">
                                {!! nl2br(e($book->books_desc)) !!}
                            </p>
                        </div>

                        <!-- QUANTITY -->
                        <!-- UBAH BAGIAN QUANTITY & BUTTON MENJADI SEPERTI INI -->
                        <form action="{{ route('cart.add', $book->id) }}" method="POST">
                            @csrf
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="input-group quantity" style="width: 140px;">
                                    <button type="button" class="btn btn-outline-secondary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <!-- Pastikan name="quantity" ada di sini -->
                                    <input type="text" name="quantity"
                                        class="form-control text-center border-secondary" value="1">
                                    <button type="button" class="btn btn-outline-secondary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>

                                <button type="submit" class="btn btn-primary rounded-pill px-4 py-2">
                                    <i class="fa fa-shopping-cart me-2"></i> Add To Cart
                                </button>
                            </div>
                        </form>

                        <!-- EXTRA INFO -->
                        <div class="border-top pt-4 mt-4">

                            <div class="row mb-3">
                                <div class="col-4 fw-bold">
                                    Kategori
                                </div>

                                <div class="col-8 text-muted">
                                    {{ $book->category_name }}
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4 fw-bold">
                                    Penulis
                                </div>

                                <div class="col-8 text-muted">
                                    {{ $book->books_author }}
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4 fw-bold">
                                    Stok
                                </div>

                                <div class="col-8 text-muted">
                                    {{ $book->stock }} Buku
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- Single Product End -->


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
