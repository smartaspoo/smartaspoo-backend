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
    }).mount('#data-barang');
</script>
@endsection