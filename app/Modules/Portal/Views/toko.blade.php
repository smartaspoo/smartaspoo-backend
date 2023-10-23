@extends("portal_layout.templates")
@section("content")
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f4f4;
    }

    .margin-up {
        margin-top: 30px;
    }

    .store-info {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .store-logo {
        max-width: 100px;
        margin-bottom: 10px;
        cursor: pointer;
    }

    .store-details {
        flex-grow: 1;
    }

    .store-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .store-activity {
        color: #9b9b9b;
    }

    .store-follow {
        font-size: 16px;
        font-weight: bold;
    }

    .store-follow-count {
        font-size: 14px;
        color: #9b9b9b;
    }

    .store-follow-divider {
        border-right: 2px solid #9b9b9b;
        margin: 0 10px;
    }

    .action-buttons {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 20px;
    }

    .action-button {
        padding: 8px 16px;
        text-align: center;
        color: white;
        font-weight: bold;
        border-radius: 8px;
        cursor: pointer;
        margin: 5px;
    }

    .follow-button {
        background-color: #606C5D;
    }

    .chat-button,
    .share-button,
    .info-button {
        background-color: white;
        color: black;
        border: 2px solid black;
    }

    .info-button {
        font-size: 20px;
        padding: 6px 10px;
    }

    .tab-list {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
    }

    .tab {
        padding: 10px 20px;
        cursor: pointer;
        margin: 5px;
    }

    .active-tab {
        color: black;
        border-bottom: 2px solid blue;
    }

    .right-filter {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .urutkan {
        padding-top: 10px;
        padding-right: 10px;
        font-weight: #000;

    }

    .product-card-image {
        width: 75%;
    }

    .filter-dropdown {
        text-align: center;
        margin-bottom: 20px;
        width: 100%;
        max-width: 200px;
        border: 2px solid;

    }

    .product-image {
        max-width: 100%;
        height: auto;
    }

    .harga {
        color: var(--type-high-emphasis, #171520);
        font-size: 18.172px;
        font-style: normal;
        font-weight: 500;
        line-height: 22.715px;
        /* 125% */
    }

    .diskon {
        color: var(--type-high-emphasis, #171520);
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        line-height: 22.715px;
    }

    .lokasi {
        display: flex;
        width: 100%;
        height: 22.715px;
        flex-direction: column;
        justify-content: center;
        flex-shrink: 0;
    }

    .custom-initial {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    @media (min-width: 768px) {
        .store-info {
            flex-direction: row;
            text-align: left;
        }

        .store-logo {
            margin-bottom: 0;
            margin-right: 20px;
        }

        .action-buttons {
            justify-content: flex-start;
            margin-left: 0;
        }

        .tab-list {
            justify-content: flex-start;
        }

        .right-filter {
            justify-content: flex-end;
        }
    }
</style>
</head>

<body>
<div class="container margin-up">
    <div class="store-info">
        <a href="{{ url('/p/infotoko') }}">
            <img class="store-logo" src="{{ URL::asset('/img/portal/storelogo.png') }}" alt="Store Logo"
                data-bs-toggle="modal" data-bs-target="#logoModal">
        </a>
        <div class="store-details">
            <div class="store-title">{{ $toko->nama }}</div>
            <div class="store-activity">Toko telah aktif beberapa menit yang lalu</div>
            <div class="store-follow">
                {{ $toko->pengikut }} Pengikut
            </div>
        </div>
    </div>
    <div class="action-buttons mt-3">
        <div class="custom-initial">
            @if(Auth::check())
                @if(Auth::user()->isFollowing($toko->id))
                    <form action="{{ route('follow-toko', ['tokoId' => $toko->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="action-button unfollow-button mr-2">Unfollow</button>
                    </form>
                @else
                    <form action="{{ route('follow-toko', ['tokoId' => $toko->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="action-button follow-button mr-2">Follow</button>
                    </form>
                @endif
            @else
                <div class="action-button follow-button mr-2">
                    Follow
                </div>
            @endif
            <div class="action-button chat-button mr-2">Chat Penjual</div>
            <div class="action-button share-button mr-2"><i class="fa-solid fa-share-nodes"></i></div>
            <div class="action-button info-button"><i class="fas fa-store"></i></div>
        </div>
    </div>
</div>


        <div class="container">
            <div class="tab-list">
                <div id="tab-beranda" class="tab active-tab">Produk</div>
            </div>
            <div class="right-filter">
                <p class="urutkan">
                    Urutkan
                </p>
                <div class="filter-dropdown">
                    <select class="form-select" aria-label="Sort by">
                        <option selected>Terbaru</option>
                        <option value="1">Terpopuler</option>
                    </select>
                </div>
            </div>
        </div>
    <div class="container">
    <div class="row">
        <!-- Produk yang dijual oleh toko -->
        @foreach ($barang as $item)
<div class="col-md-3">
    <div class="card">
        <img class="card-img-top" src="{{ URL::asset($item->thumbnail) }}" alt="{{ $item->thumbnail }}">
        <div class="card-body">
            <h5 class="card-title">{{ $item->nama_barang }}</h5>
            <p class="card-text">Kategori: {{ $item->kategori }}</p>
            <p class="card-text">Rating: {{ $item->rating }} ({{ $item->ulasan }} ulasan)</p>
            <p class="card-text">Harga: Rp. {{ number_format($item->harga_umum - ($item->harga_umum * ($item->diskon / 100)), 0, ',', '.') }}</p>
            <div class="row">
                <div class="col-md-12">
                    <p class="card-text"><span class="badge badge-danger">-{{ $item->diskon }}%</span><s>Harga: Rp. {{ number_format($item->harga_umum, 0, ',', '.') }}</s></p>
                </div>
                <div class="col-md-12">
                    <p class="lokasi">Lokasi: {{ $toko->alamat }}</p>
                </div>
                <div class="col-md-12">
                    <a href="{{ url('/p/') }}/barang/{{ $item->id }}" class="btn btn-primary"><i class="fas fa-shopping-cart cart-icon"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const tabBeranda = document.getElementById('tab-beranda');
        const tabProduk = document.getElementById('tab-produk');

        tabBeranda.addEventListener('click', () => {
            tabBeranda.classList.add('active-tab');
            tabProduk.classList.remove('active-tab');
        });

        tabProduk.addEventListener('click', () => {
            tabBeranda.classList.remove('active-tab');
            tabProduk.classList.add('active-tab');
        });
            // Mendapatkan tombol "Follow" atau "Unfollow"
    var followButton = document.querySelector('.follow-button');
    var unfollowButton = document.querySelector('.unfollow-button');

    // Mendapatkan jumlah pengikut dari HTML
    var pengikutElement = document.querySelector('.store-follow');
    var pengikutCount = parseInt(pengikutElement.innerText);

    // Mengecek apakah pengguna telah mengikuti toko atau belum
    var isFollowing = @json(Auth::check() && Auth::user()->isFollowing($toko->id)); // Menggantikan dengan status yang sesuai

    // Mengatur tampilan awal berdasarkan status pengikut
    if (isFollowing) {
        unfollowButton.style.display = 'block';
        followButton.style.display = 'none';
    } else {
        unfollowButton.style.display = 'none';
        followButton.style.display = 'block';
    }

    // Mengatur event listener untuk tombol "Follow"
    followButton.addEventListener('click', function () {
        // Kirim permintaan AJAX ke server untuk mengikuti toko
        fetch("{{ route('follow-toko', ['tokoId' => $toko->id]) }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Anda mengikuti toko ini') {
                // Jika pengikutan berhasil, lakukan hal berikut:
                isFollowing = true;
                followButton.style.display = 'none';
                unfollowButton.style.display = 'block';
                pengikutCount++; // Tambah 1 pada jumlah pengikut
                pengikutElement.innerText = pengikutCount + ' Pengikut'; // Update tampilan jumlah pengikut
                window.location.href = "{{url()->current()}}"   
            }
        });
    });

    // Mengatur event listener untuk tombol "Unfollow"
    unfollowButton.addEventListener('click', function () {
        // Kirim permintaan AJAX ke server untuk berhenti mengikuti toko
        fetch("{{ route('follow-toko', ['tokoId' => $toko->id]) }}", {
            method: 'POST',
            headers: { 
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Anda berhenti mengikuti toko ini') {
                // Jika berhenti mengikuti berhasil, lakukan hal berikut:
                isFollowing = false;
                unfollowButton.style.display = 'none';
                followButton.style.display = 'block';
                pengikutCount--; // Kurangi 1 dari jumlah pengikut
                pengikutElement.innerText = pengikutCount + ' Pengikut'; // Update tampilan jumlah pengikut
                window.location.href = "{{url()->current()}}"   

            }
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endsection