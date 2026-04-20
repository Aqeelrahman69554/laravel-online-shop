@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid p-4">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Kategori Buku</h4>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#categoryModal"
                    onclick="prepareCategoryModal('tambah')">
                    <i class="fas fa-plus"></i> Tambah Kategori
                </button>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 80px;">No</th>
                                <th>Nama Kategori</th>
                                <th>Slug</th>
                                <th>Total Buku</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><strong>{{ $item->name }}</strong></td>
                                    <td><code>{{ $item->slug }}</code></td>
                                    <td>{{ $item->books->count() }} Buku</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <button class="btn btn-warning btn-sm text-white"
                                                onclick="prepareCategoryModal('edit', '{{ $item->id }}', '{{ $item->name }}')"
                                                data-bs-toggle="modal" data-bs-target="#categoryModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('admin.categories.delete', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Hapus kategori ini?')">
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

    <div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="categoryForm" method="POST">
                    @csrf
                    <div id="categoryMethod"></div>
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryTitle">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" name="name" id="in_category_name"
                                placeholder="Contoh: Ilmu Komputer" required>
                            <small class="text-muted">Slug akan dihasilkan secara otomatis.</small>
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
        function prepareCategoryModal(mode, id = '', name = '') {
            const form = document.getElementById('categoryForm');
            const method = document.getElementById('categoryMethod');
            const title = document.getElementById('categoryTitle');
            const inputName = document.getElementById('in_category_name');

            if (mode === 'tambah') {
                title.innerText = 'Tambah Kategori Baru';
                form.action = "{{ route('admin.categories.store') }}";
                method.innerHTML = '';
                inputName.value = '';
            } else {
                title.innerText = 'Edit Kategori';
                form.action = "/admin/categories/update/" + id;
                method.innerHTML = '@method('PUT')';
                inputName.value = name;
            }
        }
    </script>
@endsection
