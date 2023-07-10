@extends('dashboard_layout.index')
@section('content')
<div class="page-inner" id="kategori-barang">
    <default-datatable title="KategoriBarang" url="{!! url('kategori-barang') !!}" :headers="headers" :can-add="{{ $permissions['create-kategori_barang'] }}" :can-edit="{{ $permissions['update-kategori_barang'] }}" :can-delete="{{ $permissions['delete-kategori_barang'] }}" />
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
    }).mount('#kategori-barang');
</script>
@endsection