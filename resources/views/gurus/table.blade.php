@section('css')
    @include('layouts.datatables_css')
    <style type="text/css">
        div.container {
            width: 80%;
        }
    </style>
@endsection

{{-- {!! $dataTable->table(['width' => '100%'], true) !!} --}}

<table class="table table-responsive table-hover table-bordered" id="gurus-table"  style="width: 100%">
    <thead>
        <tr>
            <th>#</th>
            <th>NIP</th>
            <th>Gelar Depan</th>
            <th>Nama</th>
            <th>Gelar Belakang</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>No Telepon</th>
            <th width="100px">Action</th>
        </tr>
    </thead>
</table>

@section('scripts')
    @include('layouts.datatables_js_client')
    {{-- {!! $dataTable->scripts() !!} --}}
    <script type="text/javascript">
        
        $('#gurus-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('gurus.index') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'NIP_GURU', name: 'NIP_GURU' },
                { data: 'GELAR_DEPAN', name: 'GELAR_DEPAN' },
                { data: 'NAMA', name: 'NAMA' },
                { data: 'GELAR_BELAKANG', name: 'GELAR_BELAKANG' },
                { data: 'TEMPAT_LAHIR', name: 'TEMPAT_LAHIR' },
                { data: 'TANGGAL_LAHIR', name: 'TANGGAL_LAHIR' },
                { data: 'NOTELP', name: 'NOTELP' },
                { data: 'action', name: 'gurus.action', orderable: false, searchable: false}

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
            }
        });
    </script>
@endsection