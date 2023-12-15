@extends('portal_layout.templates')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        .space {
            width: 150px;
        }

        .category-title {
            font-size: 18px;
            margin-top: 20px;
        }

        .product-card h5 {
            text-align: center;
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
            display: block;
            margin: 0 auto;
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
            margin-top: 10px;
            margin-bottom: 30px;
        }

        .section-heading {
            color: #000;
            font-family: Poppins;
            font-size: 30px;
            font-style: normal;
            font-weight: 600;
            line-height: 24px;
            margin-top: 20px;
            /* 48% */
        }

        .carouselslide {
            margin-top: 30px;
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
        .onhover{
            transition: outline 0.6s linear;
        }
        .onhover:hover{
            cursor: pointer;
            box-shadow: 10px 12px 15px #45414e1a;
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

    <div class="container" id="dashboard">
        <!-- Section Iklan -->
        <div id="carouselIklan" class="carouselslide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item" v-for="(slider, index) in this.slider_list" :key="slider.id"
                    :class="{ active: index === 0 }">
                    <img :src="slider.url_foto" class="d-block w-100" height="250">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselIklan" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselIklan" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
        </br>

        {{-- <div class="section-heading">Kategori Toko</div>
        <div id="carouselKategori" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item " v-for="(chunk, index) in chunckKategoriProduk" :key="index"
                    :class="{ active: index === 0 }">
                    <div class="row">
                        <div class="col-md-4">
                        <div class="product-card">
                            <img src="{{URL::asset('/img/portal/kategori.png')}}" alt="Kategori 1">
                            <h5>Kategori 1</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="product-card">
                            <img src="{{URL::asset('/img/portal/kategori.png')}}" alt="Kategori 2">
                            <h5>Kategori 2</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="product-card">
                            <img src="{{URL::asset('/img/portal/kategori.png')}}" alt="Kategori 3">
                            <h5>Kategori 3</h5>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-divider"></div>
        <!-- Section Kategori -->
        <div class="section-heading">Kategori Pilihan</div>
        <div id="carouselKategori" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item " v-for="(chunk, index) in chunckKategoriProduk" :key="index"
                    :class="{ active: index === 0 }">
                    <div class="row">
                        <div class="col-md-4">
                        <div class="product-card">
                            <img src="{{URL::asset('/img/portal/kategori.png')}}" alt="Kategori 1">
                            <h5>Kategori 1</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="product-card">
                            <img src="{{URL::asset('/img/portal/kategori.png')}}" alt="Kategori 2">
                            <h5>Kategori 2</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="product-card">
                            <img src="{{URL::asset('/img/portal/kategori.png')}}" alt="Kategori 3">
                            <h5>Kategori 3</h5>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselKategori" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselKategori" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div> --}}

        <div class="section-divider"></div>

        <!-- Section Rekomendasi -->
        <div class="section-heading mt-4">Produk </div>
        <div id="carouselRekomendasi" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner mt-4">
                <div class="carousel-item " v-for="(chunk, index) in chunckRekomendasi" :key="index"
                    :class="{ active: index === 0 }">
                    <div class="row">
                        <div class="col-md-3" v-for="rekomendasi in chunk" :key="rekomendasi.id">
                            <div class="card onhover"  @click="navigasi(`{{ url('/p/') }}/barang/${rekomendasi.id}`)">
                                <div class="card-img-top">
                                    <img :src="rekomendasi.thumbnail_readable" class="card-img-top" alt="Produk 1"
                                        height="250">
                                    <div class="card-body">
                                        <div class="card-title" style="font-style: uppercase;" >@{{ rekomendasi.nama_barang }}
                                            <br></div>
                                        <div class="card-text">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span >@{{ rupiah(parseInt(rekomendasi.harga_user)) }}</span> <br>
                                                    <div class="mt-1"><span class="badge badge-danger">@{{ rekomendasi.diskon }}%</span>
                                                        <s>@{{ rupiah(rekomendasi.harga_user_asli) }}</s>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row justify-content-between">
                                                        <div class="col-md-9">
                                                            <p class="lokasi">Stock : @{{ rekomendasi.stock_global }}</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselRekomendasi" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselRekomendasi" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
        <div class="section-divider"></div>

    </div>
    <script>
        Vue.createApp({
            data() {
                return {
                    kategori_produk_list: [],
                    slider_list: [],
                    rekomendasi_list: []
                }

            },
            async created() {
                await this.fetchData()
            },
            computed: {
                chunckRekomendasi() {
                    const chunkSize = 4;
                    const chunks = [];
                    for (let i = 0; i < this.rekomendasi_list.length; i += chunkSize) {
                        chunks.push(this.rekomendasi_list.slice(i, i + chunkSize));
                    }
                    return chunks;
                },
                chunckKategoriProduk() {
                    const chunkSize = 3;
                    const chunks = [];
                    for (let i = 0; i < this.kategori_produk_list.length; i += chunkSize) {
                        chunks.push(this.kategori_produk_list.slice(i, i + chunkSize));
                    }
                    return chunks;
                }
            },
            methods: {
                navigasi(url){
                    navigate(url)
                },
                async fetchData() {
                    const response = await httpClient.get("{!! url('p/index-data') !!}/")
                    console.log(response)
                    if (response.data.code == "SUCCESS") {
                        var data = response.data.result
                        this.kategori_produk_list = [
                            ...this.kategori_produk_list,
                            ...data.kategori_produk.map(el => {
                                return el
                            })
                        ];

                        this.slider_list = [
                            ...this.slider_list,
                            ...data.slider.map(el => {
                                return el
                            })
                        ]

                        this.rekomendasi_list = [
                            ...this.rekomendasi_list,
                            ...data.rekomendasi.map(el => {
                                return el
                            })
                        ]

                        console.log(this.slider_list)
                    }

                },
                rupiah(amount) {
                    const rupiahFormat = "Rp " + amount.toLocaleString("id-ID");
                    return rupiahFormat;
                },
            },

        }).mount("#dashboard")
    </script>
@endsection
