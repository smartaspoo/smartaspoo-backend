@extends('portal_layout.templates')
@section('content')
  
<div class="container">
<style>
        .search-container {
            margin-bottom: 20px;
        }

        .search-bar {
            display: flex;
            align-items: center;
        }

        .search-input {
            border: 2px solid #FBD9C0;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
        }

        .search-icon {
            background-color: #FBD9C0;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 20px;
        }

        .content-container {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex; 
            align-items: center; 
        }

        .product-image {
            max-width: 150px;
            height: auto;
            display: block;
            margin-right: 20px; 
        }

        .product-details {
            flex: 1; 
        }

        .product-name {
            font-weight: bold;
            font-size: 18px;
        }

        .product-details p {
            font-size: 16px;
            margin: 5px 0;
        }

        .ubah-status,
        .ubah-status-gagal {
            background-color: #FBD9C0;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            padding: 5px 10px;;
            margin-top: 10px;
        }

        .vertical-line {
            background-color: #FBD9C0;
            width: 2px;
            height: 100%;
            margin: 0 20px;
        }

        .caption-link {
            color: #007BFF;
            font-size: 16px;
        }
    </style>

<<<<<<< HEAD
=======
    {{-- <div class="search-container">
        <form class="search-bar" role="search">
            <input class="form-control search-input" name="cari" type="search" placeholder="Cari Kode Transaksi" aria-label="Search">
            <button type="submit" class="btn btn-primary search-icon" style="background-color: #FBD9C0;">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div> --}}
>>>>>>> d0d0bab34390394674b0db3fbd73b20f45cde885
    @if($data == null)
    <div class="content-container">
        <h1>Anda belum memiliki transaksi</h1>
    </div>
    @endif
    @foreach($data as $transaksi)
    <div class="content-container mt-3">
        <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Product Image" class="product-image">
        <div class="product-details">
            <div class="product-name">Nama Produk: {{ $transaksi['namaBarang'] }}</div>
            <p>Kode Transaksi : {{ $transaksi['kodeTransaksi'] }}</p>
            <p>Tanggal  : {{ $transaksi['createdDate'] }} <br>
                Status  : {{$transaksi['statusReadable']}}
            </p>
            @if($transaksi['status'] == '3')
            <button type="button" class="btn btn-primary ubah-status" data-transaksi-id="{{ $transaksi['transaksiId'] }}" style="background-color: #FBD9C0;">Barang Diterima</button>
            <button type="button" class="btn btn-warning ubah-status-gagal" data-transaksi-id="{{ $transaksi['transaksiId'] }}" style="background-color: #FBD9C0;">Barang Tidak Diterima</button>
            @endif
            <div class="product-quantity">x {{ $transaksi['jumlah'] }}</div>
        </div>
        <div class="caption-total">
            <a href="{{url('p/status/').'/'.$transaksi['kodeTransaksi']}}" class="caption-link">Lihat Daftar Transaksi</a>
        </div>
        <div class="vertical-line" style="background-color: #FBD9C0;"></div>
        <div class="caption-total">
            <a>Total Harga</a><br>
            <a>{{ $transaksi['totalHargaFormatted'] }}</a>
        </div>
    </div>
    @endforeach
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(".ubah-status").click(function() {
        var transaksiId = $(this).data("transaksi-id");
        
        // Send an AJAX request to update the status
        $.ajax({
            type: "POST",
            url: "{{ route('update.status') }}", // Replace with the actual route name
            data: {
                "_token": "{{ csrf_token() }}",
                "transaksiId": transaksiId,
                "newStatus": "4"
            },
            success: function(response) {
                if (response.success) {
                    alert("status diupdate.");
                    // Update the button text and disable the button
                    $(".ubah-status[data-transaksi-id='" + transaksiId + "']").text("Status Updated").prop("disabled", true);
                } else {
                    alert("gagal mengupdate status.");
                }
            },
            error: function() {
                alert("mbuh ra ketemu error e");
            }
        });
    });
});
</script>

<script>
    $(document).ready(function() {
    $(".ubah-status-gagal").click(function() {
        var transaksiId = $(this).data("transaksi-id");

        // Menggunakan prompt untuk meminta nama dari pengguna
        var barangtidakditerima = prompt("Masukkan alasan barang tidak diterima:");

        if (barangtidakditerima === null || barangtidakditerima === "") {
            alert("Silakan masukkan pesan disini");
            return;
        }
        
        // Send an AJAX request to update the status
        $.ajax({
            type: "POST",
            url: "{{ route('update.status.gagal') }}", // Replace with the actual route name
            data: {
                "_token": "{{ csrf_token() }}",
                "transaksiId": transaksiId,
                "newStatus": "44",
                "barangtidakditerima" : barangtidakditerima
            },
            success: function(response) {
                if (response.success) {
                    alert("status diupdate.");
                    // Update the button text and disable the button
                    $(".ubah-status[data-transaksi-id='" + transaksiId + "']").text("Status Updated").prop("disabled", true);
                } else {
                    alert("gagal mengupdate status.");
                }
            },
            error: function() {
                alert("mbuh ra ketemu error e");
            }
        });
    });
});
</script>



@endsection