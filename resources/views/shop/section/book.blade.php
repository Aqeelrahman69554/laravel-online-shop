<!-- Fruits Shop Start-->
<div id="produk" class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-6 text-start">
                    <h1>Koleksi buku populer</h1>
                </div>
                <div class="col-lg-6 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        {{-- ALL --}}
                        <li class="nav-item">
                            <a href="{{ route('shop') }}#produk"
                                class="d-flex m-2 py-2 rounded-pill {{ request('category') == null ? 'bg-primary text-white' : 'bg-light text-dark' }}">
                                <span style="width: 130px;">All</span>
                            </a>
                        </li>

                        {{-- LOOP CATEGORY --}}
                        @foreach ($categories as $cat)
                            <li class="nav-item">
                                <a href="{{ route('shop', ['category' => $cat->id]) }}#produk"
                                    class="d-flex m-2 py-2 rounded-pill {{ request('category') == $cat->id ? 'bg-primary text-white' : 'bg-light text-dark' }}">
                                    <span style="width: 130px;">
                                        {{ $cat->name }}
                                    </span>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach ($books as $item)
                                    <div class="col-md-6 col-lg-4 col-xl-3">

                                        {{-- box book --}}
                                        <div class="rounded position-relative fruite-item h-100">
                                            <div class="fruite-img">
                                                <img src="{{ asset('/storage/'.$item->books_images) }}"
                                                    class="img-fluid book-img rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute">
                                                Novel
                                            </div>
                                            <div
                                                class="p-4 border border-secondary border-top-0 rounded-bottom d-flex flex-column h-100">

                                                <!-- klik ke detail -->
                                                <a href="{{ route('shopdetail', $item->id) }}"
                                                    class="text-decoration-none text-dark">
                                                    <h4>{{ $item->books_name }}</h4>
                                                    <p class="small">{{ Str::limit($item->books_desc, 80) }}</p>
                                                </a>

                                                <div class="mt-auto d-flex justify-content-between">
                                                    <p class="text-dark fs-5 fw-bold mb-0">
                                                        Rp {{ number_format($item->price, 0, ',', '.') }}
                                                    </p>

                                                    <!-- tombol terpisah -->
                                                    <a href="#"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary">
                                                        <i class="fa fa-shopping-bag me-2"></i> Add to cart
                                                    </a>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End-->
