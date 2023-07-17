@extends('dashboard_layout.index')
@section('content')
<div class="page-inner" id="data-barang">
    <default-datatable title="DataBarang" url="{!! url('data-barang') !!}" :headers="headers" :can-add="{{ $permissions['create-data_barang'] }}" :can-edit="{{ $permissions['update-data_barang'] }}" :can-delete="{{ $permissions['delete-data_barang'] }}" />
</div>

<script>
    createApp({
        data() {
            return {
                headers: [
                    {
                        text: 'Kode Barang',
                        value: 'kode_barang',
                    },    
                    {
                        text: 'Nama Barang',
                        value: 'nama_barang',
                    },    
                    {
                        text: 'Harga Jual',
                        value: 'harga_barang_jual',
                    },    
                    {
                        text: 'Harga Beli',
                        value: 'harga_barang_beli',
                    },  
                    {
                        text: 'Stok',
                        value: 'stock_global',
                    },  
                    {
                        text: 'Satuan',
                        value: 'satuan.satuan_nama',
                    },  
                    {
                        text: 'Pemilik',
                        value: 'user.name',
                    },  
					],
            }
        },
        created() {},
        methods: {},
        components: {
            ...commonComponentMap(
                [
                    'DefaultDatatable',
                ]
            )
        },
    }).mount('#data-barang');
</script>
@endsection