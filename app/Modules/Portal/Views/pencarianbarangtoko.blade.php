@extends("portal_layout.templates")
@section("content")
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
            border-radius: 25px;
            width:  490px; 
            height: 230px; 
        }
        
       
    </style>
</head>
<body>
    <div class="container custom-margin"> 
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ url('/p/pencarianbarangumkm') }}" class="nav-link active" aria-disabled="true" style="font-size: 28px; color:#000"><i class="bi bi-shop-window" ></i>PRODUK</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/p/pencarianbarangtoko') }}" class="nav-link active" aria-current="page" style="font-size: 28px; color:#000; text-decoration: underline;" >TOKO</a>
            </li>
        </ul>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3 mb-3 mb-sm-0 custom-card"> 
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-start">
                    <div>
                        <img src="{{URL::asset('/img/portal/produk.png')}}" style="max-width: 100px" >
                    </div>
                    <div class="text-end">
                        <p class="card-text" style="margin-right: 160px; margin-bottom: 5px; color: #000; font-size: 24px;">Lunpia Modern</p>
                        <p class="card-text" style="margin-right: 240px; margin-bottom: 5px; color: #757272; font-size: 20px;">Semarang</p>
                        <p class="card-text" style="margin-right: 280px;"><span style="color: gold;">&#9733; &#9733; &#9733; &#9733;</span></p>
                        <a href="#" class="btn" style="margin-right: 10px; background-color: #D9D9D9; color: #000; font-size: 20px; font-style: normal; font-weight: 600;  border-radius: 10px;">Lihat Toko</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-3 mb-sm-0 custom-card" style="margin-left: 185px;"> 
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-start">
                    <div>
                        <img src="{{URL::asset('/img/portal/produk.png')}}" style="max-width: 100px" >
                    </div>
                    <div class="text-end">
                        <p class="card-text" style="margin-right: 160px; margin-bottom: 5px; color: #000; font-size: 24px;">Lunpia Modern</p>
                        <p class="card-text" style="margin-right: 240px; margin-bottom: 5px; color: #757272; font-size: 20px;">Semarang</p>
                        <p class="card-text" style="margin-right: 280px;"><span style="color: gold;">&#9733; &#9733; &#9733; &#9733;</span></p>
                        <a href="#" class="btn" style="margin-right: 10px; background-color: #D9D9D9; color: #000; font-size: 20px; font-style: normal; font-weight: 600;  border-radius: 10px;">Lihat Toko</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
