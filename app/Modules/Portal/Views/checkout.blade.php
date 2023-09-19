<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartASPOO</title>
    <link rel="icon" href="{{URL::asset('/img/portal/android-chrome-512x512.png')}}" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

    body {
        font-family: 'Poppins';
        font-size: 16px;
    }

    .navbar {
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
        color: #000;
        background: none;
        border: none;
        padding: 0;
    }
    .address {
        display: flex;  
        align-items: center;
    }
    .address-caption {
        margin-left: 30px;
    }
    .section-divider {
        border-top: 2px solid #000000;
        margin-top: 50px;
        margin-bottom: 40px;
    }
    .shop-title {
        display: flex; 
        align-items : center;
    }
    .shop {
        background-color: #606C5D;
        border: 1px solid black;
        color: white;
        width: 114px;
        text-align: center;
    }
    .title {
        margin-left: 30px;
    }
    .content-container {
        display: flex;
        background-color: #F5F5F5;
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
        font-weight: 600;
    }

    .product-quantity {
        padding-top: 85px;
        color: #757575;
        margin-right: 25px;
    }
    .form-check-input {
        border: 2px solid black;
    }
    .d-flex {
        margin-top: 30px;
    }
    .row-voucher {
        display: flex; 
        align-items: center; 
        margin-top: 40px;
    }
    .caption-voucher {
        margin-top: 5px;
        margin-left: 10px;
    }
    .form-voucher {
        margin-left: auto;
        border: none;
    }
    .form-voucher input {
        border: none;
        outline: none;
        background: none;
        padding: 0;
        font-size: inherit;
        width: 216px;
    }
    #keterangan-ongkir {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }
    .form-grouppesan {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .form-control{
        height: 20px;
        width: 300px;
    }
    .form-grouppembayaran {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    #metodePembayaran{
        width: 200px;
    }

    .end-shop {
        display: flex; 
        align-items : center;
        justify-content: space-between;
        margin-top: 70px;
        margin-bottom: 20px;
    }

    .shop2 {
        background-color: #606C5D;
        border: 1px solid black;
        color: white;
        width: 114px;
        text-align: center;
        padding: 10px;
        width: 70%;
        margin-top: 20px;
    }
    .btn-custom {
        width: 30%;
        background-color: #FFF4F4;
        color: black;
        font-weight: bold;
        border: 1px solid black;
        padding: 10px;
    }

    .total-pesanan {
        display: flex; 
        justify-Content: space-between;
        align-Items: center; 
        margin-Top: 60px;
    }
    .rincian {
        margin-top: 50px;
    }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="{{ url('/p/keranjang') }}" class="btn ">
                <i class="fas fa-arrow-left arrow-icon"></i>
            </a>            
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Checkout</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="container" style="margin-top: 50px; font-size: 16px;">
        <div class="row">
            <div class="address">
                <img src="{{URL::asset('/img/portal/Address.png')}}" alt="alamat" class="img-fluid">
                <p class="address-caption"><strong>Alamat Pengiriman</strong> <br />Wardah Maulina | (+62) 823345623442 
                <br> Jalan Sadewa no 23 rt 04/01 Semarang Utara Suyudono, Kab Semarang, Jawa Tengah, ID 23456</p>
            </div>
        </div>
        <div class="section-divider"></div>
        <div class="row">
            <div class="shop-title">
                <p class="shop">Aspo Mall</p>
                <p class="title"><strong> Dyriana Official Shop</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="content-container">
                <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Product Image" class="product-image">
                <div class="product-details">
                    <div class="product-name">Nama Produk</div>
                    <div class="product-price">Rp. 85.000</div>
                </div>
                <div class="caption-total">
                    <div class="product-quantity">x1</div>
                </div>
            </div>
        </div>
    <form action="" class="form-voucher">
        <div class="row">
            <div class="d-flex justify-content-between align-items-center">
                <p class="text-muted">Opsi Pengiriman</p>
            </div>
        </div>
        <div class="section-divider"></div>
        <div class="row">
            <div class="form-group">
                <select class="form-select" id="metodePengiriman">
                    <option value="" disabled selected>Pilih metode pengiriman</option>
                    <option value="reguler">Reguler</option>
                    <option value="hemat">Hemat</option>
            
                </select>
                <div style="keterangan-ongkir" id="keterangan-ongkir">
                    <p id="keteranganMetode" class="text-muted"></p>
                    <p id="keteranganHarga" class="text-muted"></p>
                </div>
            </div>
        </div>
        <div class="section-divider"></div>
        <div class="row">
            <div class="form-grouppesan">
                <label for="pesanTextarea">Pesan</label>
                <div class="caption-pesan">
                    <textarea class="form-control" id="pesanTextarea" placeholder="Silahkan tinggalkan pesan disini"></textarea>
                </div>
            </div>
        </div>
        <div class="section-divider"></div>
        <div class="row">
            <div class="form-grouppembayaran">
                <label for="metodePembayaran">Metode Pembayaran</label>
                <select class="form-select" id="metodePembayaran">
                    <option value="ovo">OVO</option>
                    <option value="dana">DANA</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                </select>
            </div>
        </div>
        <div class="row ">
            <div class="total-pesanan">
                <a>Total Pesanan ( 1 Produk ) :</a>
                <a >Rp. 45.000</a>
            </div>
        </div>
        <div class="row">
            <p class="rincian"><strong>Rincian Pembayaran</strong></p>
        </div>
        <div class="row ">
            <div class="total-pesanan">
                <a>Subtotal untuk produk</a>
                <a >Rp. 45.000</a>
            </div>
        </div>
        <div class="row ">
            <div class="total-pesanan">
                <a>Subtotal pengiriman</a>
                <a >Rp. 45.000</a>
            </div>
        </div>
        <div class="row ">
            <div class="total-pesanan">
                <a>Biaya Layanan</a>
                <a >Rp. 45.000</a>
            </div>
        </div>
        <div class="row ">
            <div class="total-pesanan">
                <a>Biaya Penanganan</a>
                <a >Rp. 45.000</a>
            </div>
        </div>
        <div class="row">
            <div class="end-shop">
                <p class="shop2">Total Pembayaran : Rp.20.000</p>
                <button type="submit" value="Buat Pesanan" class=" btn-custom">Buat Pesanan</button>
            </div>
        </div>
    </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const metodePengiriman = document.getElementById('metodePengiriman');
        const keteranganMetode = document.getElementById('keteranganMetode');
        
        metodePengiriman.addEventListener('change', function() {
            if (metodePengiriman.value === 'reguler') {
                const today = new Date();
                const futureDate = new Date(today);
                futureDate.setDate(futureDate.getDate() + 3);
                
                const untilDate = new Date(today);
                untilDate.setDate(untilDate.getDate() + 5);

                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                const formattedToday = today.toLocaleDateString('id-ID', options);
                const formattedFutureDate = futureDate.toLocaleDateString('id-ID', options);
                const formattedUntilDate = untilDate.toLocaleDateString('id-ID', options);
                
                keteranganMetode.textContent = `Akan diterima mulai ${formattedFutureDate} hingga ${formattedUntilDate}`;
                keteranganHarga.textContent = 'Rp. 30.000';
            } else if (metodePengiriman.value === 'hemat') {
                const today = new Date();
                const futureDate = new Date(today);
                futureDate.setDate(futureDate.getDate() + 5);
                
                const untilDate = new Date(today);
                untilDate.setDate(untilDate.getDate() + 7);

                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                const formattedToday = today.toLocaleDateString('id-ID', options);
                const formattedFutureDate = futureDate.toLocaleDateString('id-ID', options);
                const formattedUntilDate = untilDate.toLocaleDateString('id-ID', options);
                
                keteranganMetode.textContent = `Akan diterima mulai ${formattedFutureDate} hingga ${formattedUntilDate}`;
                keteranganHarga.textContent = 'Rp. 20.000';
            } else {
                keteranganMetode.textContent = '';
            }
        });
        </script>
</body>
</html>
