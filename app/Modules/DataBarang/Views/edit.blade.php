@extends('dashboard_layout.index')
@section('content')
<div class="page-inner">
    <div id="edit-data-barang" class="card">
        <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Tambah DataBarang</h4>
            </div>
        </div>
        <div class="card-body">
            <form ref="barang_form">
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
                                <vue-multiselect v-model="barang.satuan_id" :searchable="true" :options="satuan_list" />
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" @click="back" class="btn btn-sm bg-warning mr-2 text-white">
                        Cancel
                    </button>
                    <button type="button" @click="update" class="btn btn-sm bg-primary mr-2 text-white">
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
                    satuan_id : null,
                },
                satuan_list : [
                  
                ],
                path: null,
                name : null,
                satuan_id :null,
            }
        },
        computed : {
            satuan_id(){
                return this.barang.satuan_id
            }
        },
     
        watch : {
            satuan_id(value) {
                    let satuan_data = this.satuan_list.find(satuan_item => satuan_item.value == value)
                    this.path = `${satuan_data.label.toLowerCase().split(" ").join("-")}`
                    if (this.name != null && this.name != "") {
                        this.path += `/${this.name.toLowerCase().split(" ").join("-")}`
                    }
                    barang.satuan = value
                },
        },
        async created() {
            showLoading()
            await this.fetchSatuanList()
            await this.fetchData()
            hideLoading()

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
            async fetchData() {
                const response = await httpClient.get("{!! url('data-barang') !!}/{{ $barang_id }}")
                this.barang = response.data.result
                this.barang.satuan_id = response.data.result.satuan_id
                console.log(this.barang)
            },
            back() {
                history.back()
            },
            async update() {
                try {
                    showLoading()
                    const response = await httpClient.put("{!! url('data-barang') !!}/{{ $barang_id }}",
                        this.barang)
                    hideLoading()
                    showToast({
                        message: "Data berhasil disimpan"
                    })

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
    }).mount("#edit-data-barang")
</script>
@endsection