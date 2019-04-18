@section('css')
    @include('layouts.datatables_css')
@endsection

{{-- {!! $dataTable->table(['width' => '100%']) !!} --}}
<table class="table table-responsive table-hover table-bordered" id="tingkats-table"  style="width: 100%">
    <thead>
        <tr>
            <th>Tingkat</th>
            <th>Setara</th>
            <th>Kelulusan</th>
            <th>Action</th>
        </tr>
    </thead>
</table>

@section('scripts')
    @include('layouts.datatables_js_client')
    {{-- {!! $dataTable->scripts() !!} --}}
    <script type="text/javascript">
        $('#tingkats-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('tingkats.index') !!}',
            columns: [
                { data: 'TINGKAT', name: 'TINGKAT' },
                { data: 'SETARA', name: 'SETARA' },
                { data: 'KODE_LULUS', name: 'KODE_LULUS' },
                { data: 'action', name: 'tingkats.action', orderable: false, searchable: false}

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