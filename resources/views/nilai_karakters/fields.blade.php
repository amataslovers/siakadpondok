<table class="table table-responsive table-hover table-bordered" style="width: 100%">
    <thead>
        <tr>
            <th>#</th>
            <th>NIS & Nama</th>
            <th>Ijin</th>
            <th>Sakit</th>
            <th>Alfa</th>
            <th>Akhlaq</th>
            <th>Kebersihan</th>
            <th>Kerajinan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($history as $key => $value)
            <tr>
                <td>
                    <button type="button" class="btn btn-success fa fa-chevron-circle-down" data-toggle="modal" data-target="#modalPelanggaran{{$key}}">
                    </button>
                    {!! Form::hidden('ID_HISTORY_KELAS', $value->ID_HISTORY_KELAS, ['class' => 'form-control', 'name' => '_ID_HISTORY_KELAS[]']) !!}
                </td>

                <td>
                    <b>{{$value->murid->NIS}}</b> <br>
                    {{$value->murid->NAMA}}
                </td>

                <td>
                    {!! Form::number('IJIN', 0, ['class' => 'form-control', 'name' => '_IJIN[]', 'required']) !!}
                </td>

                <td>
                    {!! Form::number('SAKIT', 0, ['class' => 'form-control', 'name' => '_SAKIT[]', 'required']) !!}
                </td>

                <td>
                    {!! Form::number('ALFA', 0, ['class' => 'form-control', 'name' => '_ALFA[]', 'required']) !!}
                </td>

                <td>
                    {!! Form::number('AKHLAQ', 10, ['class' => 'form-control', 'name' => '_AKHLAQ[]', 'required']) !!}
                </td>
                
                <td>
                        {!! Form::number('KEBERSIHAN', 10, ['class' => 'form-control', 'name' => '_KEBERSIHAN[]', 'required']) !!}
                </td>

                <td>
                    {!! Form::number('KERAJINAN', 10, ['class' => 'form-control', 'name' => '_KERAJINAN[]', 'required']) !!}
                </td>
                
            </tr>
        @endforeach
    </tbody>
</table>
@foreach ($history as $key => $value)
    <div class="modal fade" id="modalPelanggaran{{$key}}" tabindex="-1" role="dialog" aria-labelledby="labelPelanggaran{{$key}}" style="display:none">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="labelPelanggaran{{$key}}">Pelanggaran Murid {{$value->murid->NAMA}}</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-responsive table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Melanggar</th>
                                <th>Sanksi</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($value->pelanggaranMurid as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->peraturan->NAMA_PERATURAN}}</td>
                                    <td>{{$item->peraturan->sanksi->NAMA_SANKSI}}</td>
                                    <td>{{$item->TANGGAL_MELANGGAR}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach
{{-- @foreach ($history as $key => $value)
    
    <!-- Id History Kelas Field -->
    <div class="form-group col-sm-1">
        {!! Form::label('', '') !!}
        <br>
        <button class="btn btn-primary fa fa-caret-up pull-left" type="button" data-toggle="collapse" data-target="#target{{$key}}" aria-expanded="false" aria-controls="target">
        </button>
        {!! Form::hidden('ID_HISTORY_KELAS', $value->ID_HISTORY_KELAS, null, ['class' => 'form-control', 'name' => 'ID_HISTORY_KELAS[]']) !!}
    </div>

    <div class="form-group col-sm-3">
        {!! Form::label('NAMA_MURID', 'NAMA_MURID') !!}
        {!! Form::text('NAMA_MURID', $value->murid->NAMA, ['class' => 'form-control', 'name' => 'NAMA_MURID[]', 'readonly']) !!}
    </div>

    <div class="form-group col-sm-3">
        {!! Form::label('NIS_MURID', 'NIS_MURID') !!}
        {!! Form::text('NIS_MURID', $value->murid->NIS, ['class' => 'form-control', 'name' => 'NIS_MURID[]', 'readonly']) !!}
    </div>

    <div class="clearfix"></div>

    <!-- Ijin Field -->
    <div class="form-group col-sm-1">
        {!! Form::label('IJIN', 'Ijin:') !!}
        {!! Form::number('IJIN', null, ['class' => 'form-control', 'name' => 'IJIN[]']) !!}
    </div>

    <!-- Sakit Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('SAKIT', 'Sakit:') !!}
        {!! Form::number('SAKIT', null, ['class' => 'form-control', 'name' => 'SAKIT[]']) !!}
    </div>

    <!-- Alfa Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('ALFA', 'Alfa:') !!}
        {!! Form::number('ALFA', null, ['class' => 'form-control', 'name' => 'ALFA[]']) !!}
    </div>

    <!-- Akhlaq Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('AKHLAQ', 'Akhlaq:') !!}
        {!! Form::number('AKHLAQ', null, ['class' => 'form-control', 'name' => 'AKHLAQ[]']) !!}
    </div>

    <!-- Kebersihan Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('KEBERSIHAN', 'Kebersihan:') !!}
        {!! Form::number('KEBERSIHAN', null, ['class' => 'form-control', 'name' => 'KEBERSIHAN[]']) !!}
    </div>

    <!-- Kerajinan Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('KERAJINAN', 'Kerajinan:') !!}
        {!! Form::number('KERAJINAN', null, ['class' => 'form-control', 'name' => 'KERAJINAN[]']) !!}
    </div>
    <div class="clearfix"></div>
    <div class="col-sm-12">
        <div class="collapse" id="target{{$key}}">
            <div class="well">
                <table class="table table-responsive table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Melanggar</th>
                            <th>Sanksi</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($value->pelanggaranMurid as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->peraturan->NAMA_PERATURAN}}</td>
                                <td>{{$item->peraturan->sanksi->NAMA_SANKSI}}</td>
                                <td>{{$item->TANGGAL_MELANGGAR}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endforeach --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('nilaiKarakters.index') !!}" class="btn btn-default">Cancel</a>
</div>
