@extends('layouts.app') 
@section('css')
    @include('layouts.datatables_css')
@endsection
 
@section('content')
<section class="content-header">
    <h1 class="pull-left">User Management</h1>
    <h1 class="pull-right">
        @can('user-create')
        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('users.create') }}"><i class="fa fa-plus-square"></i> Tambah Baru</a>
        @endcan
    </h1>
</section>
<div class="content">
    <div class="clearfix"></div>
    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-responsive table-hover table-bordered" id="users-table" style="width: 100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection
 
@section('scripts')
    @include('layouts.datatables_js_client')

<script type="text/javascript">
    $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('users.index') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'roles', name: 'roles' },
                { data: 'action', name: 'users.action', orderable: false, searchable: false}

            ],
            dom: 'lBfrtip',
            scrollX: true,
            "buttons": [
               {
                    extend: 'colvis',
                    postfixButtons: ['colvisRestore'],
               }
            ],
            language: {
                buttons: {
                    colvis: 'Ganti Kolom'
                },
                search: 'Cari:',
                zeroRecords: 'Data tidak ditemukan',
                paginate: {
                    first: 'Awal',
                    last: 'Terakhir',
                    next: 'Selanjutnya',
                    previous: 'Sebelumnya'
                },
            },
        });

</script>
@endsection