@extends('dashboard_layout.index')
@section('content')
    <div class="page-inner" id="input-scm">
        <default-datatable title="Data Barang" url="{!! url('input-scm') !!}" :headers="headers"
            :can-add="{{ $permissions['create-input_scm'] }}" :can-edit="{{ $permissions['update-input_scm'] }}"
            :can-delete="{{ $permissions['delete-input_scm'] }}">
      
        </default-datatable>
    </div>

    <script>
        createApp({
            data() {
                return {
                    headers: [{
                        text: 'Nama UMKM',
                        value: 'nama',
                    }, ],
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
        }).mount('#input-scm');
    </script>
@endsection
