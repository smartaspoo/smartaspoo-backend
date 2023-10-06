@extends('dashboard_layout.index')
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap');
    body {
        font-family: 'Poppins', sans-serif;
    }
    
     .card {
        border-radius: 8px;
        height: 130px;
    }
</style>

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                <h5 class="text-white op-7 mb-2">Smartaspoo</h5>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <!-- Kolom Kiri -->
        <div class="col-md-6 mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                        <div class="card-body">
                            <h5 class="card-text">Total Stok Barang</h5>
                            <h1 class="card-text fw-bold" id="total-stok">{{ $data['total_stock'] }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                        <div class="card-body">
                            <h5 class="card-text">Total Barang</h5>
                            <h1 class="card-text fw-bold" id="total-stok">{{ $data['total_barang'] }}</h1>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                        <div class="card-body">
                            <h5 class="card-text">Total Transaksi Berhasil</h5>
                            <h1 class="card-text fw-bold" id="total-stok">{{ $data['transaksi_berhasil'] }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                        <div class="card-body">
                            <h5 class="card-text">Total Transaksi Gagal</h5>
                            <h1 class="card-text fw-bold" id="total-stok">{{ $data['transaksi_gagal'] }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                        <div class="card-body">
                            <h5 class="card-text">Total Transaksi</h5>
                            <h1 class="card-text fw-bold" id="total-stok">{{ $data['total_transaksi'] }}</h1>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- Kolom Kanan -->
        <div class="col-md-6 mt-4">
            <canvas id="myPieChart" style="background-color: #E1EFFA;"></canvas>
        </div>
    </div>
</div>

<script>
    const data = {
        labels: [
            'Transaksi Diterima Penjual',
            'Transaksi Ditolak Penjual',
            'Uang Diterima ASPOO',
            'Uang Ditolak ASPOO',
            'Barang Dikirim Oleh Penjual',
            'Barang Tidak Jadi Dikirim Oleh Penjual',
            'barang Diterima Oleh Pembeli',
            'barang Tidak Diterima',
            'Transaksi Dibuat Oleh Pembeli'
        ],
        datasets: [{
            label: 'Transaksi',
            data: [{{$data['transaksi_berhasil']}}, {{$data['transaksi_gagal']}}, {{ $data['uang_diterima'] }}, {{ $data['uang_ditolak'] }}, {{ $data['barang_dikirim'] }}, {{ $data['barang_tidak_dikirim']}}, {{$data['barang_diterima']}}, {{ $data['barang_tidak_diterima'] }}, {{ $data['transaksi_dibuat'] }}],
            backgroundColor: [
                '#FF6384', 
                '#36A2EB',
                '#FFCE56',
                '#00000',
                '#FFD700',
                '#D6BD68',
                '#C0C0C0',
                '#000080',
                '##b5b31f'
            ],
            hoverOffset: 4
        }]
    };

    const ctx = document.getElementById('myPieChart');
    const config = {
        type: 'pie',
        data: data,
    };

    const myPieChart = new Chart(ctx, config);
</script>



@endsection
