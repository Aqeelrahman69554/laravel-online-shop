@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid p-4">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Daftar Pesanan</h4>
                {{-- Tombol tambah jika diperlukan --}}
                <a href="#" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Pesanan</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th>ID Pesanan</th>
                                <th>Pelanggan</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>ORD-20260416-001</td>
                                <td>Hizrian</td>
                                <td>Rp 250.000</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-info btn-sm text-white" data-bs-toggle="modal"
                                            data-bs-target="#detailOrder">
                                            <i class="fas fa-eye"></i>
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

    {{-- MODAL DETAIL PESANAN --}}
    <div class="modal fade" id="detailOrder" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pesanan #ORD-001</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Informasi Pelanggan:</h6>
                    <p>Nama: Hizrian<br>Alamat: Jl. Contoh No. 123, Bekasi</p>
                    <hr>
                    <h6>Produk yang Dipesan:</h6>
                    <ul>
                        <li>Buku Laravel Dasar - 1x</li>
                        <li>Buku PHP Modern - 1x</li>
                    </ul>
                    <p class="fw-bold">Total Pembayaran: Rp 250.000</p>
                    <hr>
                    <h6>Ubah Status:</h6>
                    <select class="form-select">
                        <option selected>Pending</option>
                        <option>Proses</option>
                        <option>Dikirim</option>
                        <option>Selesai</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
