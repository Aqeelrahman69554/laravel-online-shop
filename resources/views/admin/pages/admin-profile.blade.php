@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Manage Admin Profile</h3>
                    <p class="text-muted mb-0">Kelola profil admin, tambah admin baru, dan approve pendaftaran admin.</p>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Data belum valid.</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-5">
                    <div class="card card-round">
                        <div class="card-header">
                            <div class="card-title">Profil Saya</div>
                        </div>
                        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <img src="{{ $admin->profile_photo ? asset('storage/' . $admin->profile_photo) : asset('admin2/assets/img/profile.jpg') }}"
                                        alt="Foto Profil" class="rounded-circle"
                                        style="width: 96px; height: 96px; object-fit: cover;">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Foto Profil</label>
                                    <input type="file" name="profile_photo" class="form-control" accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $admin->name) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email', $admin->email) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No. HP</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ old('phone', $admin->phone) }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="birth_date" class="form-control"
                                            value="{{ old('birth_date', optional($admin->birth_date)->format('Y-m-d')) }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gender</label>
                                        <select name="gender" class="form-select">
                                            <option value="">Pilih gender</option>
                                            <option value="Laki-laki" @selected(old('gender', $admin->gender) === 'Laki-laki')>Laki-laki</option>
                                            <option value="Perempuan" @selected(old('gender', $admin->gender) === 'Perempuan')>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <textarea name="address" class="form-control" rows="3">{{ old('address', $admin->address) }}</textarea>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Simpan Profil
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-7">
                    @if (! $isPrimaryAdmin)
                        <div class="alert alert-info">
                            Hanya admin pertama yang bisa menambah, approve, atau reject admin baru.
                        </div>
                    @endif

                    @if ($isPrimaryAdmin)
                    <div class="card card-round">
                        <div class="card-header">
                            <div class="card-title">Tambah Admin</div>
                        </div>
                        <form action="{{ route('admin.admins.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Konfirmasi Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No. HP</label>
                                        <input type="text" name="phone" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Foto Profil</label>
                                        <input type="file" name="profile_photo" class="form-control" accept="image/*" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="birth_date" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gender</label>
                                        <select name="gender" class="form-select" required>
                                            <option value="">Pilih gender</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea name="address" class="form-control" rows="3" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-primary">
                                    <i class="fas fa-user-plus me-1"></i> Tambah Admin
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card card-round">
                        <div class="card-header">
                            <div class="card-title">Approval Admin Baru</div>
                        </div>
                        <div class="card-body">
                            @forelse ($pendingAdmins as $pendingAdmin)
                                <div class="d-flex align-items-center justify-content-between border-bottom py-3">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $pendingAdmin->profile_photo) }}" alt="Foto Admin"
                                            class="rounded-circle me-3" style="width: 48px; height: 48px; object-fit: cover;">
                                        <div>
                                            <strong>{{ $pendingAdmin->name }}</strong>
                                            <div class="text-muted small">{{ $pendingAdmin->email }} - {{ $pendingAdmin->phone }}</div>
                                            <div class="text-muted small">{{ $pendingAdmin->created_at->format('d M Y, H.i') }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <form action="{{ route('admin.admins.approve', $pendingAdmin) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-success btn-sm">Approve</button>
                                        </form>
                                        <form action="{{ route('admin.admins.reject', $pendingAdmin) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-danger btn-sm">Reject</button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted mb-0">Belum ada pendaftaran admin yang menunggu approval.</p>
                            @endforelse
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="card card-round">
                <div class="card-header">
                    <div class="card-title">Daftar Admin</div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Admin</th>
                                    <th>Kontak</th>
                                    <th>Status</th>
                                    <th>Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $item->profile_photo ? asset('storage/' . $item->profile_photo) : asset('admin2/assets/img/profile.jpg') }}"
                                                    alt="Foto Admin" class="rounded-circle me-3"
                                                    style="width: 42px; height: 42px; object-fit: cover;">
                                                <div>
                                                    <strong>{{ $item->name }}</strong>
                                                    <div class="text-muted small">{{ $item->gender ?? '-' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $item->email }}
                                            <div class="text-muted small">{{ $item->phone ?? '-' }}</div>
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ $item->admin_status === 'approved' ? 'success' : ($item->admin_status === 'pending' ? 'warning' : 'danger') }}">
                                                {{ ucfirst($item->admin_status) }}
                                            </span>
                                        </td>
                                        <td>{{ $item->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
