@extends('admin.layouts.master')

@section('content')
<div class="container-fluid p-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Manajemen Testimoni</h4>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#testimoniModal">
                <i class="fas fa-plus"></i> Tambah Testimoni
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama & Status</th>
                            <th>Komentar</th>
                            <th>Rating</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimoni as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->testimoni_image) }}"
                                     alt="user" class="rounded-circle" width="50" height="50" style="object-fit: cover;">
                            </td>
                            <td>
                                <strong>{{ $item->testimoni_name }}</strong><br>
                                <small class="text-muted">{{ $item->testimoni_status }}</small>
                            </td>
                            <td><small>"{{ Str::limit($item->testimoni_desc, 60) }}"</small></td>
                            <td class="text-warning">
                                @for($i=0; $i < $item->rating; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </td>
                            <td class="text-center">
                                <form action="{{ route('admin.testimoni.delete', $item->id) }}" method="POST" onsubmit="return confirm('Hapus testimoni ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="testimoniModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.testimoni.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Testimoni Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="testimoni_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pekerjaan/Status</label>
                        <input type="text" class="form-control" name="testimoni_status" placeholder="Contoh: Mahasiswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <select name="rating" class="form-select">
                            <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                            <option value="4">⭐⭐⭐⭐ (4)</option>
                            <option value="3">⭐⭐⭐ (3)</option>
                            <option value="2">⭐⭐ (2)</option>
                            <option value="1">⭐ (1)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Profil</label>
                        <input type="file" class="form-control" name="testimoni_image" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi Testimoni</label>
                        <textarea class="form-control" name="testimoni_desc" rows="3" required></textarea>
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
@endsection
