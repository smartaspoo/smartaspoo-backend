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
                <h5 class="text-white op-7 mb-2">Dnt Software Core</h5>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
    <div class="col-md-3">
        <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                <div class="card-body">
                    <h5 class="card-text">Total Stok Barang</h5>
                    <h1 class="card-text fw-bold" >1000</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                <div class="card-body">
                    <h5 class="card-text">Total Barang</h5>
                    <h1 class="card-text fw-bold">500</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                <div class="card-body">
                    <h5 class="card-text">Total Barang Dikirim</h5>
                    <h1 class="card-text fw-bold">300</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                <div class="card-body">
                    <h5 class="card-text">Total Barang Ditolak</h5>
                    <h1 class="card-text fw-bold">50</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                <div class="card-body">
                    <h5 class="card-text">Total Transaksi</h5>
                    <h1 class="card-text fw-bold">500</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                <div class="card-body">
                    <h5 class="card-text">Total Transaksi Gagaal</h5>
                    <h1 class="card-text fw-bold">300</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                <div class="card-body">
                    <h5 class="card-text">Total Transaksi Berhasil</h5>
                    <h1 class="card-text fw-bold">50</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
