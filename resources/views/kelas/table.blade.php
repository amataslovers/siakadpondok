@section('css')
    @include('layouts.datatables_css')
@endsection

{{-- {!! $dataTable->table(['width' => '100%']) !!} --}}
<table class="table table-responsive table-hover table-bordered" id="kelas-table"  style="width: 100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Wali Kelas</th>
            <th>Tingkat</th>
            <th>Nama</th>
            <th>Tahun Ajaran</th>
            <th>Tahun Angkatan</th>
            <th>Status</th>
            <th width="100px">Action</th>
        </tr>
    </thead>
</table>

@section('scripts')
    @include('layouts.datatables_js_client')
    {{-- {!! $dataTable->scripts() !!} --}}
    <script type="text/javascript">
        $('#kelas-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('kelas.index') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'guru.NAMA', name: 'guru.NAMA' },
                { data: 'tingkat.TINGKAT', name: 'tingkat.TINGKAT' },
                { data: 'NAMA', name: 'NAMA' },
                { data: 'tahun_ajaran.NAMA', name: 'tahun_ajaran.NAMA' },
                { data: 'TAHUN_ANGKATAN', name: 'TAHUN_ANGKATAN' },
                { data: 'STATUS', name: 'STATUS' },
                { data: 'action', name: 'kelas.action', orderable: false, searchable: false}

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