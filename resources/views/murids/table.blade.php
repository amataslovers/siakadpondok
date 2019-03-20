@section('css')
    @include('layouts.datatables_css')
    <style type="text/css">
        div.container {
            width: 80%;
        }
    </style>
@endsection

{{-- {!! $dataTable->table(['width' => '100%'], true) !!} --}}

<table class="table table-responsive table-hover table-bordered" id="murids-table"  style="width: 100%">
    <thead>
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Nama Arab</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Notelp</th>
            <th>Asal Sekolah</th>
            <th>Alamat Sekolah</th>
            <th>Tgl Masuk</th>
            <th>Tgl Keluar</th>
            <th>Angkatan</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
</table>

@section('scripts')
    @include('layouts.datatables_js_client')
    {{-- {!! $dataTable->scripts() !!} --}}
    <script type="text/javascript">
        $('#murids-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('murids.index') !!}',
            columns: [
                { data: 'NIS', name: 'NIS' },
                { data: 'NAMA', name: 'NAMA' },
                { data: 'NAMA_ARAB', name: 'NAMA_ARAB' },
                { data: 'JENIS_KELAMIN', name: 'JENIS_KELAMIN' },
                { data: 'TEMPAT_LAHIR', name: 'TEMPAT_LAHIR' },
                { data: 'TANGGAL_LAHIR', name: 'TANGGAL_LAHIR' },
                { data: 'ALAMAT', name: 'ALAMAT' },
                { data: 'EMAIL', name: 'EMAIL' },
                { data: 'NOTELP', name: 'NOTELP' },
                { data: 'NAMA_ASAL_SEKOLAH', name: 'NAMA_ASAL_SEKOLAH' },
                { data: 'ALAMAT_ASAL_SEKOLAH', name: 'ALAMAT_ASAL_SEKOLAH' },
                { data: 'TANGGAL_MASUK', name: 'TANGGAL_MASUK' },
                { data: 'TANGGAL_KELUAR', name: 'TANGGAL_KELUAR' },
                { data: 'ANGKATAN', name: 'ANGKATAN' },
                { data: 'STATUS_AKTIF', name: 'STATUS_AKTIF' },
                { data: 'action', name: 'murids.action', orderable: false, searchable: false}

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
                }
            }
        });
    </script>
@endsection