@extends('dashboard_layout.index')
@section('content')
<div class="page-inner" id="penjualan">
    <default-datatable title="Penjualan" url="{!! url('penjualan') !!}" :headers="headers" :can-add="{{ $permissions['create-penjualan'] }}" :can-edit="{{ $permissions['update-penjualan'] }}" :can-delete="{{ $permissions['delete-penjualan'] }}" />
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
    }).mount('#penjualan');
</script>
@endsection