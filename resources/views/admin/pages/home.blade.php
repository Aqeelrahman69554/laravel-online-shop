@extends('admin.layouts.master')

@section('content')
<div class="container-fluid p-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Pengaturan Halaman Utama</h4>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#homeModal" onclick="prepareModal('tambah')">
                <i class="fas fa-plus"></i> Tambah Data
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($homes as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->home_image) }}" alt="image" width="100" class="rounded border">
                            </td>
                            <td>{{ $item->home_title }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-warning btn-sm text-white"
                                        data-bs-toggle="modal"
                                        data-bs-target="#homeModal"
                                        onclick="prepareModal('edit', '{{ $item->id }}', '{{ $item->home_title }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <form action="{{ route('admin.home.delete', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
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

<div class="modal fade" id="homeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="homeForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="methodPlaceholder"></div> <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul (Title)</label>
                        <input type="text" class="form-control" name="home_title" id="input_title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar (Image)</label>
                        <input type="file" class="form-control" name="home_image" id="input_image">
                        <small class="text-muted" id="imageHelp">Pilih gambar jika ingin mengganti.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function prepareModal(mode, id = '', title = '') {
    const form = document.getElementById('homeForm');
    const modalTitle = document.getElementById('modalTitle');
    const methodPlaceholder = document.getElementById('methodPlaceholder');
    const imageHelp = document.getElementById('imageHelp');

    if (mode === 'tambah') {
        modalTitle.innerText = 'Tambah Data Home';
        form.action = "{{ route('admin.home.store') }}";
        methodPlaceholder.innerHTML = '';
        document.getElementById('input_title').value = '';
        imageHelp.style.display = 'none';
    } else {
        modalTitle.innerText = 'Edit Data Home';
        // Gunakan backticks (template literals) agar lebih rapi
        form.action = `/admin/home/update/${id}`;

        // Perbaikan di sini: Gunakan string murni untuk input hidden
        methodPlaceholder.innerHTML = '<input type="hidden" name="_method" value="PUT">';

        document.getElementById('input_title').value = title;
        imageHelp.style.display = 'block';
    }
}
</script>
@endsection
