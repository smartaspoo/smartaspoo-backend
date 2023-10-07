@extends('dashboard_layout.index')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

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
                <h5 class="text-white op-7 mb-2">SmartAspoo Admin Panel</h5>
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
                <!-- Tabel Data Barang -->
                <div class="col-md-12 mt-4">
                    <h4>Data Barang</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>Nama Barang</th>
                            <th style="width: 100px;">Terjual</th>
                            <th>Foto</th>
                            <th style="width: 100px;">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sambal Petai</td>
                                <td>10</td>
                                <td><img src="path_to_image_1.jpg" alt="Foto Barang 1"></td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>Jenang Mubarok</td>
                                <td>5</td>
                                <td><img src="path_to_image_2.jpg" alt="Foto Barang 2"></td>
                                <td>30</td>
                            </tr>
                            <tr>
                                <td>Abon Lele</td>
                                <td>20</td>
                                <td><img src="path_to_image_2.jpg" alt="Foto Barang 2"></td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Sirup Parijoto</td>
                                <td>50</td>
                                <td><img src="path_to_image_2.jpg" alt="Foto Barang 2"></td>
                                <td>211</td>
                            </tr>
                            <tr>
                                <td>Carica Podang Mas</td>
                                <td>100</td>
                                <td><img src="path_to_image_2.jpg" alt="Foto Barang 2"></td>
                                <td>324</td>
                            </tr>
                            <tr>
                                <td>Bawang Goreng</td>
                                <td>80</td>
                                <td><img src="path_to_image_2.jpg" alt="Foto Barang 2"></td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Teh Jawa Celup Black Tea</td>
                                <td>120</td>
                                <td><img src="path_to_image_2.jpg" alt="Foto Barang 2"></td>
                                <td>2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
                '#FFA500',
                '#00000',
                '#FFD700',
                '#D6BD68',
                '#FF0000',
                '#D3D3D3',
                '#800080'
            ],
            borderColor : "#BBBBBB",
            hoverOffset: 4
        }]
    };

    const ctx = document.getElementById('myPieChart');
    const config = {
        type: 'pie',
        data: data,
        options: {
        plugins: {
            title: {
                display: true,
                text: 'Chart Status Transaksi',
                color : "#3621c2"
                
            },
            legend :{
                position : "bottom"
            }
        }
    }
    };

    const myPieChart = new Chart(ctx, config);
</script>



@endsection
