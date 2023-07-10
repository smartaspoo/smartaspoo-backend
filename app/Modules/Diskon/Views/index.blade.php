@extends('dashboard_layout.index')
@section('content')
<div class="page-inner" id="diskon">
    <default-datatable title="Diskon" url="{!! url('diskon') !!}" :headers="headers" :can-add="{{ $permissions['create-diskon'] }}" :can-edit="{{ $permissions['update-diskon'] }}" :can-delete="{{ $permissions['delete-diskon'] }}" />
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
    }).mount('#diskon');
</script>
@endsection