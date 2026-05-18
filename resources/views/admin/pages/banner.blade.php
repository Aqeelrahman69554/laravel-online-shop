@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid p-4">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Manajemen Banner</h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Data belum lengkap.</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 70px;">No</th>
                                <th style="width: 180px;">Gambar</th>
                                <th>Konten Banner</th>
                                <th>Diskon</th>
                                <th class="text-center" style="width: 130px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($banners as $key => $item)
                                @php
                                    $bannerImage = \Illuminate\Support\Str::contains($item->image, '/')
                                        ? asset('storage/' . $item->image)
                                        : asset('shop/img/banner-book.png');
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ $bannerImage }}" alt="{{ $item->title }}"
                                            class="rounded shadow-sm"
                                            style="width: 150px; height: 80px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <strong>{{ $item->title }}</strong><br>
                                        <small class="text-muted">{{ $item->sub_title }}</small><br>
                                        <small>{{ \Illuminate\Support\Str::limit($item->description, 90) }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">{{ $item->discount }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <button class="btn btn-info btn-sm text-white" data-bs-toggle="modal"
                                                data-bs-target="#bannerViewModal"
                                                onclick='prepareBannerView(@json($item, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_HEX_TAG))'>
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-warning btn-sm text-white" data-bs-toggle="modal"
                                                data-bs-target="#bannerModal"
                                                onclick='prepareBannerModal(@json($item, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_HEX_TAG))'>
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        Belum ada data banner.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bannerViewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <img src="" alt="Banner" id="view_image" class="rounded shadow-sm mb-3 w-100"
                        style="max-height: 320px; object-fit: cover;">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted mb-1">Judul Banner</label>
                            <h5 id="view_title" class="mb-0"></h5>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted mb-1">Sub Judul</label>
                            <p id="view_sub_title" class="mb-0"></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted mb-1">Diskon</label><br>
                            <span class="badge bg-success" id="view_discount"></span>
                        </div>
                        <div class="col-12">
                            <label class="form-label text-muted mb-1">Deskripsi</label>
                            <p id="view_description" class="mb-0"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bannerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="bannerForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Banner</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Judul Banner</label>
                                <input type="text" class="form-control" name="title" id="in_title" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Sub Judul</label>
                                <input type="text" class="form-control" name="sub_title" id="in_sub_title" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Diskon</label>
                                <input type="text" class="form-control" name="discount" id="in_discount"
                                    placeholder="Contoh: 50%" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gambar Banner</label>
                                <input type="file" class="form-control" name="image" id="in_image" accept="image/*"
                                    onchange="previewSelectedBannerImage(event)">
                                <small class="text-muted" id="helpImage"></small>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="description" id="in_description" rows="4" required></textarea>
                            </div>
                            <div class="col-12 d-none" id="currentImageWrapper">
                                <label class="form-label">Gambar Saat Ini</label><br>
                                <img src="" alt="Preview banner" id="currentImage" class="rounded shadow-sm"
                                    style="max-width: 260px; height: 120px; object-fit: cover;">
                            </div>
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
        function getBannerImageUrl(image) {
            if (!image || !image.includes('/')) {
                return "{{ asset('shop/img/banner-book.png') }}";
            }

            return "{{ asset('storage') }}/" + image;
        }

        function prepareBannerView(banner) {
            document.getElementById('view_image').src = getBannerImageUrl(banner.image);
            document.getElementById('view_title').innerText = banner.title;
            document.getElementById('view_sub_title').innerText = banner.sub_title;
            document.getElementById('view_discount').innerText = banner.discount;
            document.getElementById('view_description').innerText = banner.description;
        }

        function previewSelectedBannerImage(event) {
            const file = event.target.files[0];
            const helpImage = document.getElementById('helpImage');
            const currentImageWrapper = document.getElementById('currentImageWrapper');
            const currentImage = document.getElementById('currentImage');

            if (!file) {
                return;
            }

            currentImage.src = URL.createObjectURL(file);
            currentImageWrapper.classList.remove('d-none');
            helpImage.innerText = 'Gambar baru sudah dipilih. Klik Simpan untuk mengganti gambar.';
        }

        function prepareBannerModal(banner) {
            const form = document.getElementById('bannerForm');
            const imageInput = document.getElementById('in_image');
            const helpImage = document.getElementById('helpImage');
            const currentImageWrapper = document.getElementById('currentImageWrapper');
            const currentImage = document.getElementById('currentImage');

            form.action = "/admin/banner/update/" + banner.id;
            imageInput.value = '';
            imageInput.required = false;
            helpImage.innerText = 'Kosongkan jika tidak ingin mengganti gambar.';

            document.getElementById('in_title').value = banner.title;
            document.getElementById('in_sub_title').value = banner.sub_title;
            document.getElementById('in_discount').value = banner.discount;
            document.getElementById('in_description').value = banner.description;

            currentImage.src = getBannerImageUrl(banner.image);
            currentImageWrapper.classList.remove('d-none');
        }
    </script>
@endsection
