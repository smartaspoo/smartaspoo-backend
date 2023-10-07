@extends('dashboard_layout.index')
@section('content')
<div class="page-inner" id="validasi-transaksi">
    <default-datatable title="ValidasiTransaksi" url="{!! url('transaksi') !!}" :headers="headers" :can-add="{{ $permissions['create-validasi_transaksi'] }}" :can-edit="{{ $permissions['update-validasi_transaksi'] }}" :can-delete="{{ $permissions['delete-validasi_transaksi'] }}" />
</div>

<script>
    createApp({
        data() {
            return {
                headers: [
                    {
                        text: 'Kode Transaksi',
                        value: 'kode_transaksi',
                    },    
                    {
                        text: 'Biaya Pengiriman',
                        value: 'biaya_pengiriman',
                    },    
                    {
                        text: 'Kode Transaksi',
                        value: 'kode_transaksi',
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
    }).mount('#validasi-transaksi');
</script>
@endsection