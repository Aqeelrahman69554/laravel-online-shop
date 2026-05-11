<!-- Fruits Shop Start-->
<div id="produk" class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-6 text-start">
                    <h1>Koleksi buku populer</h1>
                </div>
                <div class="col-lg-6">

                    <div class="category-scroll">

                        <ul class="nav nav-pills flex-nowrap mb-5">

                            {{-- ALL --}}
                            <li class="nav-item flex-shrink-0">
                                <a href="javascript:void(0)" data-id="all"
                                    class="category-btn d-flex m-2 py-2 rounded-pill {{ request('category') == null ? 'bg-primary text-white' : 'bg-light text-dark' }}">

                                    <span class="px-4">All</span>

                                </a>
                            </li>

                            {{-- LOOP CATEGORY --}}
                            @foreach ($categories as $cat)
                                <li class="nav-item flex-shrink-0">

                                    <a href="javascript:void(0)" data-id="{{ $cat->id }}"
                                        class="category-btn nav-link-custom d-flex m-2 py-2 rounded-pill {{ request('category') == $cat->id ? 'bg-primary text-white' : 'bg-light text-dark' }}">

                                        <span class="px-4">
                                            {{ $cat->name }}
                                        </span>

                                    </a>

                                </li>
                            @endforeach

                        </ul>

                    </div>

                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div id="product-list">
                                @include('shop.partials.product-list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End-->
