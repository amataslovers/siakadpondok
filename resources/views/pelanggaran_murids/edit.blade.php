@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pelanggaran Murid
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pelanggaranMurid, ['route' => ['pelanggaranMurids.update', $pelanggaranMurid->ID_PELANGGARAN_MURID], 'method' => 'patch']) !!}

                        @include('pelanggaran_murids.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('scripts')

    <script type="text/javascript">

        $(document).ready(function(){
            $('.form-select2').select2({
                width : '100%'
            });
            
            $('#TANGGAL_MELANGGAR').datepicker({
                autoclose : true,
                format: 'dd/mm/yyyy'
            });

            $('#ID_SANKSI').on('change', function(e){
                $('#ID_PERATURAN').empty().trigger("change");
                var idSanksi = $('#ID_SANKSI').val();
                var peraturanDropDown = $('#ID_PERATURAN');
                $.ajax({
                    type: 'GET',
                    url: '{{url('api/peraturan')}}/' + idSanksi
                }).then(function (data) {

                    for(var k in data) {
                        var option = new Option(data[k].NAMA_PERATURAN, data[k].ID_PERATURAN, true, true);
                        peraturanDropDown.append(option).trigger('change');
                    }

                    $('#ID_PERATURAN').val(null).trigger('change');
                });
            });
        });


    </script>
@endsection