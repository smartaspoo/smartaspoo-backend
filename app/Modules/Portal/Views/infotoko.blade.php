<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartASPOO</title>
    <link rel="icon" href="{{URL::asset('/img/portal/android-chrome-512x512.png')}}" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    /* Add the Poppins font */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
    body {
        font-family: 'Poppins';
    }
    .navbar {
        font-family: 'Poppins';
        background-color: #FBD9C0;
        font-weight: 600;
        display: flex;
        flex-wrap: inherit;
        align-items: center;
        justify-content: flex-start;
    }
    .navbar>.container, .navbar>.container-fluid, .navbar>.container-lg, .navbar>.container-md, .navbar>.container-sm, .navbar>.container-xl, .navbar>.container-xxl {
        display: flex;
        flex-wrap: inherit;
        align-items: center;
        justify-content: flex-start;
        font-weight: bolder;
    }
    .arrow-icon {
        font-size: 28px;
        color: #000; /* Ganti dengan warna yang diinginkan */
        background: none;
        border: none;
        padding: 0;
    }
    .store-description {
        padding: 20px;
    }

    .store-image {
        max-width: 100%;
        height: auto;
        margin-top: 20px; 
    }

    #infotoko-page {
        margin-top: 50px;
        margin-left: 69px;
    }
    .store-name {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        margin-top: 50px;
    }
    .mall-name {
        font-size: 16px;
        color: #fff;
        background-color: #606C5D;
        padding: 5px 10px;
        margin-left: 18px;
        margin-top: 10px;
        display: inline-block;
    }
    .mall-name {
        margin-top: 10px;
    }
    .list-group {
        margin-top: 20px;
        width: 160%; 
    }
    .list-group-item {
        background-color: transparent; 
        border: none;
        border-bottom: 8px solid #000000;
        position: relative;
        padding-left: 25px;
        font-size: 15px; 
    }
</style>
</head>
<body>

<nav class="navbar">
    <div class="container">
        <a href="#" class="btn ">
            <i class="fas fa-arrow-left arrow-icon"></i>
        </a>            
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Detail Toko</a>
            </li>
        </ul>
    </div>
</nav>
<main id="infotoko-page" class="main-content mt-0">
    <section>
        <div class="row g-0" style="max-width: 900px;"> 
            <div class="col-md-3"> 
                <img src="{{URL::asset('/img/portal/storelogo.png')}}" class="img-fluid rounded-start store-image" alt="Store Image">
                <div class="mall-name">Aspoo Mall</div>
            </div>
            <div class="col-md-9"> 
                <h5 class="store-name">Dyriana</h5>
                <p class="card-text"><small class="text-body-secondary">Aktif 3 menit yang lalu</small></p>
                <p class="card-text">Pengikut 6,4 JT | Mengikuti 2</p>
            </div>
            <div class="col-md-12"> 
                <ul class="list-group list-group-flush"> 
                    <li class="list-group-item"><i class="bi bi-star"></i>&nbsp; Penilaian</li>
                    <li class="list-group-item"><i class="bi bi-chat-left-text-fill"></i>&nbsp; Performa Chat</li>
                    <li class="list-group-item" style="padding-left: 45px;">Produk</li>
                    <li class="list-group-item " style="padding-left: 45px;">Bergabung</li>
                    <li class="list-group-item"><i class="bi bi-file-text-fill"></i>&nbsp; Ketarangan</li>
                    <li class="list-group-item" style="padding-left: 45px;">Tautan Toko</li>
                    <li class="list-group-item"><i class="bi bi-check-square-fill"></i>&nbsp; Akun Terverifikasi</li>
                </ul>
                <br>
                <div class="text-center">
                    <button @click="register" type="button" class="btn btn-lg mt-4 mb-0" style="background-color: #606C5D; 
                    color: white; font-weight: bold; border-radius: 15px; margin-top: 20px; width: 160%;">Lihat Semua Produk</button>
                </div>
            </div>
        </div>
    </section>
</main>
</body>


