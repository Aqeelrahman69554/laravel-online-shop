<div class="container-fluid page-header py-5"
    style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('shop/img/cart-bg.jpg') }}'); background-size: cover; background-position: center;">
    <h1 class="text-center text-white display-6 fw-bold">Riwayat Pesanan</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
        <li class="breadcrumb-item active text-white">History</li>
    </ol>
</div>
<div class="container-fluid py-5 bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                @forelse ($orders as $order)
                    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
                        <div
                            class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
                            <div>
                                <span class="text-muted small">Tanggal Transaksi</span>
                                <h6 class="mb-0 fw-bold text-dark">
                                    {{ \Carbon\Carbon::parse($order->order_date)->format('d M Y, H:i') }} WIB</h6>
                            </div>
                            <div>
                                @if ($order->status == 'paid' || $order->status == 'success')
                                    <span class="badge bg-success rounded-pill px-3 py-2 text-uppercase">Lunas</span>
                                @elseif($order->status == 'pending')
                                    <span
                                        class="badge bg-warning text-dark rounded-pill px-3 py-2 text-uppercase">Menunggu
                                        Pembayaran</span>
                                @else
                                    <span class="badge bg-danger rounded-pill px-3 py-2 text-uppercase">Gagal</span>
                                @endif
                            </div>
                        </div>

                        <div class="card-body p-4">
                            @foreach ($order->items as $item)
                                <div class="d-flex align-items-center mb-3 pb-3 border-bottom border-light">
                                    <img src="{{ asset('storage/' . $item->books_images) }}"
                                        class="rounded-3 shadow-sm me-3"
                                        style="width: 50px; height: 70px; object-fit: cover;"
                                        alt="{{ $item->books_name }}">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 fw-bold text-dark">{{ $item->books_name }}</h6>
                                        <small class="text-muted">{{ $item->quantity }} x Rp
                                            {{ number_format($item->price, 0, ',', '.') }}</small>
                                    </div>
                                    <div class="text-end">
                                        <span class="fw-semibold text-dark">Rp
                                            {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            @endforeach

                            <div class="d-flex justify-content-between align-items-center mt-3 pt-2">
                                <span class="text-muted fw-medium">Total Pembayaran (Termasuk Layanan):</span>
                                <h5 class="mb-0 fw-extrabold text-primary">Rp
                                    {{ number_format($order->total_price, 0, ',', '.') }}</h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card border-0 shadow-sm rounded-4 p-5 text-center bg-white">
                        <div class="py-4">
                            <i class="fas fa-history fa-4x text-muted mb-3 d-block"></i>
                            <h5 class="text-muted">Anda belum pernah melakukan transaksi apa pun.</h5>
                            <a href="{{ route('shop') }}"
                                class="btn btn-primary rounded-pill mt-3 px-4 text-white">Mulai Belanja Buku</a>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</div>

<style>
    .rounded-4 {
        border-radius: 1.25rem !important;
    }

    .fw-extrabold {
        font-weight: 800 !important;
    }

    .btn-primary {
        background-color: #8b5e3c !important;
        border-color: #8b5e3c !important;
        color: #fff !important;
    }

    .text-primary {
        color: #8b5e3c !important;
    }
</style>
