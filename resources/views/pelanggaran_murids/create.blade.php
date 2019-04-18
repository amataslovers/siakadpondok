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
                    {!! Form::open(['route' => 'pelanggaranMurids.store']) !!}

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

            $('#ID_HISTORY_KELAS').on('change', function(e){
                $('#show-info').empty();
                var id = $('#ID_HISTORY_KELAS').val();
                var show = $('#show-info');
                $.ajax({
                    type: 'GET',
                    url: '{{url('api/infopelanggaran')}}/' + id
                }).then(function (data) {

                    for(var k in data) {
                        var isiShow = '<div class="alert alert-danger"><strong>' + data[k].TANGGAL_MELANGGAR + '</strong> ' + data[k].history_kelas.murid.NAMA + ' Melanggar ' + data[k].peraturan.NAMA_PERATURAN+'.</div>';
                        show.append(isiShow);
                    }
                });
            });
        });


    </script>
@endsection
