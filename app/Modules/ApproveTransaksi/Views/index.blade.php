@extends('dashboard_layout.index')
@section('content')
<div class="page-inner" id="approve-transaksi">
    <default-datatable title="ApproveTransaksi" url="{!! url('approve-transaksi') !!}" :headers="headers" :can-add="{{ $permissions['create-approve_transaksi'] }}" :can-edit="{{ $permissions['update-approve_transaksi'] }}" :can-delete="{{ $permissions['delete-approve_transaksi'] }}" />
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
    }).mount('#approve-transaksi');
</script>
@endsection