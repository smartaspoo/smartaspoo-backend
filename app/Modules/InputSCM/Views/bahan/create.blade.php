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
                <form ref="barang_scm_form">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label">Nama Barang</label>
                                <input v-model="barang_scm.nama" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label">Nama Merk</label>
                                <input v-model="barang_scm.merk" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label">Sifat Bahan Baku</label>
                                <vue-multiselect v-model="barang_scm.sifat_bahan" :searchable="true"
                                    :options="sifat_bahan_list" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">

                                <label class="form-control-label">Actions</label>
                                <button @click="handleSupplierButton()" type="button"
                                    class="btn btn-block btn-info ">Tambah
                                    Supplier</button>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <default-datatable title="Data Supplier" url="{!! url($urlnow) !!}" :headers="headers"
                                :can-add="false" :can-edit="false">

                            </default-datatable>
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
    <div ref="modal" class="modal fade" id="addSupplierModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg" id="add-supplier-scm">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Tambah Supplier</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
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
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-end">
                        <button type="button" @click="storeSupplier" class="btn btn-sm bg-primary mr-2 text-white">
                            Save Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        Vue.createApp({
            data() {
                return {
                    supplier_scm: {

                    },

                    barang_scm: {

                    },
                    sifat_bahan_list: [{
                            value: "MENTAH",
                            label: "Mentah"
                        },
                        {
                            value: "OLAHAN",
                            label: "Olahan"
                        },

                    ],
                    headers: [{
                            text: 'Nama Supplier',
                            value: 'nama',
                        },
                        {
                            text: 'Jenis Supplier',
                            value: 'jenis_supplier',
                        },
                    ],

                }
            },

            methods: {
                back() {
                    history.back()
                },
                resetForm() {
                    this.barang_scm = {}
                    this.$refs.barang_scm_form.reset()
                },
                resetFormSupplier() {
                    this.supplier_scm = {}
                    this.$refs.supplier_scm_form.reset()
                },
                async handleSupplierButton() {
                    $('#addSupplierModal').modal()
                },

                async store() {
                    try {
                        showLoading()
                        const response = await httpClient.post("{!! url($urlnow) !!}", this
                            .barang_scm)
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
