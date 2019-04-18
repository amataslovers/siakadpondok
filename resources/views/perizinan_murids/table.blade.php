@section('css')
    @include('layouts.datatables_css')
@endsection

<table class="table table-responsive" id="perizinanMurids-table" style="width: 100%">
    <thead>
        <tr>
            <th>#</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Semester</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Hari</th>
            <th>Action</th>
        </tr>
    </thead>
</table>

@section('scripts')
    @include('layouts.datatables_js_client')
    {{-- {!! $dataTable->scripts() !!} --}}
    <script type="text/javascript">
        $('#perizinanMurids-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('perizinanMurids.index') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nisMurid', name: 'nisMurid' },
                { data: 'namaMurid', name: 'namaMurid' },
                { data: 'namaKelas', name: 'namaKelas' },
                { data: 'semester', name: 'semester' },
                { data: 'TANGGAL', name: 'TANGGAL' },
                { data: 'KETERANGAN', name: 'KETERANGAN', orderable: false },
                { data: 'TOTAL_HARI', name: 'TOTAL_HARI', orderable: false, searchable: false },
                { data: 'action', name: 'perizinan_murids.action', orderable: false, searchable: false}

            ],
            dom: 'lBfrtip',
            scrollX: true,
            "buttons": [
               {
                    extend: 'colvis',
                    postfixButtons: ['colvisRestore'],
                    collectionLayout: 'two-column'
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