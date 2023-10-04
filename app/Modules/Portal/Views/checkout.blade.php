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

        .navbar>.container,
        .navbar>.container-fluid,
        .navbar>.container-lg,
        .navbar>.container-md,
        .navbar>.container-sm,
        .navbar>.container-xl,
        .navbar>.container-xxl {
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
            align-items: center;
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

        .product-total {
            padding-top: 75px;
            color: #757575;
            margin-right: 25px;
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

        .caption-pesan1 {
            border: 1px solid black;
            height: 30px;
        }

        .form-grouppesan {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-control {
            height: 20px;
            width: 300px;
        }

        .form-grouppembayaran {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #metodePembayaran {
            width: 200px;
        }

        .end-shop {
            display: flex;
            align-items: center;
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
                <p class="address-caption"><strong>Alamat Pengiriman</strong> <br />{{$user->name}} |
                    {{$userdetail->telepon}}

                    <br>{{$userdetail->alamat}}
                </p>
            </div>
        </div>
        <div class="section-divider"></div>
        <div class="row">
            <div class="shop-title">
                <p class="shop">Aspo Mall</p>
                <p class="title"><strong> {{ $data[0]->barang->user->name }}</strong></p>
            </div>
        </div>
        @php
        function rupiah($angka){
        $rupiah = "Rp " . number_format($angka,0,',','.');
        return $rupiah;
        }
        $totalHarga = 0;
        @endphp
        @foreach($data as $dt)

        <div class="row">
            <div class="content-container">
                <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Product Image" class="product-image">
                <div class="product-details">

                    <div class="product-name">{{$dt->barang->nama_barang}}</div>
                    <div class="product-price">{{rupiah($dt->barang->harga_user)}}</div>
                </div>
                <div class="caption-total">
                    @php
                    $totalHarga += $dt->barang->harga_user*$dt->jumlah;
                    @endphp
                    <div class="product-quantity">Jumlah = x{{$dt->jumlah}}</div>
                    <div class="product-total"><b>Total Harga : {{rupiah($dt->barang->harga_user*$dt->jumlah)}}</b>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <form action="" class="form-voucher">
            <div class="section-divider"></div>
            <div class="row">
                <div class="form-grouppesan">
                    <label for="pesanTextarea">Ongkir</label>
                    <div class="caption-pesan1">
                        <input class="form-control" id="ongkirTextarea" placeholder="" type="number" min="0"></input>
                    </div>
                </div>
            </div>
            <div class="section-divider"></div>
            <div class="row">
                <div class="form-grouppesan">
                    <label for="pesanTextarea">Pesan</label>
                    <div class="caption-pesan">
                        <textarea class="form-control" id="pesanTextarea" placeholder="Silahkan tinggalkan pesan disini">
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="section-divider"></div>
            <div class="row">
                <div class="form-grouppembayaran">
                    <label for="metodePembayaran">Metode Pembayaran</label>
                    <select class="form-select" id="metodePembayaran">
                        <option value="Transfer Bank">Transfer Bank</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <p class="rincian"><strong>Rincian Pembayaran</strong></p>
            </div>
            <div class="row">
                <div class="total-pesanan">
                    <a>Subtotal untuk produk</a>
                    <span >{{rupiah($totalHarga)}}</span>
                    <input type="hidden" id="subtotalProduk" value="{{$totalHarga}}">
                </div>
            </div>
            <div class="row">
                <div class="total-pesanan">
                    <a>Subtotal pengiriman</a>
                    <span id="subtotalPengiriman">Rp 0</span>
                </div>
            </div>
            <div class="row">
                <div class="end-shop">
                    <p class="shop2">Total Pembayaran : <span id="totalPembayaran">121</span> </p>
                    <button type="submit" value="Buat Pesanan" class=" btn-custom">Buat Pesanan</button>
                </div>
            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function rupiah(amount) {
            const rupiahFormat = "Rp " + amount.toLocaleString("id-ID");
            return rupiahFormat;
        };
        let hargaPengiriman = 0;

        const ongkirTextarea = document.getElementById('ongkirTextarea');
        const subtotalPengiriman = document.getElementById('subtotalPengiriman');

        // Menambahkan event listener untuk textarea
        ongkirTextarea.addEventListener('input', function() {
            // Mengambil nilai dari textarea
            const inputValue = ongkirTextarea.value;

            // Menampilkan nilai di bawah textarea
            subtotalPengiriman.textContent = rupiah(parseInt(inputValue));
            updateSubtotal(inputValue)
        });




        // Fungsi untuk mengupdate tampilan subtotal
        function updateSubtotal(input) {
            const subtotalPengiriman = parseInt(input) || 0; // Konversi ke integer atau 0 jika tidak valid
            const subtotalProduk = document.querySelector("#subtotalProduk")
            const totalPesanan = parseInt(subtotalProduk.value) + parseInt(subtotalPengiriman);

            document.getElementById('subtotalPengiriman').textContent = rupiah(subtotalPengiriman);

            // Update total pembayaran
            document.querySelector('#totalPembayaran').textContent = rupiah(totalPesanan);
        }


    </script>


</body>

</html>