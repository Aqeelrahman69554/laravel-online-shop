<div class="row g-4">

    @foreach ($books as $item)
        <div class="col-md-6 col-lg-4 col-xl-3">

            <div class="rounded position-relative fruite-item h-100">

                <div class="fruite-img">
                    <img src="{{ asset('/storage/' . $item->books_images) }}" class="img-fluid book-img rounded-top"
                        alt="">
                </div>

                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute">
                    Novel
                </div>

                <div class="p-4 border border-secondary border-top-0 rounded-bottom d-flex flex-column h-100">

                    <a href="{{ route('shopdetail', $item->id) }}" class="text-decoration-none text-dark">

                        <h4>{{ $item->books_name }}</h4>

                        <p class="small">
                            {{ Str::limit($item->books_desc, 80) }}
                        </p>

                    </a>

                    <div class="mt-auto d-flex justify-content-between">

                        <p class="text-dark fs-5 fw-bold mb-0">
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </p>

                        <form action="{{ route('cart.add', $item->id) }}" method="POST">
                            @csrf

                            <input type="hidden" name="quantity" value="1">

                            <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary">

                                <i class="fa fa-shopping-bag me-2"></i>
                                Add to cart

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    @endforeach

</div>
