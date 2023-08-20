@extends('dashboard_layout.index')
@section('content')
<div class="page-inner" id="input-scm">
    <default-datatable title="InputSCM" url="{!! url('input-scm') !!}" :headers="headers" :can-add="{{ $permissions['create-input_scm'] }}" :can-edit="{{ $permissions['update-input_scm'] }}" :can-delete="{{ $permissions['delete-input_scm'] }}" />
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
    }).mount('#input-scm');
</script>
@endsection