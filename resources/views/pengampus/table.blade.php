@section('css')
    @include('layouts.datatables_css')
@endsection

{{-- {!! $dataTable->table(['width' => '100%']) !!} --}}
<table class="table table-responsive table-hover table-bordered" id="pengampu-table" style="width: 100%">
    <thead>
        <tr>
            <th>#</th>
            <th>NIP GURU</th>
            <th>GURU</th>
            <th>MAPEL</th>
            <th>TAHUN AJARAN</th>
            <th>KELAS</th>
            <th>KKM</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>#</th>
            <th>NIP GURU</th>
            <th>GURU</th>
            <th>MAPEL</th>
            <th>TAHUN AJARAN</th>
            <th>KELAS</th>
            <th>KKM</th>
        </tr>
    </tfoot>
</table>
@section('scripts')
    @include('layouts.datatables_js_client')
    {{-- {!! $dataTable->scripts() !!} --}}
    <script type="text/javascript">
        $('#pengampu-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('pengampus.index') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'NIP_GURU', name: 'NIP_GURU' },
                { data: 'guru.NAMA', name: 'guru.NAMA' },
                { data: 'mata_pelajaran.NAMA', name: 'mata_pelajaran.NAMA' },
                { data: 'tahun_ajaran.NAMA', name: 'tahun_ajaran.NAMA' },
                { data: 'kelas.NAMA', name: 'kelas.NAMA' },
                { data: 'KKM', name: 'KKM' },
                { data: 'action', name: 'detail_mapel.action', orderable: false, searchable: false}

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
            initComplete: function () {
                this.api().columns([1,2,3,4,5,6]).every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());

                        column.search(val ? val : '', true, false).draw();
                    });
                });
            }
        });
    </script>
@endsection