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
<div class="container mt-5" id="profile">
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
                    {{-- <label for="alamat" class="form-label">Provinsi</label>
                    <select class="form-select custom-select" id="provinsi" name="provinsi">
                        <option value="{{@$data->provinsi}}" selected>{{ @$data->provinsi}}</option>
                        @foreach ($asal['provinsi'] as $provinsi)
                        <option value="{{ $provinsi->name }}">{{ $provinsi->name}}</option>
                        @endforeach
                    </select> --}}
                    <label class="form-control-label">Provinsi</label>
                    <vue-multiselect v-model="profile.provinsi" :searchable="true"
                        :options="provinsi_list" />
                </div>
                <div class="mb-3">
                    {{-- <label for="alamat" class="form-label">Kota</label>
                    <select class="form-select custom-select" id="kota" name="kota">
                    <option value="{{@$data->kota}}" selected>{{@$data->kota}}</option>
                        @foreach ($asal['kota'] as $kota)
                        <option value="{{ $kota->name }}">{{ $kota->name}}</option>
                        @endforeach
                    </select> --}}
                    <div class="form-group">
                        <label class="form-control-label">Kota</label>
                        <vue-multiselect name="kota" v-model="profile.kota" :searchable="true" :options="kota_list" />
                        <input type="hidden" :value="profile.kota" name="kota">
                    </div>
                </div>
                <div class="mb-3">
                    {{-- <label for="alamat" class="form-label">Kecamatan</label>
                    <select class="form-select custom-select" id="kecamatan" name="kecamatan">
                    <option value="{{@$data->kecamatan}}" selected>{{@$data->kecamatan}}</option>
                    @foreach ($asal['kecamatan'] as $kecamatan)
                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->name}}</option>
                    @endforeach
                    </select> --}}
                    <label class="form-control-label">Kecamatan</label>
                    <vue-multiselect name="kecamatan" v-model="profile.kecamatan" :searchable="true"
                        :options="kecamatan_list" />
                </div>
                <div class="mb-3">
                    {{-- <label for="alamat" class="form-label">Kelurahan</label>
                    <select class="form-select custom-select" id="kelurahan" name="kelurahan">
                    <option value="{{@$data->kelurahan}}" selected>{{@$data->kelurahan}}</option>
                    @foreach ($asal['kelurahan'] as $kelurahan)
                    <option value="{{ $kelurahan->id }}">{{ $kelurahan->name}}</option>
                    @endforeach
                    </select> --}}
                    <label class="form-control-label">Kelurahan</label>
                    <vue-multiselect v-model="profile.kelurahan" :searchable="true"
                        :options="kelurahan_list" />
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
    Vue.createApp({
        data() {
            return {
                profile: {
                    provinsi: null,
                    kecamatan: null,
                    kota: null,
                    kelurahan: null,
                },
                provinsi_list: [],
                kota_list: [],
                kecamatan_list: [],
                kelurahan_list: [],
                transaksi_list : [{
                        value: "1",
                        label: "Ya"
                    },
                    {
                        value: "0",
                        label: "Tidak"
                    },],
                jumlah_karyawan_list: [{
                        value: "0>10",
                        label: "Lebih dari 10"
                    },
                    {
                        value: "11>50",
                        label: "11 sampai 50"
                    },
                    {
                        value: ">51",
                        label: "Lebih dari 51"
                    },

                ],
                jenis_ijin_usaha_list: [{
                        value: "BELUM_BERIJIN",
                        label: "Belum Berijin"
                    },
                    {
                        value: "CV",
                        label: "CV"
                    },
                    {
                        value: "PERSEORANGAN",
                        label: "Perseorangan"
                    },
                    {
                        value: "PT",
                        label: "PT"
                    },
                    {
                        value: "UD",
                        label: "UD"
                    },
                    {
                        value: "LAINNYA",
                        label: "Lainnya"
                    },
                ],
                omset_per_bulan_list: [{
                        value: "<10jt",
                        label: "Kurang dari 10 juta"
                    },
                    {
                        value: "10-50jt",
                        label: "10 sampai 50 juta"
                    },
                    {
                        value: "50-150jt",
                        label: "50 sampai 150 juta"
                    },
                    {
                        value: ">150jt",
                        label: "Lebih dari 150 juta"
                    },
                ],
                permodalan_list: [{
                        value: "PRIBADI",
                        label: "Pribadi"
                    },
                    {
                        value: "PERBANKAN",
                        label: "Perbankan"
                    },
                    {
                        value: "LAINNYA",
                        label: "Lainnya"
                    },
                ],
                kategori_usaha_list: [{
                        value: "USAHA_KELUARGA",
                        label: "Usaha Keluarga"
                    },
                    {
                        value: "RINTISAN",
                        label: "Rintisan"
                    },
                    {
                        value: "LAINNYA",
                        label: "Lainnya"
                    },
                ],
            }
        },
        created() {
            this.fetchProvinsiList()

        },
        watch: {
            "profile.jenis_ijin_usaha": {
                handler: function(value) {
                    this.switcher.jenis_ijin_usaha = this.profile.jenis_ijin_usaha === "LAINNYA";
                }
            },
            "profile.permodalan": {
                handler: function(value) {
                    this.switcher.permodalan = this.profile.permodalan === "LAINNYA";
                }
            },
            "profile.kategori_usaha": {
                handler: function(value) {
                    this.switcher.kategori_usaha = this.profile.kategori_usaha === "LAINNYA";
                }
            },
            "profile.provinsi": {
                handler: function(value) {
                    this.fetchKotaList(this.profile.provinsi)
                }
            },
            "profile.kota": {
                handler: function(value) {
                    this.fetchKecamatanList(this.profile.kota)
                }
            },
            "profile.kecamatan": {
                handler: function(value) {
                    this.fetchKelurahanList(this.profile.kecamatan)
                }
            },
        },
        methods: {
            handleFileChange(event) {
                this.profile.voice_file = event.target.files[0];
                console.log(this.profile.voice_file,event.target.files)
            },
            async fetchKotaList(id_provinsi) {
                const response = await httpClient.get("{!! url('input-scm/alamat/kota') !!}/" + id_provinsi)
                this.kota_list = [
                    ...this.kota_list,
                    ...response.data.result.map(el => {
                        return {
                            value: el.id,
                            label: el.name
                        }
                    })
                ]
            },
            async fetchKecamatanList(data) {
                const response = await httpClient.get("{!! url('input-scm/alamat/kecamatan') !!}/" + data)
                this.kecamatan_list = [
                    ...this.kecamatan_list,
                    ...response.data.result.map(el => {
                        return {
                            value: el.id,
                            label: el.name
                        }
                    })
                ]
            },
            async fetchKelurahanList(data) {
                const response = await httpClient.get("{!! url('input-scm/alamat/kelurahan') !!}/" + data)
                this.kelurahan_list = [
                    ...this.kelurahan_list,
                    ...response.data.result.map(el => {
                        return {
                            value: el.id,
                            label: el.name
                        }
                    })
                ]
            },
            async fetchProvinsiList() {
                const response = await httpClient.get("{!! url('input-scm/alamat/provinsi') !!}")
                this.provinsi_list = [
                    ...this.provinsi_list,
                    ...response.data.result.map(el => {
                        return {
                            value: el.id,
                            label: el.name
                        }
                    })
                ]
            },
            back() {
                history.back()
            },
            resetForm() {
                this.profile = {}
                this.$refs.profile_form.reset()
            },
            async store() {
                const profile_form_data = new FormData()
                Object.keys(this.profile).forEach(key => {
                    profile_form_data.append(key, this.profile[key])
                });

                try {
                    showLoading()
                    const response = await httpClient.post("{!! url('input-scm') !!}", profile_form_data)
                    hideLoading()
                    showToast({
                        message: "Data berhasil ditambahkan"
                    })
                    this.resetForm()
                } catch (err) {
                    hideLoading()
                    showToast({
                        message: err.message,
                        type: 'error'
                    })
                }
            }
        },
        components: {
            'vue-multiselect': VueformMultiselect
        },
    }).mount("#profile")
</script>
@endsection