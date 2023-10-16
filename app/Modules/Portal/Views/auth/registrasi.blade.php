@extends('portal_layout.templates')
@section('content')
@php
$hideHeaderFooter = true; // Atur nilai $hideHeaderFooter menjadi true
@endphp
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
                            <div class="card card-plain"
                                style="max-width: 1100px; border-radius: 30px; margin: 92px 0 92px 15px;">
                                <div class="row">
                                    <div class="col-md-12" style="text-align: center; margin-top: 20px;">
                                        <img src="../img/portal/logo.png" width="160" height="100" />
                                    </div>
                                    <div class="col-md-6"
                                        style="display: flex; align-items: center; justify-content: center; margin-top: 20px;">
                                        <div style="text-align: center;">
                                            <img src="{{ URL::asset('/img/portal/registrasi_logo.png') }}" width="520"
                                                height="600" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div style="padding: 20px;">
                                            <h1 style="text-align: center; font-weight: bold; color: rgba(0, 0, 0, 0.90); ">
                                                Register</h1>
                                            <form role_id="form"
                                                style="border-radius: 10px; padding: 20px; background-color: #fff;">
                                                <div class="mb-3">
                                                    <input v-model="email" type="email"
                                                        class="form-control form-control-lg" id="email"
                                                        placeholder="Email" aria-label="Email"
                                                        style="border-radius: 15px;  font-size: 1px;">
                                                </div>
                                                <div class="mb-3">
                                                    <input v-model="password" type="password"
                                                        class="form-control form-control-lg" id="password"
                                                        placeholder="Password" aria-label="Password"
                                                        style="border-radius: 15px; font-size: 1px;">
                                                </div>
                                                <div class="mb-3">
                                                    <input v-model="nama" type="text"
                                                        class="form-control form-control-lg" id="nama"
                                                        placeholder="Nama" aria-label="Nama"
                                                        style="border-radius: 15px; font-size: 16px;">
                                                </div>
                                                <div class="mb-3">
                                                    <input v-model="tanggal_lahir" type="date"
                                                        class="form-control form-control-lg" id="tanggal_lahir"
                                                        placeholder="Tanggal Lahir" aria-label="Tanggal Lahir"
                                                        style="border-radius: 15px; font-size: 1px;">
                                                </div>
                                                <div class="mb-3">
                                                    <input v-model="alamat" type="text"
                                                        class="form-control form-control-lg" id="alamat"
                                                        placeholder="Alamat" aria-label="Alamat"
                                                        style="border-radius: 15px; font-size: 1px;">
                                                </div>
                                                <div class="mb-3">
                                                    <select v-model="role_id" id="role_id" class="form-select form-control-lg" aria-label="Default select example"
                                                    style="border-radius: 15px; font-size: 16px; width: 100%;">
                                                        <option selected value="2">Konsumen</option>
                                                        <option value="3">Umkm</option>
                                                        <option value="4">Mitra</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3" v-if="role_id !== '2'">
                                                    <input v-model="provinsi_id" type="text"
                                                        class="form-control form-control-lg" id="provinsi_id"
                                                        placeholder="Masukkan asal provinsi" aria-label="Provinsi_id"
                                                        style="border-radius: 15px; font-size: 1px;">
                                                </div>
                                                <div class="mb-3" v-if="role_id !== '2'">
                                                    <input v-model="kota_id" type="text"
                                                        class="form-control form-control-lg" id="kota_id"
                                                        placeholder="Masukkan asal kota" aria-label="kota_id"
                                                        style="border-radius: 15px; font-size: 1px;">
                                                </div>
                                                <div class="mb-3" v-if="role_id !== '2'">
                                                    <input v-model="kecamatan_id" type="text"
                                                        class="form-control form-control-lg" id="kecamatan_id"
                                                        placeholder="Masukkan asal kecamatan" aria-label="kecamatan_id"
                                                        style="border-radius: 15px; font-size: 1px;">
                                                </div>
                                                <div class="mb-3" v-if="role_id !== '2'">
                                                    <input v-model="kelurahan_id" type="text"
                                                        class="form-control form-control-lg" id="kelurahan_id"
                                                        placeholder="Masukkan asal kelurahan" aria-label="kelurahan_id"
                                                        style="border-radius: 15px; font-size: 1px;">
                                                </div>
                                                <div class="text-center">
                                                    <button @click="register" type="button"
                                                        class="btn btn-lg w-100 mt-4 mb-0"
                                                        style="background-color: #606C5D; color: white; font-weight: bold; border-radius: 15px;">Register</button>
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
                    email: '',
                    password: '',
                    nama: '',
                    tanggal_lahir: '',
                    alamat: '',
                    role_id: '2',
                    provinsi_id: '',
                    kota_id: '',
                    kelurahan_id: '',
                    kecamatan_id: '',
                };
            },
            methods: {
                async register() {
                    try {
                        showLoading();
                        const {
                            email,
                            password,
                            nama,
                            tanggal_lahir,
                            alamat,
                            role_id,
                            provinsi_id,
                            kota_id,
                            kelurahan_id,
                            kecamatan_id
                        } = this;
                        const response = await httpClient.post('/p/registrasi', {
                            email,
                            password,
                            nama,
                            tanggal_lahir,
                            alamat,
                            role_id,
                            provinsi_id,
                            kota_id,
                            kelurahan_id,
                            kecamatan_id
                        });
                        if (response.data.code == "SUCCESS") {
                            showToast({
                                message: "User berhasil ditambahkan"
                            });
                            location.href = '/p/login';
                        }
                        hideLoading();
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
