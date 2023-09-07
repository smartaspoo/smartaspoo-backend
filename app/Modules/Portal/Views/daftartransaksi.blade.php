<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <title>SmartASPOO</title>
    <link rel="icon" href="{{URL::asset('/img/portal/android-chrome-512x512.png')}}" type="image/png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #FBD9C0;
            font-weight: 600;
        }

        .container-nav {
            display: flex;
            flex-wrap: inherit;
            align-items: center;
            justify-content: flex-start;
            padding-left: 50px;
        }

        .search-container {
            display: flex;
            align-items: center;
            margin-top: 20px;
            justify-content: space-between;
        }

        .search-bar,
        .product-dropdown,
        .date-input {
            background-color: #F5F5F5;
            padding: 10px;
            border: none;
            margin-right: 10px;
            border-radius: 24px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-icon {
            font-size: 20px;
            color: #757575;
            margin-right: 5px;
            background-color: transparent;
            border: none;
        }

        .search-bar {
            display: flex;
            align-items: center;
        }
        .search-input {
            background-color: transparent;
            border: none;
            height: 25px;
        }

        .product-dropdown {
            text-align: center;
        }

        .date-input {
            display: flex;
            align-items: center;
        }

        .icon-calendar {
            font-size: 20px;
            margin-right: 5px;
        }
        .date-picker {
            background-color: transparent;
            border: none; 
        }

        .content-container {
            display: flex;
            background-color: #F5F5F5;
            padding: 20px;
            margin-top: 20px;
            align-items: center;
        }

        .product-image {
            max-width: 150px;
            margin-right: 20px;
        }

        .product-details {
            flex: 1;
        }

        .product-name {
            font-size: 18px;
            font-weight: 600;
        }

        .product-quantity {
            padding-top: 85px;
            color: #757575;
        }

        .vertical-line {
            border-left: 2px solid #000000;
            height: 60px;
            margin: 0 20px;
            margin-top: 55px;
        }

        .caption-link {
            color: #196CE9;
            text-decoration: none;
            margin-right: 20px;
        }

        .total-price {
            color: #196CE9;
        }
        .caption-total {
            padding-top: 60px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container-nav">
            <a href="/p/" class="btn">
                <i class="fas fa-arrow-left arrow-icon"></i>
            </a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Daftar Transaksi</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="search-container">
            <form class="search-bar" role="search">
                <input class="form-control search-input" type="search" placeholder="Search" aria-label="Search">
                <button type="submit" name="cari" class="fa-solid fa-magnifying-glass search-icon"></button>
            </form>
            <select class="product-dropdown">
                <option value="" disabled selected>Semua Produk</option>
                <option value="" >Produk A</option>
                <option value="" >Produk B</option>
                <option value="" >Produk C</option>
            </select>
            <div class="date-input">
                <i class="far fa-calendar-alt icon-calendar"></i>
                <input type="date" class="date-picker" placeholder="Pilih Tanggal Transaksi">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="content-container">
            <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Product Image" class="product-image">
            <div class="product-details">
                <div class="product-name">Nama Produk</div>
                <div class="product-quantity">x1</div>
            </div>
            <div class="caption-total">
                <a href="#" class="caption-link">Lihat Daftar Transaksi</a>
            </div>
            <div class="vertical-line"></div>
            <div class="caption-total">
                <a>Total Harga</a><br>
                <a>Rp. 10.000</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
