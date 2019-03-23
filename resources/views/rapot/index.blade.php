@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Rapot Murid</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('nilaiAkademiks.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
       
        <div class="box box-primary">
            <div class="box-body">
                    @include('rapot.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

@section('scripts')
    @include('layouts.datatables_js_client')

    <script type="text/javascript">

        $('#rapot-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('cetakRapotIndex') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'NIS', name: 'NIS' },
                { data: 'murid.NAMA', name: 'murid.NAMA' },
                { data: 'kelas.tingkat.TINGKAT', name: 'tingkat.TINGKAT' },
                { data: 'semester.SEMESTER', name: 'semester.SEMESTER' },
                { data: 'action', name: 'rapot.action', orderable: false, searchable: false}

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
                }
            }
        });
    </script>
@endsection