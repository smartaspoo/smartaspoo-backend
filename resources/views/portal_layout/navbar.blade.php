@include('layout.head')
<body id="root-content" class="content">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: #FBD9C0;
            font-weight: 600;
            padding: 10px 20px;
        }
        .navbar-brand {
            font-size: 24px;
            margin-right: 20px; 
        }
        .navbar-nav .nav-link {
            color: #333333;
            transition: color 0.3s;
            margin-right: 20px; 
        }
        .navbar-nav .nav-link:hover {
            color: #ff6600;
        }
        .dropdown-menu .submenu {
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
        }
        .dropdown-judul {
            margin-left: 33px;
            margin-bottom: 20px;
        }
        .divider {
            border-right: 2px solid #000000;
            height: 220px;
            margin: 0 20px;
        }
        .dropdown-header{
            font-weight: bolder;
            color: #000000;
        }
        .dropdown-item {
            font-weight: 300;
        }
        .search-form {
            position: relative;
            padding-left: 20px; 
            margin-right: 20px;
        }
        .keranjang {
            margin-left: auto; 
            margin-right: 25px; 
        }

        .jadi-mitra-button {
            font-size: 15px;
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
        .cart-icon {
            font-size: 24px;
            cursor: pointer;
        }
        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .user-info{
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
        .user-profile .dropdown-menu {
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
        .bottom-dropdown{
            display: flex;
            justify-content: space-between;
        }
        #userDropdown {
            text-decoration: none;
        }
      
    </style>
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img style="width: 100px" src="{{URL::asset('/img/portal/logo.png')}}" alt="Logo" width="60">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/p') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/p/pencarianbarangumkm') }}">Produk</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="kategoriDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                        <div class="dropdown-menu" aria-labelledby="kategoriDropdown">
                            <div>
                                <h5 class="dropdown-judul">Kategori Produk</h5>
                            </div>
                            <div class="submenu">
                                <div class="col-md-6">
                                    <h6 class="dropdown-header">UMKM</h6>
                                    <a class="dropdown-item" href="#">Roti</a>
                                    <a class="dropdown-item" href="#">Jenang</a>
                                    <a class="dropdown-item" href="#">Wingko</a>
                                    <a class="dropdown-item" href="#">Kue Kering</a>
                                    <a class="dropdown-item" href="#">Lainnya</a>
                                </div>
                                <div class="divider"></div>
                                <div class="col-md-6">
                                    <h6 class="dropdown-header">Mitra</h6>
                                    <a class="dropdown-item" href="#">Beras</a>
                                    <a class="dropdown-item" href="#">Gula</a>
                                    <a class="dropdown-item" href="#">Garam</a>
                                    <a class="dropdown-item" href="#">Minyak</a>
                                    <a class="dropdown-item" href="#">Mentega</a>
                                    <a class="dropdown-item" href="#">Lainnya</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.aspoojateng.com/" target="_blank">Tentang ASPOO</a>
                    </li>
                </ul>
                <form class="search-form" action="/p/cari" role="search">
                    <input class="form-control search-input" type="search" placeholder="Search" name="q" aria-label="Search">
                    <button type="submit" name="cari" class="fa-solid fa-magnifying-glass search-icon"></button>
                </form>
                <a class="nav-link keranjang" href="{{ url('/p/keranjang') }}">
                    <img  src="{{URL::asset('/img/portal/keranjang.png')}}" alt="Keranjang" width="30">
                </a>
                <a class="jadi-mitra-button" v-if="this.isLoggedin == false" href="{{ url('/p/login') }}">Jadi Mitra</a>
                <div class="user-profile" v-if="this.isLoggedin == false">
                    <div class="dropdown">
                        <a  href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="user-info">
                                <img src="{{URL::asset('/img/portal/user-icon.png')}}" alt="">
                              
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <a class="dropdown-item" :href="`{{url("/p/login")}}`">Login</a>
                        </div>
                    </div>
                </div>
                <div class="user-profile" v-if="this.isLoggedin == true">
                    <div class="dropdown">
                        <a  href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="user-info">
                                <img src="{{URL::asset('/img/portal/user-icon.png')}}" alt="">
                                <div class="box-user">
                                    <div class="user-name">@{{this.userData.name}} </div>
                                    <div class="user-role">@{{this.userData.roleName}}</div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <div class=" dropdown-user">
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
                    console.log("provile",response)
                },
           
            }

        }).mount("#navbar")
    </script>

