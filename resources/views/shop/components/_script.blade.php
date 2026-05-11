<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('shop/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('shop/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('shop/lib/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('shop/lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('shop/js/main.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.btn-add-to-cart').on('click', function(e) {
            // Jika kamu menggunakan AJAX untuk tambah keranjang:
            // e.preventDefault();

            // Logika sederhana: Setiap kali tombol diklik, angka di badge bertambah 1
            // sebelum halaman reload.
            let badge = $('#cart-badge');
            let currentCount = parseInt(badge.text());
            badge.text(currentCount + 1);

            // Animasi kecil agar terlihat interaktif
            badge.css('transform', 'scale(1.5)');
            setTimeout(() => {
                badge.css('transform', 'scale(1)');
            }, 200);
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Efek animasi saat tombol tambah diklik
        $('.btn-add-to-cart').on('click', function() {
            let badge = $('#cart-badge');
            let currentCount = parseInt(badge.text()) || 0;
            badge.text(currentCount + 1);

            badge.addClass('animate__animated animate__bounceIn');
            setTimeout(() => {
                badge.removeClass('animate__animated animate__bounceIn');
            }, 1000);
        });
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const buttons = document.querySelectorAll(".category-btn");

    buttons.forEach(button => {

        button.addEventListener("click", function (e) {

            e.preventDefault();

            let categoryId = this.dataset.id;

            let url = "";

            if (categoryId === "all") {

                url = "/tobukel/shop/filter";

            } else {

                url = "/tobukel/shop/filter/" + categoryId;

            }

            const productList = document.getElementById("product-list");

            productList.classList.add("product-loading");

            fetch(url)

                .then(response => response.text())

                .then(data => {

                    setTimeout(() => {

                        productList.innerHTML = data;

                        productList.classList.remove("product-loading");

                        productList.classList.add("product-show");

                        setTimeout(() => {

                            productList.classList.remove("product-show");

                        }, 400);

                    }, 200);

                    // ACTIVE BUTTON
                    buttons.forEach(btn => {

                        btn.classList.remove("bg-primary", "text-white");

                        btn.classList.add("bg-light", "text-dark");

                    });

                    this.classList.remove("bg-light", "text-dark");

                    this.classList.add("bg-primary", "text-white");

                });

        });

    });

});
</script>
