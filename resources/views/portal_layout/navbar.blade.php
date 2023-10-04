@include('layout.head')
<body id="root-content" class="content">
    <script src="{!! asset('js/toast.js') !!}"></script>
    <script src="{!! asset('js/loading.js') !!}"></script>
    <script src="{!! asset('js/httpClient.js') !!}"></script>
    <script>
        initializeHttpClient("{!! csrf_token() !!}");
    </script>
    <script src="{!! asset('js/navigator.js') !!}"></script>
    <script src="{!! asset('js/vue_initial.js') !!}"></script>

    <script src="{!! asset('js/ckeditor_initial.js') !!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
        .custom-navbar {
            background-color: #FBD9C0;
            font-weight: 600;
            padding: 10px 20px;
        }
        .navbar-logo {
            font-size: 24px;
            margin-right: 20px; 
        }
        .navbar-menu {
            color: #333333;
            transition: color 0.3s;
            margin-right: 20px; 
        }
        .navbar-menu:hover {
            color: #ff6600;
        }
        .dropdown-menu .submenu {
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
        }
        .dropdown-title {
            margin-left: 33px;
            margin-bottom: 20px;
        }
        .dropdown-divider {
            border-right: 2px solid #000000;
            height: 220px;
            margin: 0 20px;
        }
        .dropdown-header-text {
            font-weight: bolder;
            color: #000000;
        }
        .dropdown-item-text {
            font-weight: 300;
        }
        .search-form {
            position: relative;
            padding-left: 20px; 
            margin-right: 20px;
        }
        .cart-icon {
            font-size: 24px;
            cursor: pointer;
        }
        .keranjang-link {
            margin-left: auto; 
            margin-right: 25px; 
        }

        .jadi-mitra-button {
            color: #757272;
            padding-right: 45px; 
            margin-left: 20px;
            text-decoration: none; 
            
        }

        .user-profile {
            margin-left: 0; 
            margin-right: 28px; 
        }

        .search-input {
            border-radius: 15px;
            padding-right: 40px;
            width: 250px;
        }
        .search-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: #000;
            font-size: 16px;
        }
        .user-profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .user-info {
            display: flex;
            justify-content: center;
        }
        .box-user {
            justify-content: center;
            flex-direction: column;
            text-decoration: none;
        }
        .user-name {
            color: #757272;
            font-family: Poppins;
            font-size: 18px;
            font-style: normal;
            font-weight: 600;
        }
        .user-role {
            color: #757272;
            font-family: Poppins;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
        }
        .dropdown-menu-width {
            width: 300px;
        }
        .dropdown-user {
            display: flex;
            justify-content: space-around;
        }
        .detailsaldo {
            display: flex;
            justify-content: space-between;
        }
        .bottom-dropdown {
            display: flex;
            justify-content: space-between;
        }
        .user-dropdown-link {
            text-decoration: none;
        }
      
    </style>
     <nav class="navbar custom-navbar navbar-expand-lg navbar-light" id="navbar">
        <div class="container">
            <a class="navbar-logo navbar-brand" href="#">
                <img style="width: 110px" src="{{URL::asset('/img/portal/logo.png')}}" alt="Logo" width="65">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="navbar-menu nav-link" style="font-size: 16px; font-weight: bold;" href="{{ url('/p') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-menu nav-link" style="font-size: 16px; font-weight: bold;" href="{{ url('/p/pencarianbarangumkm') }}">Produk</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="navbar-menu nav-link dropdown-toggle" style="font-size: 16px; font-weight: bold;" href="#" id="kategoriDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                        <div class="dropdown-menu" aria-labelledby="kategoriDropdown">
                            <div>
                                <h5 class="dropdown-title dropdown-judul">Kategori Produk</h5>
                            </div>
                            <div class="submenu">
                                <div class="col-md-6">
                                    <h6 class="dropdown-header dropdown-header-text">UMKM</h6>
                                    <a class="dropdown-item dropdown-item-text" href="#">Roti</a>
                                    <a class="dropdown-item dropdown-item-text" href="#">Jenang</a>
                                    <a class="dropdown-item dropdown-item-text" href="#">Wingko</a>
                                    <a class="dropdown-item dropdown-item-text" href="#">Kue Kering</a>
                                    <a class="dropdown-item dropdown-item-text" href="#">Lainnya</a>
                                </div>
                                <div class="dropdown-divider divider"></div>
                                <div class="col-md-6">
                                    <h6 class="dropdown-header dropdown-header-text">Mitra</h6>
                                    <a class="dropdown-item dropdown-item-text" href="#">Beras</a>
                                    <a class="dropdown-item dropdown-item-text" href="#">Gula</a>
                                    <a class="dropdown-item dropdown-item-text" href="#">Garam</a>
                                    <a class="dropdown-item dropdown-item-text" href="#">Minyak</a>
                                    <a class="dropdown-item dropdown-item-text" href="#">Mentega</a>
                                    <a class="dropdown-item dropdown-item-text" href="#">Lainnya</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-menu nav-link" style="font-size: 16px; font-weight: bold;" href="https://www.aspoojateng.com/" target="_blank">Tentang ASPOO</a>
                    </li>
                </ul>
                <form class="search-form" action="/p/cari" role="search">
                    <input class="form-control search-input" type="search" placeholder="Search" name="q" aria-label="Search">
                    <button type="submit" name="cari" class="fa-solid fa-magnifying-glass search-icon"></button>
                </form>
                <a class="navbar-menu keranjang-link" href="{{ url('/p/keranjang') }}">
                    <img  src="{{URL::asset('/img/portal/keranjang.png')}}" alt="Keranjang" width="30">
                </a>
                <a class="navbar-menu jadi-mitra-button" v-if="this.isLoggedin == false" style="font-size: 16px" href="{{ url('/p/login') }}">Jadi Mitra</a>
                <div class="user-profile" v-if="this.isLoggedin == false">
                    <div class="dropdown">
                        <a  href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="user-dropdown-link">
                            <div class="user-info">
                                <img src="{{URL::asset('/img/portal/user-icon.png')}}" alt="">
                              
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-width" aria-labelledby="userDropdown">
                            <a class="dropdown-item" :href="`{{url("/p/login")}}`">Login</a>
                        </div>
                    </div>
                </div>
                <div class="user-profile" v-if="this.isLoggedin == true">
                    <div class="dropdown">
                        <a  href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="user-dropdown-link">
                            <div class="user-info">
                                <img src="{{URL::asset('/img/portal/user-icon.png')}}" alt="">
                                <div class="box-user">
                                    <div class="user-name">@{{this.userData.name}} </div>
                                    <div class="user-role">@{{this.userData.roleName}}</div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-width" aria-labelledby="userDropdown">
                            <div class="dropdown-user">
                                <img src="{{URL::asset('/img/portal/user-icon.png')}}" alt="Avatar" width="40" class="mr-3">
                                <div>
                                    <div class="user-name">@{{this.userData.email}}</div>
                                </div>
                            </div>
                            <div class="dropdown-divider mx-3"></div>
                            <div class="p-3">
                                <div class="detailsaldo">
                                    <div>Saldo</div>
                                    <div>Rp. 20.000</div>
                                </div>
                            </div>
                            <div class="dropdown-divider mx-3"></div>
                            <a class="dropdown-item" href="{{ url('/p/daftartransaksi') }}">Daftar Transaksi</a>
                            <a class="dropdown-item" href="{{ url('/p/status') }}">Status Pembelian</a>
                            <div class="bottom-dropdown">
                                <a class="dropdown-item" href="{{ url('/p/profile') }}">Pengaturan</a>
                                <a style="margin-left: 80px;"  class="dropdown-item" href="{{url("/p/logout")}}">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script>
        const userDropdown = document.getElementById('userDropdown');

        userDropdown.addEventListener('mouseenter', function () {
            if (!this.classList.contains('show')) {
                this.click();
            }
        });

        Vue.createApp({
            data(){
                return {
                    userData : {},
                    isLoggedin : false,
                }
            },
            async created(){
                await this.fetchProfile();
            },
            methods: {
                async fetchProfile(){
                    const response = await httpClient.post("{!! url('p/fetch-login') !!}/")
                    if(response.data.code == "400"){
                        this.isLoggedin = false
                    }else{
                        this.isLoggedin = true
                        this.userData = response.data.result
                        this.userData.roles.forEach(element => {
                                this.userData.roleName = element.name
                        });
                    }
                    console.log("profile",response)
                },
           
            }

        }).mount("#navbar")
    </script>
</body>
