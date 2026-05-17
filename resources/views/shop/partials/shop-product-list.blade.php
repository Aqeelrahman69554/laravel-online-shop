<div class="row g-4 justify-content-center">
    @forelse ($books as $book)
        <div class="col-6 col-md-4 col-lg-3">
            <a href="{{ route('shopdetail', $book->id) }}">
                <div class="rounded-4 overflow-hidden shadow-sm h-100 product-card">
                    <div class="fruite-img">
                        <img src="{{ asset('storage/' . $book->books_images) }}" class="img-fluid w-100"
                            alt="{{ $book->books_name }}">
                    </div>
                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                        style="top: 10px; left: 10px;">Fruits</div>
                    <div class="p-3 bg-white">
                        <span class="badge bg-light text-dark mb-2 px-3 py-2 rounded-pill">
                            Buku
                        </span>

                        <h5 class="fw-semibold mb-2 product-title">
                            {{ $book->books_name }}
                        </h5>

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
    @empty
        <div class="col-12">
            <div class="text-center py-5">
                <h5 class="text-primary mb-2">Buku tidak ditemukan</h5>
                <p class="mb-0 text-muted">Coba gunakan kata kunci lain.</p>
            </div>
        </div>
    @endforelse

    @if ($books->hasPages())
        <div class="col-12">
            <div class="pagination shop-pagination d-flex justify-content-center mt-5">
                @if ($books->onFirstPage())
                    <a href="javascript:void(0)" class="rounded disabled">&laquo;</a>
                @else
                    <a href="{{ $books->appends(request()->query())->previousPageUrl() }}" class="rounded">&laquo;</a>
                @endif

                @foreach ($books->appends(request()->query())->getUrlRange(1, $books->lastPage()) as $page => $url)
                    @if ($page == $books->currentPage())
                        <a href="javascript:void(0)" class="active rounded">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}" class="rounded">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($books->hasMorePages())
                    <a href="{{ $books->appends(request()->query())->nextPageUrl() }}" class="rounded">&raquo;</a>
                @else
                    <a href="javascript:void(0)" class="rounded disabled">&raquo;</a>
                @endif
            </div>
        </div>
    @endif
</div>
