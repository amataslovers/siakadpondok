@extends('layouts.app')
@section('css')
<style type="text/css">
    .boxes {
     height: 200px;
     overflow: auto;
     width: 100%;
    }
</style>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Form Role Management  <a class="btn btn-primary" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"> </i> Back</a>
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
        
                    <div class="box-body">
                        <div class="row">
                            {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Permission:</strong>
                                        <br/>
                                        <input id="myRole" class="form-control" type="text" placeholder="Cari...." autocomplete="off">
                                        <br>
                                        <div class="boxes">
                                            <table>
                                                <tbody id="myTable">
                                                    @foreach($permission as $value)
                                                        <tr>
                                                            <td>
                                                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                                {{ $value->name }}</label>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
          $("#myRole").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });

          $("#myRole").keypress(
            function(event){
                if (event.which == '13') {
                event.preventDefault();
                }
            });
        });
    </script>
@endsection