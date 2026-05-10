@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid py-4">

        <!-- Header -->
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-dark">
                        Manajemen About Website
                    </h2>


                </div>
                @if (session('success'))
                    <div class="alert alert-success" id="success-alert">
                        {{ session('success') }}
                    </div>

                    <script>
                        setTimeout(function() {

                            let alertBox = document.getElementById('success-alert');

                            if (alertBox) {
                                alertBox.style.transition = "0.5s";
                                alertBox.style.opacity = "0";

                                setTimeout(() => {
                                    alertBox.remove();
                                }, 500);
                            }

                        }, 3000); // 3000 = 3 detik
                    </script>
                @endif
                <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary rounded-3 px-4">
                        <i class="fas fa-save me-2"></i>Update About
                    </button>
                    <div class="row">

                        <!-- LEFT -->
                        <div class="col-lg-6">

                            <!-- Judul -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Judul About
                                </label>

                                <input type="text" class="form-control" name="title" value="{{ $about->title }}">
                            </div>

                            <!-- Sub Judul -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Sub Judul
                                </label>

                                <input type="text" class="form-control" name="subtitle" value="{{ $about->sub_icon }}">
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Deskripsi
                                </label>

                                <textarea name="description" rows="7" class="form-control">{{ $about->description }}</textarea>
                            </div>

                        </div>

                        <!-- RIGHT -->
                        <div class="col-lg-6">

                            <!-- Upload Gambar -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Gambar About
                                </label>

                                <input type="file" class="form-control" name="image">
                            </div>

                            <!-- Preview Image -->
                            <div class="mb-4">
                                <img src="{{ asset('storage/images/about/' . $about->image) }}"
                                    class="img-fluid rounded-4 shadow-sm"
                                    style="height: 350px; width:100%; object-fit:cover;">
                            </div>

                        </div>

                    </div>

                </form>
            </div>
        </div>

        <!-- FEATURE SECTION -->
        <div class="card shadow-sm border-0 rounded-4 mt-4">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold">
                        Fitur About
                    </h4>

                    <button class="btn btn-success rounded-3" data-bs-toggle="modal" data-bs-target="#featureModal">
                        <i class="fas fa-plus me-2"></i>Tambah Feature
                    </button>
                </div>

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ICON</th>
                                <th>JUDUL</th>
                                <th>DESKRIPSI</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($features as $key => $feature)
                                <tr>

                                    <!-- NO -->
                                    <td class="align-middle">
                                        {{ $key + 1 }}
                                    </td>

                                    <!-- ICON -->
                                    <td class="align-middle">
                                        <i class="{{ $feature->icon }} fa-2x text-dark"></i>
                                    </td>

                                    <!-- JUDUL -->
                                    <td class="align-middle fw-semibold">
                                        {{ $feature->sub_feature }}
                                    </td>

                                    <!-- DESKRIPSI -->
                                    <td class="align-middle text-muted">
                                        {{ $feature->desc_feature }}
                                    </td>

                                    <!-- AKSI -->
                                    <td class="align-middle">

                                        <div class="d-flex gap-2">

                                            <!-- EDIT -->
                                            <button class="btn btn-warning btn-sm rounded-3" data-bs-toggle="modal"
                                                data-bs-target="#editFeature{{ $feature->id }}">

                                                <i class="fas fa-edit"></i>

                                            </button>

                                            <!-- DELETE -->
                                            <form action="{{ route('admin.about-feature.delete', $feature->id) }}"
                                                method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm rounded-3">

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>
                            @endforeach

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editFeature{{ $feature->id }}" tabindex="-1">

                                <div class="modal-dialog">

                                    <div class="modal-content">

                                        <form action="{{ route('admin.about-feature.update', $feature->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('PUT')

                                            <div class="modal-header">

                                                <h5 class="modal-title">
                                                    Edit Feature
                                                </h5>

                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                                            </div>

                                            <div class="modal-body">

                                                <!-- ICON -->
                                                <div class="mb-3">

                                                    <label>
                                                        Icon
                                                    </label>

                                                    <input type="text" name="icon" class="form-control"
                                                        value="{{ $feature->icon }}">

                                                </div>

                                                <!-- JUDUL -->
                                                <div class="mb-3">

                                                    <label>
                                                        Judul Feature
                                                    </label>

                                                    <input type="text" name="sub_feature" class="form-control"
                                                        value="{{ $feature->sub_feature }}">

                                                </div>

                                                <!-- DESKRIPSI -->
                                                <div class="mb-3">

                                                    <label>
                                                        Deskripsi
                                                    </label>

                                                    <textarea name="desc_feature" class="form-control" rows="4">{{ $feature->desc_feature }}</textarea>

                                                </div>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="submit" class="btn btn-primary">

                                                    Update

                                                </button>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </tbody>

                    </table>

                    <!-- Modal Tambah Feature -->
                    <div class="modal fade" id="featureModal" tabindex="-1">

                        <div class="modal-dialog">

                            <div class="modal-content">

                                <form action="{{ route('admin.about-feature.store') }}" method="POST">

                                    @csrf

                                    <div class="modal-header">

                                        <h5 class="modal-title">
                                            Tambah Feature
                                        </h5>

                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                                    </div>

                                    <div class="modal-body">

                                        <div class="mb-3">

                                            <label>
                                                Icon
                                            </label>

                                            <input type="text" name="icon" class="form-control"
                                                placeholder="fa fa-book">

                                        </div>

                                        <div class="mb-3">

                                            <label>
                                                Judul Feature
                                            </label>

                                            <input type="text" name="sub_feature" class="form-control">

                                        </div>

                                        <div class="mb-3">

                                            <label>
                                                Deskripsi
                                            </label>

                                            <textarea name="desc_feature" class="form-control" rows="4"></textarea>

                                        </div>

                                    </div>

                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-primary">

                                            Simpan

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
