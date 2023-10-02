@extends('dashboard_layout.index')
@section('content')
<div class="page-inner" id="approve-user">
    <default-datatable title="Approve User" url="{!! url('approve-user') !!}" :headers="headers" :can-add="false" :can-edit="{{ $permissions['update-approve_user'] }}" :can-delete="{{ $permissions['delete-approve_user'] }}">
        
    </default-datatable>
</div>

<script>
    createApp({
        data() {
            return {
                headers: [
                    {
                        text: 'Nama',
                        value: 'name',
                    },    
                    {
                        text: 'Email',
                        value: 'email',
                    },    
                    {
                        text: 'Username',
                        value: 'username',
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
    }).mount('#approve-user');
</script>
@endsection