<?php $hideHeaderFooter = true; ?>
@extends('portal_layout.templates')
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
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Nama</label>
                                                        <input type="text" class="form-control" v-model="user.nama">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input type="text" class="form-control" v-model="user.email">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Password</label>
                                                        <input type="password" class="form-control" v-model="user.password">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Tanggal Lahir</label>
                                                        <input type="text" class="form-control" v-model="user.tanggal_lahir">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Alamat</label>
                                                        <input type="text" class="form-control" v-model="user.alamat">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Role</label>
                                                        <select v-model="user.role" class="form-control"></select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" v-if="showDetails">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Kecamatan</label>
                                                                <select v-model="user.kecamatan_id" class="form-control"></select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Kelurahan</label>
                                                                <select v-model="user.kelurahan_id" class="form-control"></select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Kelurahan</label>
                                                                <select v-model="user.kelurahan_id" class="form-control"></select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
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
                    showDetails : true,
                    user : {

                    }
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
                        if (response.code == "SUCCESS") {
                            showToast({
                                message: 'User berhasil ditambahkan',
                                type: 'success'
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
