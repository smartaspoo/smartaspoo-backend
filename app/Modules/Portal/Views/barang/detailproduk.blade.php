@extends('portal_layout.templates')
@section('content')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .page-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .product-details {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .product-image {
            flex: 1;
            max-width: 100%;
        }

        .product-image img {
            max-width: 100%;
            height: auto;
            object-fit: cover;
        }

        .product-info {
            flex: 2;
            padding-left: 20px;
            width: 50%;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .product-name {
            font-size: 18px;
            font-weight: 600;
        }

        .product-price {
            font-size: 15px;
            color: #FF5733;
        }

        .discount-label {
            font-size: 14px;
            font-weight: 400;
            color: #FBD9C0;
            margin-left: 10px;
        }

        .product-original-price {
            font-size: 14px;
            color: #999;
            text-decoration: line-through;
            margin-top: 5px;
        }

        .product-description {
            margin-top: 20px;
        }

        .product-description h3 {
            font-size: 18px;
            font-weight: 600;
        }

        .product-description p {
            margin-top: 10px;
        }

        .description-sections {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .description-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px 10px;
            background-color: #FFF;
            border: 1px solid #DDD;
            border-radius: 5px;
            transition: background-color 0.3s;
            cursor: pointer;
            margin-right: 10px;
            font-weight: 600;
            font-zize: 15px;
            color: #606C5D;
        }

        .description-section:hover {
            background-color: #606C5D;
            color: #FFF;
        }

        .description-content {
            display: none;
            margin-top: 10px;
            font-size: 14px;
            color: #606C5D;
        }

        .order-box {
            width: 20%;
            padding: 10px;
            margin-top: 20px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .order-title {
            font-size: 18px;
            font-weight: 400;
        }

        .order-quantity {
            margin-top: 5px;
        }

        .order-buttons {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .order-button {
            background-color: #606C5D;
            color: #fff;
            border: none;
            padding: 2px 4px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .order-button:hover {
            background-color: #5E745C;
        }

        .order-quantity {
            margin-top: 10px;
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .quantity-label {
            margin-right: 10px;
        }

        .stock-info {
            color: #FF6B6B;
            font-weight: bold;
            margin-top: 5px;
        }

        .total-price {
            margin-top: 20px;
            font-size: 18px;
            font-weight: 600;
        }

        .section-divider {
            margin-top: 40px;
            border-top: 2px solid #DDD;
        }

        .section2 {
            padding: 20px 0;
            text-align: left;
        }

        .store-card {
            display: flex;
            align-items: center;
        }

        .store-image {
            max-width: ;
        }

        .store-card .store-details {
            margin-left: 15px;
            text-align: left;
        }

        .store-card .store-name {
            font-size: 18px;
            font-weight: 600;
        }

        .store-card .store-rating,
        .store-card .store-location {
            margin-top: 5px;
        }

        .visit-store-button {
            margin-top: 10px;
            background-color: #606C5D;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .visit-store-button:hover {
            background-color: #5E745C;
        }

        .review {
            margin-top: 20px;
        }

        .customer-review {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }

        .customer-profile {
            display: flex;
            align-items: center;
        }

        .customer-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .customer-name {
            font-weight: 600;
        }

        .review-content {
            margin-top: 10px;
        }

        .rating {
            color: #FF5733;
            margin-top: 5px;
        }

        .comment {
            margin-top: 5px;
        }

        .review-image img {
            max-width: 100%;
            max-height: 200px;
            margin-top: 10px;
        }

        .customer-review {
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .product-info {
                width: 100%;
            }

            .order-box {
                width: 100%;
            }
        }
    </style>
    </head>

    <body>
        <div class="container mt-1" id="container">
            <div class="page-title">Detail Produk</div>
            <div class="product-details">
                <div class="product-image">
                    <img src="{{ URL::asset('/img/portal/produk.png') }}" alt="Product Image">
                </div>
                <div class="product-info">
                    <div class="product-name">{{ $data->nama_barang }}</div>
                    <div class="product-price">{{ $data->harga_umum }}</div>
                    <div class="discount-label">{{ $data->diskon }}</div>
                    <div class="product-original-price">{{ $data->harga_umum }}</div>
                    <div class="product-description">
                        <div class="description-sections">
                            <div class="description-section">Detail</div>
                            <div class="description-section">Info Penting</div>
                        </div>
                        <div class="description-content" id="detailContent">
                            <p>
                                {{ $data->keterangan }}
                            </p>
                        </div>
                        <div class="description-content" id="infoPentingContent">
                            <p>
                                {{ $data->info_penting }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="order-box">
                    <div class="order-title">Atur Jumlah</div>
                    <div class="order-quantity">
                        <label class="quantity-label" for="quantity">Quantity:</label>
                        <input class="form-control" type="number" v-model="barang.jumlah" min="1" max="54">
                        <br>
                        <span class="stock-info">Stok total : <span style="color: red;">75</span></span>
                    </div>
                    <div class="total-price">
                        Total Harga = <span id="totalPrice">{{ $data->harga_umum }}</span>
                    </div>
                    <div class="order-buttons">
                        <button class="order-button"> <span @click="tambahKeranjang()">Keranjang</span> </button>
                        <button class="order-button">Beli Langsung</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-divider"></div>

        <div class="container mt-5">
            <div class="section2">
                <div class="store-card">
                    <div class="store-image">
                        <img style="max-width: 100px" src="{{ URL::asset('/img/portal/storelogo.png') }}" alt="Toko Image">
                    </div>
                    <div class="store-details">
                        <div class="store-name">Dyriana</div>
                        <div class="store-rating">Rating: 4.8 <i class="fas fa-star"></i></div>
                        <div class="store-location">Semarang, Indonesia</div>
                        <button class="visit-store-button">Kunjungi Toko</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-divider"></div>

        <script>
            Vue.createApp({
                data() {
                    return {
                        barang: {
                            id: '{{ $data->id }}',
                            jumlah: 1
                        }
                    }

                },

                methods: {
                    async tambahKeranjang() {
                        const response = await httpClient.post("{!! url('p/barang/keranjang') !!}/", {
                            barang_id: this.barang.id,
                            jumlah: this.barang.jumlah
                        })
                        console.log(response)
                    }
                },

            }).mount("#container")
        </script>
        <script>
            const detailSection = document.querySelector('.description-section:nth-child(1)');
            const infoPentingSection = document.querySelector('.description-section:nth-child(2)');
            const detailContent = document.getElementById('detailContent');
            const infoPentingContent = document.getElementById('infoPentingContent');

            detailSection.addEventListener('click', () => {
                detailSection.style.backgroundColor = '#606C5D';
                detailSection.style.color = '#FFF';
                infoPentingSection.style.backgroundColor = '#FFF';
                infoPentingSection.style.color = '#000';
                detailContent.style.display = 'block';
                infoPentingContent.style.display = 'none';
            });

            infoPentingSection.addEventListener('click', () => {
                infoPentingSection.style.backgroundColor = '#606C5D';
                infoPentingSection.style.color = '#FFF';
                detailSection.style.backgroundColor = '#FFF';
                detailSection.style.color = '#000';
                detailContent.style.display = 'none';
                infoPentingContent.style.display = 'block';
            });
        </script>
    @endsection
