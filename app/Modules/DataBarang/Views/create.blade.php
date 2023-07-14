@extends('dashboard_layout.index')
@section('content')
<div class="page-inner">
    <div id="add-data-barang" class="card">
        <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Tambah DataBarang</h4>
            </div>
        </div>
        <div class="card-body">
            <form ref="data_barang_form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Kode Barang</label>
                            <input v-model="barang.kode_barang" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Nama Barang</label>
                            <input v-model="barang.nama_barang" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Harga Jual</label>
                            <input v-model="barang.harga_barang_jual" class="form-control" type="number">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Harga Beli</label>
                            <input v-model="barang.harga_barang_beli" class="form-control" type="number">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Stok</label>
                            <input v-model="barang.stock_global" class="form-control" type="number">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Satuan</label>
                                <vue-multiselect v-model="satuan_id" :searchable="true" :options="satuan_list" />
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
                barang: {
          
                },
                satuan_list : [],
                satuan_id : null,
                path: null,
                name : null,

           
            }
        },
        created(){
            this.fetchSatuanList()
        },
        watch : {
            satuan_id(value) {
                    let satuan_data = this.satuan_list.find(satuan_item => satuan_item.value == value)
                    this.path = `${satuan_data.label.toLowerCase().split(" ").join("-")}`
                    if (this.name != null && this.name != "") {
                        this.path += `/${this.name.toLowerCase().split(" ").join("-")}`
                    }
                },
        },
        methods: {
            async fetchSatuanList(){
                const response = await httpClient.get("{!! url('satuan/all') !!}")
                    this.satuan_list = [
                        ...this.satuan_list,
                        ...response.data.result.map(el => {
                            return {
                                value: el.id,
                                label: el.satuan_nama
                            }
                        })
                    ]
            },
            back() {
                history.back()
            },
            resetForm(){
                this.data_barang = {
              }
                this.$refs.data_barang_form.reset()
            },
            async store() {
                try {
                    showLoading()
                    const response = await httpClient.post("{!! url('data-barang') !!}", this.data_barang)
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
    }).mount("#add-data-barang")
</script>
@endsection