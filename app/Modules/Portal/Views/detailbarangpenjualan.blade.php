@extends("portal_layout.templates")
@section("content")
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }
        .margin-up {
            margin-top: 30px;
        }
        .store-info {
            display: flex;
            align-items: center;
        }
        .store-logo {
            max-width: 100px;
            margin-right: 20px;
            cursor: pointer;
        }
        .store-details {
            flex-grow: 1;
        }
        .store-title {
            font-size: 24px;
            font-weight: bold;
        }
        .store-activity {
            color: #9b9b9b;
        }
        .store-follow {
            font-size: 16px;
            font-weight: bold;
        }
        .store-follow-count {
            font-size: 14px;
            color: #9b9b9b;
        }
        .store-follow-divider {
            border-right: 2px solid #9b9b9b;
            margin: 0 10px;
        }
        .action-buttons {
            display: flex;
            align-items: center;
            margin-top: 20px;
            margin-left: 117px;
        }
        .action-button {
            padding: 8px 16px;
            text-align: center;
            color: white;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
        }
        .follow-button {
            background-color: #606C5D;
        }
        .chat-button {
            border: 2px solid black;
            color: black;
            margin-left: 10px;
        }
        .share-button {
            border: 2px solid black;
            color: black;
            margin-left: 10px;
        }
        .info-button {
            border: 2px solid black;
            color: black;
            font-size: 20px;
            padding: 6px 10px;
            margin-left: 10px;
        }
        .modal-content {
            background-color: transparent;
            border: none;
        }
        .tab-list {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .tab {
            padding: 10px 20px;
            cursor: pointer;
        }
        .active-tab {
            border-bottom: 3px solid #4C4F40;
        }
        .right-filter{
            margin-top: 30px;
            display: flex;
            justify-content: flex-end;
        }
        .urutkan {
            padding-top: 10px;
            padding-right: 22px;
        }
        .filter-dropdown {
            text-align: right;
            margin-bottom: 20px;
            width: 22%;
            border: 2px solid;
        }
        .harga {
            color: var(--type-high-emphasis, #171520);
            font-size: 18.172px;
            font-style: normal;
            font-weight: 500;
            line-height: 22.715px; /* 125% */
        }
        .diskon {
            color: var(--type-high-emphasis, #171520);
            font-size: 15px;
            font-style: normal;
            font-weight: 500;
            line-height: 22.715px; /* 174.734% */
        }
        .lokasi {
            display: flex;
            width: 294.317px;
            height: 22.715px;
            flex-direction: column;
            justify-content: center;
            flex-shrink: 0;
        }
        .custom-initial {
            display: flex;
            justify-content: start;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container margin-up">
        <div class="store-info">
            <a href="/p/infotoko">
                <img class="store-logo" src="{{URL::asset('/img/portal/storelogo.png')}}" alt="Store Logo" data-bs-toggle="modal" data-bs-target="#logoModal">
            </a>
            <div class="store-details">
                <div class="store-title">Nama Toko</div>
                <div class="store-activity">Toko telah aktif beberapa menit yang lalu</div>
                <div class="store-follow">
                    1.2K Pengikut
                    <span class="store-follow-divider"></span>
                    200 Mengikuti
                </div>
            </div>
        </div>
        <div class="action-buttons mt-3">
            <div class="custom-initial">
                <div class="action-button follow-button mr-2">Follow</div>
                <div class="action-button chat-button mr-2">Chat Penjual</div>
                <div class="action-button share-button mr-2"><i class="fa-solid fa-share-nodes"></i></div>
                <div class="action-button info-button"><i class="fas fa-store"></i></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="tab-list">
            <div id="tab-beranda" class="tab active-tab">Beranda</div>
            <div id="tab-produk" class="tab">Produk</div>
        </div>
        <div class="right-filter">
            <p class="urutkan">
                Urutkan
            </p>
            <div class="filter-dropdown">
                <select class="form-select" aria-label="Sort by">
                    <option selected>Terbaru</option>
                    <option value="1">Terpopuler</option>
                </select>
            </div>
        </div>
    </div>
    <div id="carouselRekomendasi" class="carousel slide" data-bs-ride="carousel" style="margin-left: 30px; margin-top:30px">
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
                            <h4>Produk 2</h4>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const tabBeranda = document.getElementById('tab-beranda');
        const tabProduk = document.getElementById('tab-produk');
    
        tabBeranda.addEventListener('click', () => {
            tabBeranda.classList.add('active-tab');
            tabProduk.classList.remove('active-tab');
        });
    
        tabProduk.addEventListener('click', () => {
            tabBeranda.classList.remove('active-tab');
            tabProduk.classList.add('active-tab');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
