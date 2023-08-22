@extends('dashboard_layout.index')
@section('content')
    <div class="page-inner">
        <div id="add-input-scm" class="card">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Tambah UMKM</h4>
                </div>
            </div>
            <div class="card-body">
                <form ref="input_scm_form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Tahun Berdiri</label>
                                <input v-model="input_scm.tahun_berdiri" class="form-control" type="number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Provinsi</label>
                                <vue-multiselect v-model="input_scm.provinsi" :searchable="true"
                                    :options="provinsi_list" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Kota</label>
                                <vue-multiselect v-model="input_scm.kota" :searchable="true" :options="kota_list" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Kecamatan</label>
                                <vue-multiselect v-model="input_scm.kecamatan" :searchable="true"
                                    :options="kecamatan_list" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Kelurahan</label>
                                <vue-multiselect v-model="input_scm.kelurahan" :searchable="true"
                                    :options="kelurahan_list" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Alamat</label>
                                <input v-model="input_scm.alamat" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Jumlah Karyawan</label>
                                <vue-multiselect v-model="input_scm.jumlah_karyawan" :searchable="true"
                                    :options="jumlah_karyawan_list" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Jenis Ijin Usaha</label>
                                <vue-multiselect v-model="input_scm.jenis_ijin_usaha" :searchable="true"
                                    :options="jenis_ijin_usaha_list" />
                                <input v-model="input_scm.ket_jenis_ijin" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Omset Per Bulan</label>
                                <vue-multiselect v-model="input_scm.omset_per_bulan" :searchable="true"
                                    :options="omset_per_bulan_list" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Permodalan</label>
                                <vue-multiselect v-model="input_scm.permodalan" :searchable="true"
                                    :options="permodalan_list" />
                                <input v-model="input_scm.ket_permodalan" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Legalitas</label>
                                <input v-model="input_scm.legalitas" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Kategori Usaha</label>
                                <vue-multiselect v-model="input_scm.ket_kategori_usaha" :searchable="true"
                                    :options="ket_kategori_usaha_list" />
                                <input v-model="input_scm.ket_ket_kategori_usaha" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Transaksi Lokal</label>
                                <input v-model="input_scm.transaksi_lokal" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Transaksi Titipan</label>
                                <input v-model="input_scm.transaksi_titipan" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Area Penjualan</label>
                                <input v-model="input_scm.area_penjualan" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Jumlah Gerai</label>
                                <input v-model="input_scm.jumlah_gerai" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Keterangan Voice Text</label>
                                <textarea class="form-control" rows="10" v-model="input_scm.voice_text" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Rekaman Wawancara</label>
                                <input v-model="input_scm.voice_file" class="form-control" type="file">
                            </div>
                        </div>

                        {{-- End Form --}}
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" @click="back" class="btn btn-sm bg-warning mr-2 text-white">
                            Cancel
                        </button>
                        <button type="button" @click="store" class="btn btn-sm bg-primary mr-2 text-white">
                            Save Data
                        </button>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
    <script>
        Vue.createApp({
            data() {
                return {
                    input_scm: {
                        provinsi: null,
                        kecamatan: null,
                        kota: null,
                        kelurahan: null,
                    },
                    provinsi_list: [],
                    kota_list: [],
                    kecamatan_list: [],
                    kelurahan_list: [],
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
                    jenis_ijin_usaha: [{
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
                            value: "LAINNYA",
                            label: "Lainnya"
                        },
                        {
                            value: "PT",
                            label: "PT"
                        },
                        {
                            value: "UD",
                            label: "UD"
                        },
                    ],
                }
            },
            created() {
                this.fetchProvinsiList()

            },
            watch: {
                "input_scm.provinsi": {
                    handler: function(value) {
                        this.fetchKotaList(this.input_scm.provinsi)
                    }
                },
                "input_scm.kota": {
                    handler: function(value) {
                        this.fetchKecamatanList(this.input_scm.kota)
                    }
                },
                "input_scm.kecamatan": {
                    handler: function(value) {
                        this.fetchKelurahanList(this.input_scm.kecamatan)
                    }
                },
            },
            methods: {
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
                    this.input_scm = {}
                    this.$refs.input_scm_form.reset()
                },
                async store() {
                    try {
                        showLoading()
                        const response = await httpClient.post("{!! url('input-scm') !!}", this.input_scm)
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
        }).mount("#add-input-scm")
    </script>
@endsection
