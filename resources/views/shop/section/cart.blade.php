<!-- Spinner Start -->
<div id="spinner"
    class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->




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
<div class="container-fluid page-header py-5"
    style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('shop/img/cart-bg.jpg') }}'); background-size: cover;">
    <h1 class="text-center text-white display-6 fw-bold">Shopping Cart</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
        <li class="breadcrumb-item active text-white">Cart</li>
    </ol>
</div>
<div class="container-fluid py-5 bg-light">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="table-responsive bg-white shadow-sm rounded-4 p-4">
                    <table class="table align-middle">
                        <thead class="text-muted border-bottom">
                            <tr>
                                <th scope="col" class="py-3">Produk</th>
                                <th scope="col" class="py-3">Info</th>
                                <th scope="col" class="py-3">Harga</th>
                                <th scope="col" class="py-3">Jumlah</th>
                                <th scope="col" class="py-3">Total</th>
                                <th scope="col" class="py-3 text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $subtotal = 0; @endphp
                            @forelse ($carts as $item)
                                @if ($item->book)
                                    @php
                                        $itemTotal = ($item->book->price ?? 0) * $item->quantity;
                                        $subtotal += $itemTotal;
                                    @endphp
                                    <tr>
                                        <th scope="row" class="py-4">
                                            <img src="{{ asset('storage/' . $item->book->books_images) }}"
                                                class="img-fluid rounded-3 shadow-sm"
                                                style="width: 70px; height: 90px; object-fit: cover;"
                                                alt="{{ $item->book->books_name }}">
                                        </th>
                                        <td>
                                            <h6 class="mb-0 fw-bold text-dark">{{ $item->book->books_name }}</h6>
                                            <small class="text-muted">Buku Fisik</small>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-dark">Rp
                                                {{ number_format($item->book->price, 0, ',', '.') }}</p>
                                        </td>
                                        <td>
                                            <div class="input-group quantity" style="width: 100px;">
                                                <input type="text"
                                                    class="form-control form-control-sm text-center border shadow-none bg-light rounded-pill"
                                                    value="{{ $item->quantity }}">
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 fw-bold text-primary">Rp
                                                {{ number_format($itemTotal, 0, ',', '.') }}</p>
                                        </td>
                                        <td class="text-end">
                                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-danger rounded-circle border-0 p-2 shadow-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif

                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="py-4">
                                            <i class="fa fa-shopping-cart fa-4x text-muted mb-3 d-block"></i>
                                            <h5 class="text-muted">Keranjang Anda masih kosong</h5>
                                            <a href="{{ route('shop') }}"
                                                class="btn btn-primary rounded-pill mt-3 px-4">Mulai Belanja</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 p-4 bg-white shadow-sm rounded-4 d-flex flex-wrap gap-3 align-items-center">
                    <input type="text" class="form-control border-0 bg-light rounded-pill px-4 py-2 flex-grow-1"
                        placeholder="Masukkan Kode Kupon" style="max-width: 300px;">
                    <button class="btn btn-dark rounded-pill px-4 py-2" type="button">Pakai Kupon</button>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-dark py-3">
                        <h5 class="mb-0 text-white text-center">Ringkasan Belanja</h5>
                    </div>
                    <div class="card-body p-4 bg-white">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Subtotal ({{ count($carts) }} Produk)</span>
                            <span class="fw-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="text-muted">Biaya Layanan</span>
                            <span class="text-success">Rp 2.000</span>
                        </div>
                        <hr class="dashed">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0 fw-bold">Total Tagihan</h5>
                            <h4 class="mb-0 fw-bold text-primary">Rp
                                {{ number_format($subtotal + 2000, 0, ',', '.') }}</h4>
                        </div>
                        <button class="btn btn-primary w-100 rounded-pill py-3 fw-bold text-uppercase shadow-sm"
                            type="button" {{ count($carts) == 0 ? 'disabled' : '' }}>
                            Checkout Sekarang
                        </button>

                        <div class="mt-4 text-center">
                            <small class="text-muted"><i class="fa fa-shield-alt me-1"></i> Transaksi Aman &
                                Terenkripsi</small>
                        </div>
                    </div>
                </div>

                <a href="{{ route('shop') }}" class="btn btn-link w-100 text-decoration-none mt-3 text-muted">
                    <i class="fa fa-arrow-left me-2 small"></i> Lanjut Belanja
                </a>
            </div>
        </div>
    </div>
</div>
<style>
    /* Tambahkan di CSS kamu */
    .dashed {
        border-top: 1px dashed #dee2e6;
        opacity: 1;
    }

    .rounded-4 {
        border-radius: 1.25rem !important;
    }

    .btn-primary {
        background-color: #81c408;
        /* Sesuaikan dengan warna primer Tobukel kamu */
        border-color: #81c408;
    }

    .text-primary {
        color: #81c408 !important;
    }

    .page-header {
        position: relative;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
<!-- Single Page Header End -->

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
