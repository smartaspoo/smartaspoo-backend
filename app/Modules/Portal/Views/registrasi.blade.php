@extends('layout.index')
@section('content')

<style>
    /* Add the Poppins font */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
    body {
        font-family: 'Poppins';
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .card-plain {
            margin: 50px 0 0 0;
        }

        .col-md-6 {
            margin-top: 15px; 
        }

        img {
            max-width: 100%;
            height: auto; 
        }
    }
</style>

<main id="registrasi-page" class="main-content mt-0" style="background: #FBD9C0;">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div style="display: flex; justify-content: center;">
                        <div class="card card-plain" style="max-width: 1100px; border-radius: 30px; margin: 92px 0 92px 15px;">
                            <div class="row">
                                <div class="col-md-12" style="text-align: center; margin-top: 20px;">
                                    <img src="../img/portal/logo.png" width="160" height="100"/>
                                </div>
                                <div class="col-md-6" style="display: flex; align-items: center; justify-content: center; margin-top: 20px;">
                                    <div style="text-align: center;">
                                        <img src="{{URL::asset('/img/portal/registrasi_logo.png')}}" width="520" height="600"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div style="padding: 20px;">
                                        <h1 style="text-align: center; font-weight: bold; color: rgba(0, 0, 0, 0.90); ">Register</h1>
                                        <form role="form" style="border-radius: 10px; padding: 20px; background-color: #fff;">
                                            <div class="mb-3">
                                                <input v-model="username" type="email" class="form-control form-control-lg" id="email" placeholder="Email" aria-label="Email" style="border-radius: 15px;  font-size: 1px;">
                                            </div>
                                            <div class="mb-3">
                                                <input v-model="password" type="password" class="form-control form-control-lg" id="password" placeholder="Password" aria-label="Password" style="border-radius: 15px; font-size: 1px;">
                                            </div>
                                            <div class="mb-3">
                                                <input v-model="nama" type="text" class="form-control form-control-lg" id="nama" placeholder="Nama" aria-label="Nama" style="border-radius: 15px; font-size: 16px;">
                                            </div>
                                            <div class="mb-3">
                                                <input v-model="tanggal_lahir" type="date" class="form-control form-control-lg" id="tanggal_lahir" placeholder="Tanggal Lahir" aria-label="Tanggal Lahir" style="border-radius: 15px; font-size: 1px;">
                                            </div>
                                            <div class="mb-3">
                                                <input v-model="alamat" type="text" class="form-control form-control-lg" id="alamat" placeholder="Alamat" aria-label="Alamat" style="border-radius: 15px; font-size: 1px;">
                                            </div>
                                            <div class="mb-3">
                                                <select v-model="role" id="role" class="form-select form-control-lg" style="border-radius: 15px; font-size: 16px; width: 100%;">
                                                    <option value="mitra">Mitra</option>
                                                    <option value="umkm">Umkm</option>
                                                    <option value="konsumen" selected>Konsumen</option>
                                                </select>
                                            </div>
                                            <div class="mb-3" v-if="role !== 'konsumen'">
                                                <input v-model="provinsi" type="text" class="form-control form-control-lg" id="provinsi" placeholder="Provinsi" aria-label="Provinsi" style="border-radius: 15px; font-size: 1px;">
                                            </div>
                                            <div class="mb-3" v-if="role !== 'konsumen'">
                                                <input v-model="kota" type="text" class="form-control form-control-lg" id="kota" placeholder="Kota" aria-label="Kota" style="border-radius: 15px; font-size: 1px;">
                                            </div>
                                            <div class="mb-3" v-if="role !== 'konsumen'">
                                                <input v-model="kabupaten" type="text" class="form-control form-control-lg" id="kabupaten" placeholder="Kabupaten" aria-label="Kabupaten" style="border-radius: 15px; font-size: 1px;">
                                            </div>
                                            <div class="mb-3" v-if="role !== 'konsumen'">
                                                <input v-model="kecamatan" type="text" class="form-control form-control-lg" id="kecamatan" placeholder="Kecamatan" aria-label="Kecamatan" style="border-radius: 15px; font-size: 1px;">
                                            </div>
                                            <div class="text-center">
                                                <button @click="register" type="button" class="btn btn-lg w-100 mt-4 mb-0" style="background-color: #606C5D; color: white; font-weight: bold; border-radius: 15px;">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    createApp({
        data() {
            return {
            username: '',
            password: '',
            nama: '',
            tanggal_lahir: '',
            alamat: '',
            role: 'konsumen',
            provinsi: '',
            kota: '',
            kabupaten: '',
            kecamatan: '',
            };
        },
        methods: {
            async register() {
                try {
                    showLoading();
                    const { username, password, nama, tanggal_lahir, alamat, role, provinsi, kota, kabupaten, kecamatan } = this;
                    const response = await httpClient.post('/p/registrasi', {
                        username,
                        password,
                        nama,
                        tanggal_lahir,
                        alamat,
                        role,
                        provinsi,
                        kota,
                        kabupaten,
                        kecamatan
                    });
                    showToast({
                        message: 'User berhasil ditambahkan',
                        type: 'success'
                    });
                    location.href = '/p/login';
                    } catch (err) {
                        hideLoading();
                        showToast({
                            message: err.message,
                            type: 'warning'
                        });
                }
            }
    },
    }).mount('#registrasi-page');
</script>
@endsection