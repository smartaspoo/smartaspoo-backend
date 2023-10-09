@extends("portal_layout.templates")
@section("content")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
        font-family: 'Poppins';
    }

    .custom-margin {
        margin-top: 121px;
        margin-bottom: 50px;
    }

    .custom-card {
        margin-left: 202px;
    }

    .card {
        height: 90%;
        width: 250px;

    }
</style>
</head>

<body>
    <div class="container custom-margin">
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ url()->current() }}?q={{$q}}&tipe=barang" class="nav-link active" aria-disabled="true"
                    style="font-size: 28px; color:#000"><i class="bi bi-archive"></i><span
                        style="margin-left: 8px;"></i>PRODUK</a>
            </li>
            <li class="nav-item">
                <a href="{{ url()->current() }}?q={{$q}}&tipe=toko" class="nav-link active" aria-current="page"
                    style="font-size: 28px; color:#000; text-decoration: underline;"><i
                        class="bi bi-shop-window"></i><span style="margin-left: 8px;">TOKO</span></a>
            </li>
        </ul>
    </div>
    <br>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($results as $users_toko)
        <div class="col col-md-4">
            <div class="card mx-auto">
                <img src="{{ URL::asset($users_toko->foto_toko) }}" alt="{{ $users_toko->nama_toko }}">
                <div class="card-body">
                    <h5 class="card-title">Nama Toko: {{ $users_toko->nama}}</h5>
                    <p class="card-text">Tautan: {{ $users_toko->tautan }}</p>
                    <p class="card-text">Lokasi: {{ $users_toko->user->kotaModel->name }}</p>
                    <a href="{{ url('/p/toko/' . $users_toko->id) }}">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
    @endsection