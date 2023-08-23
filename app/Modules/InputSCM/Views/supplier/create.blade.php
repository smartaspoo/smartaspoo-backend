@extends('dashboard_layout.index')
@section('content')
    <div class="page-inner">
        <div id="add-input-scm" class="card">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Tambah Bahan Baku Barang {!! $barang->nama !!}</h4>
                </div>
            </div>
            <div class="card-body">
                <form ref="supplier_scm_form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Nama Supplier</label>
                                <input v-model="supplier_scm.nama" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Alamat</label>
                                <input v-model="supplier_scm.alamat" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Kontak Supplier</label>
                                <input v-model="supplier_scm.kontak" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Lama Berlangganan</label>
                                <select v-model="lama_langganan" class="form-control">
                                    <option :value="Kurang dari 1 tahun">Kurang dari 1 tahun</option>
                                    <option :value="1 - 5 tahun">1 - 5 tahun</option>
                                    <option :value="Lebih dari 5 tahun">Lebih dari 5 tahun</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Alasan Berlangganan</label>
                                <input v-model="supplier_scm.alasan" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Catatan</label>
                                <input v-model="supplier_scm.catatan" class="form-control" type="text">
                            </div>
                        </div>
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
                    supplier_scm: {

                    },


                }
            },

            methods: {
                back() {
                    history.back()
                },
                resetForm() {
                    this.supplier_scm = {}
                    this.$refs.supplier_scm_form.reset()
                },


                async store() {
                    try {
                        showLoading()
                        const response = await httpClient.post("{!! url($urlnow) !!}", this
                            .supplier_scm)
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
                'vue-multiselect': VueformMultiselect,
                ...commonComponentMap(
                    [
                        'DefaultDatatable',
                    ]
                )
            },
        }).mount("#add-input-scm")
    </script>
@endsection
