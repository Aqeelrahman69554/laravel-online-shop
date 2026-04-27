<!-- Hero Start -->
<div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">

            <!-- TEXT -->
            <div class="col-md-12 col-lg-7">
                <h4 class="mb-3 text-secondary">Toko Buku Online Terpercaya</h4>
                <h1 class="mb-5 display-3" style="color:#3E2C23;">Temukan Buku Favoritmu di TOBUKEL</h1>

                <div class="position-relative mx-auto">
                    <input
                        class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill"
                        type="text"
                        placeholder="Cari buku, penulis, atau kategori..."
                    >

                    <button
                        type="submit"
                        class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100"
                        style="top: 0; right: 25%;">
                        Cari Buku
                    </button>
                </div>
            </div>

            <!-- IMAGE SLIDER -->
            <div class="col-md-12 col-lg-5">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">

                    <div class="carousel-inner" role="listbox">

                        <div class="carousel-item active rounded">
                            <img src="img/book-hero-1.jpg" class="img-fluid w-100 h-100 bg-secondary rounded" alt="Novel">
                           <a class="btn px-4 py-2 text-white rounded" style="background:#6B4F3A;">Novel</a>
                        </div>

                        <div class="carousel-item rounded">
                            <img src="img/book-hero-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Komik">
                            <a class="btn px-4 py-2 text-white rounded" style="background:#A67C52;">Komik</a>
                        </div>

                        <div class="carousel-item rounded">
                            <img src="img/book-hero-3.jpg" class="img-fluid w-100 h-100 rounded" alt="Edukasi">
                           <a class="btn px-4 py-2 text-white rounded" style="background:#8B6B4A;">Buku Edukasi</a>
                        </div>

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- Hero End -->


<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">

            <div class="modal-header">
                <h5 class="modal-title">Cari Buku di TOBUKEL</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">

                    <input
                        type="search"
                        class="form-control p-3"
                        placeholder="Masukkan judul buku, penulis, atau ISBN..."
                    >

                    <span class="input-group-text p-3">
                        <i class="fa fa-search"></i>
                    </span>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- Modal Search End -->
