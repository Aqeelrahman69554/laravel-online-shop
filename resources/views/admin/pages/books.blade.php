@extends('admin.layouts.master')

@section('content')
<div class="container-fluid p-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Data Buku</h4>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#productModal" onclick="prepareModal('tambah')">
                <i class="fas fa-plus"></i> Tambah Buku
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td><img src="https://via.placeholder.com/50" class="rounded shadow-sm"></td>
                            <td>Laravel Untuk Pemula</td>
                            <td>Programming</td>
                            <td><span class="badge bg-success">Ready (10)</span></td>
                            <td>Rp 150.000</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">

                                    <!-- BUTTON EDIT -->
                                    <button class="btn btn-warning btn-sm text-white"
                                        data-bs-toggle="modal"
                                        data-bs-target="#productModal"
                                        onclick="prepareModal('edit')">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="productModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Tambah Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form>
                <div class="modal-body">

                    <div class="mb-3">
                        <label>Judul Buku</label>
                        <input type="text" class="form-control" id="judul">
                    </div>

                    <div class="mb-3">
                        <label>Kategori</label>
                        <select class="form-control" id="kategori">
                            <option>Programming</option>
                            <option>Design</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Stok</label>
                            <input type="number" class="form-control" id="stok">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Harga</label>
                            <input type="number" class="form-control" id="harga">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="btnSave">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- SCRIPT -->
<script>
function prepareModal(mode) {
    const title = document.getElementById('modalTitle');

    // reset form
    document.getElementById('judul').value = '';
    document.getElementById('kategori').value = 'Programming';
    document.getElementById('stok').value = '';
    document.getElementById('harga').value = '';

    if(mode === 'tambah') {
        title.innerText = 'Tambah Buku';

    } else {
        title.innerText = 'Edit Buku';

        // isi data dummy (sementara)
        document.getElementById('judul').value = 'Laravel Untuk Pemula';
        document.getElementById('kategori').value = 'Programming';
        document.getElementById('stok').value = 10;
        document.getElementById('harga').value = 150000;
    }
}
</script>

@endsection
