@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid p-4">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Service 2</h4>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#statModal"
                    onclick="prepareStatModal('tambah')">
                    <i class="fas fa-plus"></i> Tambah Statistik
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Ikon</th>
                                <th>Judul</th>
                                <th>Nilai (Value)</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($service2 as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><i class="{{ $item->icon }} fa-2x text-primary"></i></td>
                                    <td><strong>{{ $item->title }}</strong></td>
                                    <td><span class="badge bg-secondary">{{ $item->value }}</span></td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <button class="btn btn-warning btn-sm text-white"
                                                onclick="prepareStatModal('edit', '{{ $item->id }}', '{{ $item->icon }}', '{{ $item->title }}', '{{ $item->value }}')"
                                                data-bs-toggle="modal" data-bs-target="#statModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('admin.service2.delete', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Hapus statistik ini?')">
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

    <div class="modal fade" id="statModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="statForm" method="POST">
                    @csrf
                    <div id="statMethod"></div>
                    <div class="modal-header">
                        <h5 class="modal-title" id="statTitle">Tambah Statistik</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Ikon (FontAwesome Class)</label>
                            <input type="text" class="form-control" name="icon" id="in_icon"
                                placeholder="fa-solid fa-star" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul Statistik</label>
                            <input type="text" class="form-control" name="title" id="in_title"
                                placeholder="Contoh: Koleksi Buku" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nilai / Angka</label>
                            <input type="text" class="form-control" name="value" id="in_value"
                                placeholder="Contoh: 1.000+" required>
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
        function prepareStatModal(mode, id = '', icon = '', title = '', value = '') {
            const form = document.getElementById('statForm');
            const method = document.getElementById('statMethod');
            const modalTitle = document.getElementById('statTitle');

            if (mode === 'tambah') {
                modalTitle.innerText = 'Tambah Statistik Baru';
                form.action = "{{ route('admin.service2.store') }}";
                method.innerHTML = '';
                form.reset();
            } else {
                modalTitle.innerText = 'Edit Statistik';
                form.action = "/admin/service2/update/" + id;
                method.innerHTML = '@method('PUT')';

                document.getElementById('in_icon').value = icon;
                document.getElementById('in_title').value = title;
                document.getElementById('in_value').value = value;
            }
        }
    </script>
@endsection
