<!-- Id Agama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_AGAMA', 'Id Agama:') !!}
    {!! Form::number('ID_AGAMA', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA', 'Nama:') !!}
    {!! Form::text('NAMA', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('JENIS_KELAMIN', 'Jenis Kelamin:') !!}
    {!! Form::text('JENIS_KELAMIN', null, ['class' => 'form-control']) !!}
</div>

<!-- Tempat Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TEMPAT_LAHIR', 'Tempat Lahir:') !!}
    {!! Form::text('TEMPAT_LAHIR', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TANGGAL_LAHIR', 'Tanggal Lahir:') !!}
    {!! Form::date('TANGGAL_LAHIR', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('ALAMAT', 'Alamat:') !!}
    {!! Form::textarea('ALAMAT', null, ['class' => 'form-control']) !!}
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
    {!! Form::text('FOTO', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tenagaUmums.index') !!}" class="btn btn-default">Cancel</a>
</div>
