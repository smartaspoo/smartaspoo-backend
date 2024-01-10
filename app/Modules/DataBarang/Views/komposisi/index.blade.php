@extends('dashboard_layout.index')
@section('content')
    <div class="page-inner" id="data-barang">
        <default-datatable title="Komposisi Barang" url="{!! url('data-barang/komposisi') . '/' . $id !!}" :headers="headers"
            :can-add="true" :can-edit="false" :can-delete="true">
          
        </default-datatable>
    </div>
    <script>
        createApp({
            data() {
                return {
                    headers: [{
                            text: 'Nama Komposisi',
                            value: 'komposisi.nama',
                        },
                        {
                            text: 'Satuan',
                            value: 'komposisi.satuan.satuan_nama',
                        },
                        {
                            text: 'Jumlah',
                            value: 'jumlah',
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
