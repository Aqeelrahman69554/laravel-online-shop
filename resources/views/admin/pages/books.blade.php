@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid p-4">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Katalog Buku</h4>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bookModal"
                    onclick="prepareBookModal('tambah')">
                    <i class="fas fa-plus"></i> Tambah Buku
                </button>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="btn-group flex-wrap" role="group" aria-label="Filter Kategori">
                        <a href="{{ route('admin.books') }}"
                            class="btn {{ !request('category_id') ? 'btn-primary' : 'btn-outline-primary' }}">
                            Semua
                        </a>

                        @foreach ($categories as $cat)
                            <a href="{{ route('admin.books', ['category_id' => $cat->id]) }}"
                                class="btn {{ request('category_id') == $cat->id ? 'btn-primary' : 'btn-outline-primary' }}">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Cover</th>
                                <th>Judul & Penulis</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->books_images) }}" width="70"
                                            class="rounded shadow-sm">
                                    </td>
                                    <td>
                                        <strong>{{ $item->books_name }}</strong><br>
                                        <small class="text-muted">{{ $item->books_author }}</small>
                                    </td>
                                    <td><span class="badge bg-info text-dark">{{ $item->category->name }}</span></td>
                                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <button class="btn btn-warning btn-sm text-white"
                                                onclick="prepareBookModal('edit', '{{ $item->id }}', '{{ $item->books_name }}', '{{ $item->category_id }}', '{{ $item->books_author }}', '{{ $item->price }}', '{{ $item->stock }}', '{{ $item->books_desc }}')"
                                                data-bs-toggle="modal" data-bs-target="#bookModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('admin.books.delete', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Hapus buku ini?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bookModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="bookForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="bookMethod"></div>
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookTitle">Tambah Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Judul Buku</label>
                                <input type="text" class="form-control" name="books_name" id="in_name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select" name="category_id" id="in_category" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Penulis</label>
                                <input type="text" class="form-control" name="books_author" id="in_author" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" class="form-control" name="price" id="in_price" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Stok</label>
                                <input type="number" class="form-control" name="stock" id="in_stock" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Cover Buku</label>
                                <input type="file" class="form-control" name="books_images" id="in_image">
                                <small class="text-muted" id="helpImage"></small>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="books_desc" id="in_desc" rows="4" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function prepareBookModal(mode, id = '', name = '', catId = '', author = '', price = '', stock = '', desc = '') {
            const form = document.getElementById('bookForm');
            const method = document.getElementById('bookMethod');
            const imgInput = document.getElementById('in_image');

            if (mode === 'tambah') {
                document.getElementById('bookTitle').innerText = 'Tambah Buku Baru';
                form.action = "{{ route('admin.books.store') }}";
                method.innerHTML = '';
                form.reset();
                imgInput.required = true;
                document.getElementById('helpImage').innerText = '';
            } else {
                document.getElementById('bookTitle').innerText = 'Edit Buku';
                form.action = "/admin/books/update/" + id;
                method.innerHTML = '@method('PUT')';
                imgInput.required = false;
                document.getElementById('helpImage').innerText = 'Kosongkan jika tidak ingin mengganti cover.';

                document.getElementById('in_name').value = name;
                document.getElementById('in_category').value = catId;
                document.getElementById('in_author').value = author;
                document.getElementById('in_price').value = price;
                document.getElementById('in_stock').value = stock;
                document.getElementById('in_desc').value = desc;
            }
        }
    </script>
@endsection
