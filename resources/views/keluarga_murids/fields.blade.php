<!-- Id Jenis Keluarga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_JENIS_KELUARGA', 'Jenis Keluarga:') !!}
    {!! Form::select('ID_JENIS_KELUARGA', $jenisKeluarga, null, ['class' => 'form-control form-select2']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA', 'Nama:') !!}
    {!! Form::text('NAMA', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Agama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_AGAMA', 'Agama:') !!}
    {!! Form::select('ID_AGAMA', $agama, null, ['class' => 'form-control form-select2']) !!}
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TANGGAL_LAHIR', 'Tanggal Lahir:') !!}
    {!! Form::text('TANGGAL_LAHIR', null, ['class' => 'form-control tanggal']) !!}
</div>

<!-- Tempat Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TEMPAT_LAHIR', 'Tempat Lahir:') !!}
    {!! Form::text('TEMPAT_LAHIR', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('ALAMAT', 'Alamat:') !!}
    {!! Form::textarea('ALAMAT', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('EMAIL', 'Email:') !!}
    {!! Form::email('EMAIL', null, ['class' => 'form-control']) !!}
</div>

<!-- Notelp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NOTELP', 'Notelp:') !!}
    {!! Form::text('NOTELP', null, ['class' => 'form-control']) !!}
</div>

<!-- Pekerjaan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PEKERJAAN', 'Pekerjaan:') !!}
    {!! Form::text('PEKERJAAN', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('keluargaMurids.index') !!}" class="btn btn-default">Cancel</a>
</div>
