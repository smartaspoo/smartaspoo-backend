@extends('portal_layout.templates')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
    }

    .page-title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 10px;
        font-family: 'Roboto', sans-serif;
    }

    .content-box {
        background-color: #f0f0f0;
        padding: 20px;
        border-radius: 10px;
        display: flex;
        align-items: flex-start;
    }

    .form-container {
        flex: 1;
        padding-right: 20px;
    }

    .profile-box {
        flex: 1;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        text-align: center;
        position: relative;
        max-width: 280px;
    }

    .profile-image {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 0 auto;
        object-fit: cover;
    }

    .change-image {
        font-size: 12px;
        color: #333;
        cursor: pointer;
        margin-top: 10px;
        /* Mengurangi jarak atas */
    }

    .save-button {
        background-color: #E1B587;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .save-button:hover {
        background-color: #FBF7EB;
    }

    .upload-button {
        background-color: #E1B587;
        color: #fff;
        border: none;
        padding: 5px 10px;
        /* Mengurangi ukuran tombol Pilih Gambar */
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .upload-button:hover {
        background-color: #FBF7EB;
    }
</style>
<div class="container mt-5" id="container">
    <div class="page-title">Profile Pengguna</div>
    <form method="POST" action="{{ url('/p/profile') }}" enctype="multipart/form-data">

        <div class="content-box">
            <div class="form-container">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" value="{{@$user->username}}" id="username" name="username" placeholder="Username">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" value="{{@$user->name}}" id="nama" name="nama" placeholder="Nama">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{@$user->email}}" id="email" name="email" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="nomorTelepon" class="form-label">Nomor Telepon</label>
                    <input type="tel" class="form-control" value="{{@$data->telepon}}" id="nomorTelepon" name="telepon" placeholder="Nomor Telepon">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Provinsi</label>
                    <select class="form-select custom-select" id="provinsi" name="provinsi">
                        <option value="{{@$data->provinsi}}" selected>{{ @$data->provinsi}}</option>
                        @foreach ($asal['provinsi'] as $provinsi)
                        <option value="{{ $provinsi->name }}">{{ $provinsi->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Kota</label>
                    <select class="form-select custom-select" id="kota" name="kota">
                    <option value="{{@$data->kota}}" selected>{{@$data->kota}}</option>
                        @foreach ($asal['kota'] as $kota)
                        <option value="{{ $kota->name }}">{{ $kota->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Kecamatan</label>
                    <select class="form-select custom-select" id="kecamatan" name="kecamatan">
                    <option value="{{@$data->kecamatan}}" selected>{{@$data->kecamatan}}</option>
                    {{-- @foreach ($asal['kecamatan'] as $kecamatan)
                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->name}}</option>
                    @endforeach --}}
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Kelurahan</label>
                    <select class="form-select custom-select" id="kelurahan" name="kelurahan">
                    <option value="{{@$data->kelurahan}}" selected>{{@$data->kelurahan}}</option>
                    {{-- @foreach ($asal['kelurahan'] as $kelurahan)
                    <option value="{{ $kelurahan->id }}">{{ $kelurahan->name}}</option>
                    @endforeach --}}
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" value="{{@$data->alamat}}" id="alamat" name="alamat" rows="3" placeholder="Alamat"></textarea>
                </div>
                <div class="mb-3">
                    <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" value="{{@$data->tanggal_lahir}}" id="tanggalLahir" name="tanggal_lahir">
                </div>
                <div class="mb-3">
                    <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select custom-select" id="jenisKelamin" name="jenis_kelamin">
                    <option value="{{@$data->jenis_kelamin}}" selected>{{@$data->jenis_kelamin}}</option>
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3 text-end">
                    <button type="submit" class="save-button">Simpan</button>
                </div>
            </div>
            <div class="profile-box">
                <?php 
                    if(@$data->foto_readable == null){
                        $foto = url('/img/portal/user-icon.png');
                    }else{
                        $foto = @$data->foto_readable;
                    }
                ?>
                <img id="previewImage" src="{{$foto}}" alt="Profile Picture" class="profile-image">
                <div class="change-image">
                    <label for="uploadImage" class="upload-button">Pilih Gambar</label>
                    <input type="file" name="foto" id="uploadImage" style="display: none" accept="image/*" max-size="1000000">
                </div>
            </div>
        </div>
    </form>

</div>
<script>
    createApp({
        data() {
            return {

            }
        },
        async created() {},
        methods: {

        },
    }).mount("#container")
</script>
@endsection