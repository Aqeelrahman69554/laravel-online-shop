@extends('admin.layouts.master')

@section('content')
<div class="container-fluid p-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h2 class="card-title text-primary">Message Received From User</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Subjek</th>
                            <th class="text-center align-middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Contoh Data (Nanti diganti dengan @foreach) --}}
                        <tr>
                            <td>1</td>
                            <td>Budi Santoso</td>
                            <td>budi@example.com</td>
                            <td>Tanya Stok Buku</td>
                            <td class="text-center align-middle">
                                {{-- Tombol untuk memicu Modal Lihat --}}
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalPesan">
                                    <i class="fas fa-eye"></i> Lihat
                                </button>
                                {{-- Tombol Hapus --}}
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- MODAL UNTUK LIHAT & BALAS --}}
<div class="modal fade" id="modalPesan" tabindex="-1" aria-labelledby="modalPesanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPesanLabel">Detail Pesan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="fw-bold">Dari:</label>
                    <p>Budi Santoso (budi@example.com)</p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Isi Pesan:</label>
                    <div class="p-3 border rounded bg-light">
                        Halo admin, apakah stok buku Laravel untuk pemula masih ada?
                    </div>
                </div>
                <hr>
                <h5>Balas Pesan</h5>
                <form action="#" method="POST">
                    <div class="mb-3">
                        <textarea class="form-control" rows="4" placeholder="Tulis balasanmu di sini..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Kirim Balasan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
