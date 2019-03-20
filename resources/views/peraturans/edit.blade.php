@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Peraturan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($peraturan, ['route' => ['peraturans.update', $peraturan->ID_PERATURAN], 'method' => 'patch']) !!}

                        @include('peraturans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('scripts')
    @include('layouts.datatables_js_client')

    <script type="text/javascript">

        $(document).ready(function(){
            $('.form-select2').select2({
                width : '100%'
            });
        });

    </script>
@endsection