@extends('portal_layout.templates')
@section('content')
    @php
        function rupiah($angka)
        {
            $rupiah = 'Rp ' . number_format($angka, 0, ',', '.');
            return $rupiah;
        }
        $totalHarga = 0;
    @endphp
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
            margin-left: 20px;
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
    <div class="container custom-margin">
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ url()->current() }}?q={{ $q }}&tipe=barang" class="nav-link active" aria-current="page"
                    style="font-size: 28px; color:#000; text-decoration: underline"><i
                        class="bi bi-shop-window"></i>PRODUK</a>
            </li>
            <li class="nav-item">

                <a href="{{ url()->current() }}?q={{ $q }}&tipe=toko" class="nav-link active" aria-disabled="true"
                    style="font-size: 28px; color:#000">TOKO</a>
            </li>
        </ul>
    </div>
    <br>
    <div class="container">

        <div class="row">
            @if ($tipe == 'barang')
                @foreach ($results as $barang)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-img-top">
                                <img src="{{ URL::asset($barang->thumbnail) }}" class="card-img-top"
                                    alt="{{ $barang->nama_barang }}" height="250">
                                <div class="card-body">
                                    <div class="card-title">{{ $barang->nama_barang }}
                                        <br>
                                    </div>
                                    <div class="card-text">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span>{{ rupiah(intval($barang->harga_user)) }}</span> <br>
                                                <div class="mt-1"><span
                                                        class="badge badge-danger">{{ $barang->diskon }}%</span>
                                                    <s>{{ $barang->harga_user_asli }}</s>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row justify-content-between">
                                                    <div class="col-md-9">
                                                        <p class="lokasi">Terjual: {{ $barang->terjual }}</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a :href="`{{ url('/p/') }}/barang/{{ $barang->id }}`">
                                                            <i class="fas fa-shopping-cart cart-icon"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @elseif($tipe == 'toko')
                @foreach ($results as $users_toko)
                    <div class="col-md-3">
                        <div class="product-card">
                            <img src="{{ URL::asset($users_toko->foto) }}" alt="{{ $users_toko->nama }}">
                            <h4>{{ $users_toko->nama }}</h4>
                            <!-- Tampilkan informasi toko lainnya -->
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>


    <script>
        Vue.createApp({
            data() {
                return {
                    barang: {}
                }

            },

            methods: {
                async tambahKeranjang() {
                    const response = await httpClient.post("{!! url('p/barang/keranjang') !!}/", {
                        id_barang: this.barang.id
                    })
                    console.log(response)
                }
            },

        }).mount("#container")
    </script>

@endsection
