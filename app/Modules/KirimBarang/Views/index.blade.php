@extends('dashboard_layout.index')
@section('content')
<div class="page-inner" id="kirim-barang">
    <default-datatable title="KirimBarang" url="{!! url('kirim-barang') !!}" :headers="headers" :can-add="{{ $permissions['create-kirim_barang'] }}" :can-edit="{{ $permissions['update-kirim_barang'] }}" :can-delete="{{ $permissions['delete-kirim_barang'] }}" />
</div>

<script>
    createApp({
        data() {
            return {
                headers: [
                    {
                        text: 'Id',
                        value: 'id',
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
    }).mount('#kirim-barang');
</script>
@endsection