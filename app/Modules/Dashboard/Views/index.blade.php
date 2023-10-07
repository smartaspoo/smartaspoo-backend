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
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div style="margin-bottom: 40px;"> 
                    <h5 class="card-text">Total Stok Barang</h5>
                    <h1 class="card-text fw-bold">1000</h1>
                </div>
                <div style="color: #3621C2;">
                    <i class="bi bi-box-seam" style="font-size: 57px; width: 57px; height: 57px;"></i>
                </div>
            </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                <div class="card-body">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div style="margin-bottom: 40px;"> 
                    <h5 class="card-text">Total Barang</h5>
                    <h1 class="card-text fw-bold">500</h1>
                </div>
                <div style="color: #3621C2;">
                    <i class="bi bi-folder" style="font-size: 57px; width: 57px; height: 57px;"></i>
                </div>
            </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                <div class="card-body">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div style="margin-bottom: 40px;"> 
                    <h5 class="card-text">Total Barang Dikirim</h5>
                    <h1 class="card-text fw-bold">300</h1>
                </div>
                <div style="color: #3621C2;">
                    <i class="bi bi-truck" style="font-size: 57px; width: 57px; height: 57px;"></i>
                </div>
            </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                <div class="card-body">
                    <h5 class="card-text">Total Barang Ditolak</h5>
                    <h1 class="card-text fw-bold">50</h1>
                </div>
                <div style="color: #3621C2;">
                    <i class="bi bi-database-x" style="font-size: 57px; width: 57px; height: 57px;"></i>
                </div>
            </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                <div class="card-body">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div style="margin-bottom: 40px;"> 
                    <h5 class="card-text">Total Transaksi</h5>
                    <h1 class="card-text fw-bold">500</h1>
                </div>
                <div style="color: #3621C2;">
                    <i class="bi bi-calculator" style="font-size: 57px; width: 57px; height: 57px;"></i>
                </div>
            </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                <div class="card-body">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div style="margin-bottom: 40px;"> 
                    <h5 class="card-text">Total Transaksi Gagal</h5>
                    <h1 class="card-text fw-bold">300</h1>
                </div>
                <div style="color: #3621C2;">
                    <i class="bi bi-clipboard2-x" style="font-size: 57px; width: 57px; height: 57px;"></i>
                </div>
            </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background-color: #E1EFFA; color: #3621c2;">
                <div class="card-body">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div style="margin-bottom: 40px;"> 
                    <h5 class="card-text">Total Transaksi Berhasil</h5>
                    <h1 class="card-text fw-bold">50</h1>
                </div>
                <div style="color: #3621C2;">
                    <i class="bi bi-clipboard2-check" style="font-size: 57px; width: 57px; height: 57px;"></i>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
