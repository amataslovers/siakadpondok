@section('css')
    @include('layouts.datatables_css')
@endsection

{{-- {!! $dataTable->table(['width' => '100%'], true) !!} --}}

<table class="table table-responsive table-hover table-bordered" id="catatanSpp-table"  style="width: 100%">
    <thead>
        <tr>
            <th>#</th>
            <th>NIS</th>
            <th>Nama Murid</th>
            <th>Kelas</th>
            <th>Semester</th>
            <th>Tanggal Bayar</th>
            <th>Bulan</th>
            <th>Jumlah Bayar (Rp)</th>
            <th>Action</th>
        </tr>
    </thead>
</table>

@section('scripts')
    @include('layouts.datatables_js_client')
    {{-- {!! $dataTable->scripts() !!} --}}
    <script type="text/javascript">
        
        $('#catatanSpp-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('catatanSpps.index') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nisMurid', name: 'nisMurid' },
                { data: 'namaMurid', name: 'namaMurid' },
                { data: 'namaKelas', name: 'namaKelas' },
                { data: 'semester', name: 'semester' },
                { data: 'TANGGAL_BAYAR', name: 'TANGGAL_BAYAR' },
                { data: 'BULAN', name: 'BULAN' },
                { data: 'TOTAL_BAYAR', name: 'TOTAL_BAYAR' },
                { data: 'action', name: 'catatan_spps.action', orderable: false, searchable: false}

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