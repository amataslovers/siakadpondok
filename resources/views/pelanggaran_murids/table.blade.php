@section('css')
    @include('layouts.datatables_css')
@endsection

{{-- {!! $dataTable->table(['width' => '100%']) !!} --}}
<table class="table table-responsive table-hover table-bordered" id="pelanggaranMurids-table"  style="width: 100%">
    <thead>
        <tr>
            <th>#</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Semester</th>
            <th>Peraturan</th>
            <th>Sanksi</th>
            <th>Tanggal</th>
            <th width="100px">Action</th>
        </tr>
    </thead>
</table>

@section('scripts')
    @include('layouts.datatables_js_client')
    {{-- {!! $dataTable->scripts() !!} --}}
    <script type="text/javascript">
        $('#pelanggaranMurids-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('pelanggaranMurids.index') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nisMurid', name: 'nisMurid' },
                { data: 'namaMurid', name: 'namaMurid' },
                { data: 'namaKelas', name: 'namaKelas' },
                { data: 'semester', name: 'semester' },
                { data: 'peraturan.NAMA_PERATURAN', name: 'peraturan.NAMA_PERATURAN' },
                { data: 'peraturan.sanksi.NAMA_SANKSI', name: 'peraturan.sanksi.NAMA_SANKSI' },
                { data: 'TANGGAL_MELANGGAR', name: 'TANGGAL_MELANGGAR' },
                { data: 'action', name: 'pelanggaran_murids.action', orderable: false, searchable: false}

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