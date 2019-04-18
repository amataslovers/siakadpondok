@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perizinan Murid
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="row">
            <div class="col-md-10">
                <div class="box box-primary">
        
                    <div class="box-body">
                        <div class="row">
                            {!! Form::open(['route' => 'perizinanMurids.store']) !!}
        
                                @include('perizinan_murids.fields')
        
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">

        $(document).ready(function(){
            $('#ID_HISTORY_KELAS').select2({
                width : '100%'
            });

            $('#TANGGAL').datepicker({
                autoclose : true,
                format: 'dd/mm/yyyy'
            });
        });

    </script>
@endsection