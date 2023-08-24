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
            font-family: 'Poppins', sans-serif;
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
            font-size: 28px;
            color: #000; /* Ganti dengan warna yang diinginkan */
            background: none;
            border: none;
            padding: 0;
        }

        .status-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
        }

        .container {
            margin-top: 20px;
        }
        .imageproduk{
            max-width: 200px;
        }
        .product-detail {
            width: auto;
            background: #F0F0F0;
            padding-right: 20px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-top: 50px;
        }

        .shipment-details {
            margin-left: 150px;
        }

        .shipment-info {
            margin-bottom: 20px;
            padding-left: 20px;
        }

        .shipment-info2 {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 50px;
        }

        .resi {
            font-family: 'Poppins', sans-serif;
            font-weight: bolder;
        }

        .rigth-info {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-left: 20px;
        }
        .btn-text-primary {
            color: #196CE9;
            border: none;
            padding-left: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
        }
        .section-divider {
            border-top: 2px solid #000000;
            margin-top: 50px;
            margin-bottom: 60px;
        }
        .timeline {
            position: relative;
        }

        .timeline-item {
            position: relative;
            padding-left: 50px;
            margin-bottom: 30px;
        }

        .timeline-item::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #000000;
        }

        .timeline-content {
            margin-left: 40px;
        }

        .timeline-number {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 20px;
        }

        .timeline-time {
            position: absolute;
            left: -100px;
            top: 0;
            font-size: 14px;
            font-weight: 500;
        }

        .timeline-description {
            font-size: 16px;
        }

        .timeline-divider {
            position: absolute;
            left: 10px;
            top: 20px;
            height: calc(100% - 20px);
            border-left: 2px solid #000000;
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
                    <a class="nav-link" href="#">Status Pengiriman</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="product-detail">
            <img class="imageproduk" src="{{URL::asset('/img/portal/produk.png')}}" alt="Product Image">
            <div class="shipment-info">
                <div>Diterima pada hari Sabtu 17 Juni 2023</div>
                <br>
                <div>Dikirim dengan reguler - J&T Express</div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="shipment-info2">
            <div class="resi">Nomor Resi</div>
            <div class="rigth-info">
                <div>123456789</div>
                <button class="btn btn-text-primary">Salin</button>
            </div>
        </div>
        <div class="section-divider"></div>
        <div class="shipment-details">
            <div class="shipment-details">
                <div class="timeline">
                    <div class="timeline-divider"></div>
                    <div class="timeline-item">
                        <div class="timeline-time">17 Juni 2023<br>17:00</div>
                        <div class="timeline-content">
                            <div class="timeline-number">Terkirim</div>
                            <div class="timeline-description">Pesanan Diproses</div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">19 Juni 2023<br>17:00</div>
                        <div class="timeline-content">
                            <div class="timeline-number">Pesanan dalam pengiriman</div>
                            <div class="timeline-description">Pesanan Dikirim</div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">18 Juni 2023<br>17:00</div>
                        <div class="timeline-content">
                            <div class="timeline-description">Pesanan telah sampai di lokasi transit Hub SEMARANG</div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
