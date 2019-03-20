<!-- Id Agama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_AGAMA', 'Id Agama:') !!}
    {!! Form::select('ID_AGAMA', $agama, null, ['class' => 'form-control']) !!}
</div>

<!-- NIP_GURU Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NIP_GURU', 'NIP_GURU:') !!}
    {!! Form::text('NIP_GURU', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA', 'Nama:') !!}
    {!! Form::text('NAMA', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Arab Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA_ARAB', 'Nama Arab:') !!}
    {!! Form::text('NAMA_ARAB', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('JENIS_KELAMIN', 'Jenis Kelamin:') !!}
    {!! Form::select('JENIS_KELAMIN', ['L' => 'Laki-laki', 'P' => 'Perempuan'] ,null, ['class' => 'form-control']) !!}
</div>

<!-- Gelar Depan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('GELAR_DEPAN', 'Gelar Depan:') !!}
    {!! Form::text('GELAR_DEPAN', null, ['class' => 'form-control']) !!}
</div>

<!-- Gelar Belakang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('GELAR_BELAKANG', 'Gelar Belakang:') !!}
    {!! Form::text('GELAR_BELAKANG', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('ALAMAT', 'Alamat:') !!}
    {!! Form::textarea('ALAMAT', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TANGGAL_LAHIR', 'Tanggal Lahir:') !!}
    {!! Form::text('TANGGAL_LAHIR', null, ['class' => 'form-control']) !!}
</div>

<!-- Tempat Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TEMPAT_LAHIR', 'Tempat Lahir:') !!}
    {!! Form::text('TEMPAT_LAHIR', null, ['class' => 'form-control']) !!}
</div>

<!-- Notelp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NOTELP', 'Notelp:') !!}
    {!! Form::text('NOTELP', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('EMAIL', 'Email:') !!}
    {!! Form::email('EMAIL', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('FOTO', 'Foto:') !!}
    {!! Form::file('FOTO', null, ['class' => 'form-control']) !!}
    @if(isset($guru) && !is_null($guru->FOTO))
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#picFoto">
          Lihat Foto
        </button>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('gurus.index') !!}" class="btn btn-default">Cancel</a>
</div>

@if(!empty($guru->FOTO))
    <!-- Modal FOTO -->
    <div class="modal fade" id="picFoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <img src="{!! asset('/upload/profile/'. $guru->FOTO) !!}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif