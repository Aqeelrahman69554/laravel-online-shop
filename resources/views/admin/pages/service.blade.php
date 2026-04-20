@extends('admin.layouts.master')

@section('content')
   <div class="container-fluid p-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Manajemen Layanan (Service)</h4>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#serviceModal" onclick="prepareServiceModal('tambah')">
                <i class="fas fa-plus"></i> Tambah Service
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Ikon</th>
                            <th>Nama Layanan</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><i class="{{ $item->icon }} fa-2x"></i></td>
                            <td>{{ $item->service_name }}</td>
                            <td>{{ $item->service_desc }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-warning btn-sm text-white"
                                        data-bs-toggle="modal" data-bs-target="#serviceModal"
                                        onclick="prepareServiceModal('edit', '{{ $item->id }}', '{{ $item->icon }}', '{{ $item->service_name }}', '{{ $item->service_desc }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('admin.service.delete', $item->id) }}" method="POST" onsubmit="return confirm('Hapus service ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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

<div class="modal fade" id="serviceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviceModalTitle">Tambah Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="serviceForm" method="POST">
                @csrf
                <div id="serviceMethodPlaceholder"></div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Icon Class (FontAwesome)</label>
                        <input type="text" class="form-control" name="icon" id="input_icon" placeholder="ex: fa-solid fa-truck" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control" name="service_name" id="input_service_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="service_desc" id="input_service_desc" rows="3" required></textarea>
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
    function prepareServiceModal(mode, id = '', icon = '', name = '', desc = '') {
        const form = document.getElementById('serviceForm');
        const modalTitle = document.getElementById('serviceModalTitle');
        const methodPlaceholder = document.getElementById('serviceMethodPlaceholder');

        if (mode === 'tambah') {
            modalTitle.innerText = 'Tambah Service';
            form.action = "{{ route('admin.service.store') }}";
            methodPlaceholder.innerHTML = '';
            document.getElementById('input_icon').value = '';
            document.getElementById('input_service_name').value = '';
            document.getElementById('input_service_desc').value = '';
        } else {
            modalTitle.innerText = 'Edit Service';
            form.action = "/admin/service/update/" + id;
            methodPlaceholder.innerHTML = '@method("PUT")';
            document.getElementById('input_icon').value = icon;
            document.getElementById('input_service_name').value = name;
            document.getElementById('input_service_desc').value = desc;
        }
    }
</script>
@endsection
