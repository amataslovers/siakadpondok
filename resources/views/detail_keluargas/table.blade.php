@section('css')
    @include('layouts.datatables_css')
    <style type="text/css">
        div.container {
            width: 80%;
        }
    </style>
@endsection

{{-- {!! $dataTable->table(['width' => '100%'], true) !!} --}}

<table class="table table-responsive table-hover table-bordered" id="detailKeluarga-table"  style="width: 100%">
    <thead>
        <tr>
            <th>#</th>
            <th>NIS</th>
            <th>Nama Murid</th>
            <th>Nama Keluarga</th>
            <th>Hubungan</th>
            {{-- <th width="100px">Action</th> --}}
        </tr>
    </thead>
</table>

@section('scripts')
    @include('layouts.datatables_js_client')
    {{-- {!! $dataTable->scripts() !!} --}}
    <script type="text/javascript">
        
        $('#detailKeluarga-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('detailKeluargas.index') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'NIS', name: 'NIS' },
                { data: 'murid.NAMA', name: 'murid.NAMA' },
                { data: 'keluarga_murid.NAMA', name: 'keluarga_murid.NAMA' },
                { data: 'keluarga_murid.jenis_keluarga.NAMA', name: 'keluarga_murid.jenis_keluarga.NAMA' },
                // { data: 'action', name: 'detail_keluargas.action', orderable: false, searchable: false}

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