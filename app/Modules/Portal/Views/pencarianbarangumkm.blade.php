@extends("portal_layout.templates")
@section("content")

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        .custom-margin {
            margin-top: 121px;
        }

        .space {
            width: 150px;
        }

        .category-title {
            font-size: 18px;
            margin-top: 20px;
        }

        .product-card {
            border: 1px solid #e0e0e0;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
            position: relative;
        }

        .product-card img {
            max-width: 100%;
        }

        .product-card .cart-icon {
            position: absolute;
            bottom: 10px;
            left: 10px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 10px;
        }

        .section-divider {
            border-top: 2px solid #e0e0e0;
            margin-top: 100px;
            margin-bottom: 30px;
        }

        .section-heading {
            color: #000;
            font-family: Poppins;
            font-size: 30px;
            font-style: normal;
            font-weight: 600;
            line-height: 24px;
            /* 48% */
        }

        .carouselslide {
            margin-top: 148px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: auto;
            padding: 0;
            margin: 0;
        }

        .product-card h4 {
            color: var(--type-high-emphasis, #171520);
            font-size: 18.172px;
            font-style: normal;
            font-weight: 500;
            line-height: 22.715px;
            /* 125% */
        }

        .badge {
            margin-right: 10px;
        }

        .harga {
            color: var(--type-high-emphasis, #171520);
            font-size: 18.172px;
            font-style: normal;
            font-weight: 500;
            line-height: 22.715px;
            /* 125% */
        }

        .diskon {
            color: var(--type-high-emphasis, #171520);
            font-size: 15px;
            font-style: normal;
            font-weight: 500;
            line-height: 22.715px;
            /* 174.734% */
        }

        .lokasi {
            display: flex;
            width: 294.317px;
            height: 22.715px;
            flex-direction: column;
            justify-content: center;
            flex-shrink: 0;
        }
    </style>
</head>

<body>
    <div class="container custom-margin">
        <ul class="nav">
            @php
            $jenisPencarian = ['barang', 'toko']; // Jenis pencarian yang tersedia
            $inputPencarian = request()->input('q'); // Mengambil kata kunci pencarian dari input pengguna
            $currentType = request()->input('tipe', 'barang'); // Jenis pencarian saat ini (default: barang)
            @endphp
            @foreach ($jenisPencarian as $jenis)
            <li class="nav-item">
                <a href="{{ url('/p/cari?q=' . $inputPencarian . '&tipe=' . $jenis) }}"
                    class="nav-link @if ($currentType == $jenis) active @endif" aria-current="page"
                    style="font-size: 28px; color:#000; text-decoration: underline">
                    @if ($jenis == 'barang')
                    <i class="bi bi-shop-window"></i> PRODUK
                    @elseif ($jenis == 'toko')
                    <i class="bi bi-shop-window"></i> TOKO
                    @endif
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <br>
    <div class="container">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <!-- Dummy data for recommended product cards -->
                    <div class="col-md-3">
                        <div class="product-card">
                            <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Produk 1">
                            <h4>Produk 1</h4>
                            <p>Kategori: Makanan</p>
                            <p>Rating: 4.5 (200 ulasan)</p>
                            <p class="harga">Harga: $90</p>
                            <p><span class="badge bg-danger">-10%</span><s class="diskon">Harga: $100</s></p>
                            <p class="lokasi">Lokasi: Toko A</p>
                            <i class="fas fa-shopping-cart cart-icon"></i>
                        </div>
                    </div>
                    <!-- More dummy data for recommended product cards -->
                    <div class="col-md-3">
                        <div class="product-card">
                            <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Produk 1">
                            <h4>Produk 1</h4>
                            <p>Kategori: Makanan</p>
                            <p>Rating: 4.5 (200 ulasan)</p>
                            <p class="harga">Harga: $90</p>
                            <p><span class="badge bg-danger">-10%</span><s class="diskon">Harga: $100</s></p>
                            <p class="lokasi">Lokasi: Toko A</p>
                            <i class="fas fa-shopping-cart cart-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-card">
                            <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Produk 1">
                            <h4>Produk 1</h4>
                            <p>Kategori: Makanan</p>
                            <p>Rating: 4.5 (200 ulasan)</p>
                            <p class="harga">Harga: $90</p>
                            <p><span class="badge bg-danger">-10%</span><s class="diskon">Harga: $100</s></p>
                            <p class="lokasi">Lokasi: Toko A</p>
                            <i class="fas fa-shopping-cart cart-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-card">
                            <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Produk 1">
                            <h4>Produk 1</h4>
                            <p>Kategori: Makanan</p>
                            <p>Rating: 4.5 (200 ulasan)</p>
                            <p class="harga">Harga: $90</p>
                            <p><span class="badge bg-danger">-10%</span><s class="diskon">Harga: $100</s></p>
                            <p class="lokasi">Lokasi: Toko A</p>
                            <i class="fas fa-shopping-cart cart-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <!-- More dummy data for recommended product cards -->
                    <div class="col-md-3">
                        <div class="product-card">
                            <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Produk 1">
                            <h4>Produk 1</h4>
                            <p>Kategori: Makanan</p>
                            <p>Rating: 4.5 (200 ulasan)</p>
                            <p class="harga">Harga: $90</p>
                            <p><span class="badge bg-danger">-10%</span><s class="diskon">Harga: $100</s></p>
                            <p class="lokasi">Lokasi: Toko A</p>
                            <i class="fas fa-shopping-cart cart-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-card">
                            <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Produk 1">
                            <h4>Produk 1</h4>
                            <p>Kategori: Makanan</p>
                            <p>Rating: 4.5 (200 ulasan)</p>
                            <p class="harga">Harga: $90</p>
                            <p><span class="badge bg-danger">-10%</span><s class="diskon">Harga: $100</s></p>
                            <p class="lokasi">Lokasi: Toko A</p>
                            <i class="fas fa-shopping-cart cart-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-card">
                            <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Produk 1">
                            <h4>Produk 1</h4>
                            <p>Kategori: Makanan</p>
                            <p>Rating: 4.5 (200 ulasan)</p>
                            <p class="harga">Harga: $90</p>
                            <p><span class="badge bg-danger">-10%</span><s class="diskon">Harga: $100</s></p>
                            <p class="lokasi">Lokasi: Toko A</p>
                            <i class="fas fa-shopping-cart cart-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-card">
                            <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Produk 1">
                            <h4>Produk 1</h4>
                            <p>Kategori: Makanan</p>
                            <p>Rating: 4.5 (200 ulasan)</p>
                            <p class="harga">Harga: $90</p>
                            <p><span class="badge bg-danger">-10%</span><s class="diskon">Harga: $100</s></p>
                            <p class="lokasi">Lokasi: Toko A</p>
                            <i class="fas fa-shopping-cart cart-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchForm = document.getElementById("searchForm");
            const searchInput = document.getElementById("searchInput");
            const searchType = document.getElementById("searchType");

            searchForm.addEventListener("submit", function (event) {
                event.preventDefault();
                const keyword = searchInput.value.trim(); // Mengambil inputan pengguna
                const type = searchType.value; // Mengambil jenis pencarian

                // Menghasilkan tautan sesuai dengan input pencarian dan jenis
                const url = `/p/cari?q=${keyword}&tipe=${type}`;

                // Redirect pengguna ke URL pencarian
                window.location.href = url;
            });
        });
    </script>

    @endsection