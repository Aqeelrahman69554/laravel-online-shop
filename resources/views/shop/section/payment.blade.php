<div id="spinner"
    class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50 d-flex align-items-center justify-content-center"
    style="z-index: 9999;">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<div class="container-fluid page-header py-5"
    style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('shop/img/cart-bg.jpg') }}'); background-size: cover; background-position: center;">
    <h1 class="text-center text-white display-6 fw-bold">Checkout Pembayaran</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('cart.index') }}" class="text-white">Cart</a></li>
        <li class="breadcrumb-item active text-white">Payment</li>
    </ol>
</div>
<div class="container-fluid py-5 bg-light">
    <div class="container py-5">
        <div class="row justify-content-center g-5">

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                    <div class="card-header bg-dark py-3">
                        <h5 class="mb-0 text-white text-center text-uppercase tracking-wider">Metode Pembayaran</h5>
                    </div>

                    <div class="card-body p-5 bg-white text-center">
                        <div class="mb-4 text-warning">
                            <i class="fa fa-wallet fa-4x animate-pulse"></i>
                        </div>

                        <h4 class="fw-bold text-dark mb-2">Satu Langkah Lagi!</h4>
                        <p class="text-muted mb-4">
                            Silakan lakukan penyelesaian pembayaran aman Anda untuk nomor invoice berikut:
                        </p>

                        <div class="mb-4">
                            <span
                                class="d-inline-block bg-light text-dark fw-bold border px-4 py-2 rounded-pill shadow-sm">
                                <i class="fa fa-file-invoice me-2 text-muted"></i>{{ $invoiceNumber }}
                            </span>
                        </div>

                        <hr class="dashed my-4">

                        <p class="text-muted small text-uppercase fw-semibold mb-1">Total Tagihan Yang Harus Dibayar</p>
                        <h2 class="mb-4 fw-extrabold text-primary">
                            Rp {{ number_format($totalPrice, 0, ',', '.') }}
                        </h2>

                        <button id="pay-button"
                            class="btn btn-primary w-100 rounded-pill py-3 fw-bold text-uppercase shadow-sm text-white transition-all">
                            <i class="fa fa-credit-card me-2"></i>Bayar Sekarang
                        </button>
                    </div>
                </div>

                <a href="{{ route('home') }}" class="btn btn-link w-100 text-decoration-none text-muted text-center">
                    <i class="fa fa-arrow-left me-2 small"></i> Kembali ke Beranda Toko
                </a>
            </div>

        </div>
    </div>
</div>
<style>
    .dashed {
        border-top: 1px dashed #dee2e6;
        opacity: 1;
    }

    .rounded-4 {
        border-radius: 1.25rem !important;
    }

    .fw-extrabold {
        font-weight: 800 !important;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    .animate-pulse {
        animation: pulse 2s infinite ease-in-out;
    }

    .btn-primary {
        background-color: #81c408;
        border-color: #81c408;
    }

    .btn-primary:hover {
        background-color: #6da307;
        border-color: #6da307;
    }

    .text-primary {
        color: #81c408 !important;
    }
</style>

<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script type="text/javascript">
    // Menggunakan Vanilla JS agar tidak bergantung pada jQuery bawaan template
    document.addEventListener('DOMContentLoaded', function() {

        // 1. Hilangkan spinner loader secara otomatis
        var spinner = document.getElementById('spinner');
        if (spinner) {
            spinner.classList.remove('show');
        }

        // 2. Pasang event click pada tombol bayar
        var payButton = document.getElementById('pay-button');
        if (payButton) {
            payButton.addEventListener('click', function(e) {
                e.preventDefault();

                // Panggil popup panel enkripsi Midtrans menggunakan snapToken
                window.snap.pay('{{ $snapToken }}', {

                    onSuccess: function(result) {
                        console.log('Midtrans Success:', result);
                        alert("Pembayaran Terverifikasi! Terima kasih telah berbelanja.");

                        window.location.href = "{{ route('checkout.success.clear') }}";
                    },

                    onPending: function(result) {
                        console.log('Midtrans Pending:', result);
                        alert(
                            "Instruksi pembayaran disimpan. Segera selesaikan transaksi Anda!"
                            );
                        window.location.href = "{{ route('home') }}";
                    },

                    onError: function(result) {
                        console.error('Midtrans Error:', result);
                        alert("Maaf, terjadi kendala teknis pada sistem pembayaran.");
                    },

                    onClose: function() {
                        alert('Anda membatalkan atau menutup popup halaman pembayaran.');
                    }
                });
            });
        }
    });
</script>
