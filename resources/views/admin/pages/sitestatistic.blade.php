@extends('admin.layouts.master')

@section('content')
<div class="container-fluid p-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="card-title">Kelola Statistik Frontend</h4>
                <p class="text-muted small mb-0">Kelola data counter yang tampil di halaman utama.</p>
            </div>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#statisticModal" onclick="prepareModal('tambah')">
                <i class="fas fa-plus"></i> Tambah Statistik
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 80px;">Icon</th>
                            <th>Judul / Penjelasan</th>
                            <th>Jumlah (Angka)</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Contoh Baris Data --}}
                        <tr>
                            <td class="text-center text-warning"><i class="fas fa-users fa-2x"></i></td>
                            <td><span class="fw-bold text-success text-uppercase">Satisfied Customers</span></td>
                            <td><h5 class="mb-0">1963</h5></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm text-white"
                                        data-bs-toggle="modal"
                                        data-bs-target="#statisticModal"
                                        onclick="prepareModal('edit', 'Satisfied Customers', '1963', 'fa-users')">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="statisticModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Tambah Statistik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Icon (FontAwesome Class)</label>
                        <input type="text" class="form-control" id="form_icon" name="icon" placeholder="Contoh: fa-users">
                        <div class="form-text">Cari ikon di <a href="https://fontawesome.com/" target="_blank">fontawsome</a></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul / Penjelasan</label>
                        <input type="text" class="form-control" id="form_title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah (Angka/Persen)</label>
                        <input type="text" class="form-control" id="form_value" name="value" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="btnSubmit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function prepareModal(mode, title = '', value = '', icon = '') {
        const modalTitle = document.getElementById('modalTitle');
        const btnSubmit = document.getElementById('btnSubmit');

        if(mode === 'tambah') {
            modalTitle.innerText = 'Tambah Statistik Baru';
            btnSubmit.innerText = 'Tambah Data';
            // Kosongkan form
            document.getElementById('form_title').value = '';
            document.getElementById('form_value').value = '';
            document.getElementById('form_icon').value = '';
        } else {
            modalTitle.innerText = 'Edit Statistik';
            btnSubmit.innerText = 'Simpan Perubahan';
            // Isi form dengan data yang ada
            document.getElementById('form_title').value = title;
            document.getElementById('form_value').value = value;
            document.getElementById('form_icon').value = icon;
        }
    }
</script>
@endsection
