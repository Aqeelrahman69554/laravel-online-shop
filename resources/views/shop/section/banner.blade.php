<!-- Banner Section Start-->
@php
    $bannerImage = $banners && \Illuminate\Support\Str::contains($banners->image, '/')
        ? asset('storage/' . $banners->image)
        : asset('shop/img/banner-book.png');
@endphp

<div class="container-fluid banner bg-secondary my-5">
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="py-4">
                    <h1 class="display-3 text-white">{{ $banners->title ?? 'Diskon Buku Terbaik' }}</h1>
                    <p class="fw-normal display-5 text-light mb-4">
                        {{ $banners->sub_title ?? 'Temukan Bacaan Favoritmu' }}
                    </p>
                    <p class="mb-4 text-light">
                        {{ $banners->description ?? 'Nikmati koleksi buku terbaik mulai dari novel, edukasi, hingga komik dengan harga spesial hanya di TOBUKEL.' }}
                    </p>
                    <a href="{{ route('shop') }}" class="banner-btn btn rounded-pill py-3 px-5">
                        Belanja Sekarang
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="{{ $bannerImage }}" class="img-fluid w-100 rounded" alt="Banner promo">
                    <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute"
                        style="width: 140px; height: 140px; top: 0; left: 0;">

                        <div class="text-center">
                            <h2 class="mb-0">{{ $banners->discount ?? '50%' }}</h2>
                            <span>OFF</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->
