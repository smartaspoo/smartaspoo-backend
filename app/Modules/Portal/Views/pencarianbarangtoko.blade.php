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
                    <a href="{{ url('/p/pencarianbarangumkm') }}" class="nav-link active" aria-disabled="true"
                        style="font-size: 28px; color:#000"><i class="bi bi-archive"></i><span
                            style="margin-left: 8px;"></i>PRODUK</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/p/pencarianbarangtoko') }}" class="nav-link active" aria-current="page"
                        style="font-size: 28px; color:#000; text-decoration: underline;"><i class="bi bi-shop-window"></i><span
                            style="margin-left: 8px;">TOKO</span></a>
                </li>
            </ul>
        </div>
        <br>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col col-md-2 offset-md-2">
                <div class="card mx-auto"> 
                    <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Produk 1">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col col-md-2"> 
                <div class="card mx-auto">
                    <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Produk 1">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a short card.</p>
                    </div>
                </div>
            </div>
            <div class="col col-md-2">
            <div class="card mx-auto">
                <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Produk 1">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content.</p>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card">
                <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Produk 1">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content.</p>
                </div>
            </div>
            </div>
        </div>
@endsection
