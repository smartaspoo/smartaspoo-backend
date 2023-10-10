@extends('portal_layout.templates')
@section('content')
  
    <div class="container">
        <div class="search-container">
            <form class="search-bar" role="search">
                <input class="form-control search-input"  name="cari" type="search" placeholder="Cari Kode Transaksi" aria-label="Search">
                <button type="submit" class="fa-solid fa-magnifying-glass search-icon"></button>
            </form>
           
        </div>
        @if($data == null)
        <div class="content-container">
            <h1>Anda belum memiliki transaksi</h1>
        </div>
        @endif
        @foreach($data as $transaksi)
        <div class="content-container">
            <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Product Image" class="product-image">
            <div class="product-details">
                <div class="product-name">Nama Produk: {{ $transaksi['namaBarang'] }}</div>
                <p>Kode Transaksi : {{ $transaksi['kodeTransaksi'] }}</p>
                <p>Tanggal  : {{ $transaksi['createdDate'] }} <br>
                    Status  : {{$transaksi['statusReadable']}}
                </p>
                @if($transaksi['status'] == '3')
                <button type="submit" class="btn btn-primary ubah-status" data-transaksi-id="{{ $transaksi['transaksiId'] }}">Barang Diterima</button>
                @endif
                <div class="product-quantity">x {{ $transaksi['jumlah'] }}</div>
            </div>
            <div class="caption-total">
                <a href="{{url('p/status/').'/'.$transaksi['kodeTransaksi']}}" class="caption-link">Lihat Daftar Transaksi</a>
            </div>
            <div class="vertical-line"></div>
            <div class="caption-total">
                <a>Total Harga</a><br>
                <a>{{ $transaksi['totalHargaFormatted'] }}</a>
            </div>
        </div>
        @endforeach
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



@endsection