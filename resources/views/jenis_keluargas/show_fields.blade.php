<!-- Id Jenis Keluarga Field -->
<div class="form-group">
    {!! Form::label('ID_JENIS_KELUARGA', 'Id Jenis Keluarga:') !!}
    <p>{!! $jenisKeluarga->ID_JENIS_KELUARGA !!}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('NAMA', 'Nama:') !!}
    <p>{!! $jenisKeluarga->NAMA !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $jenisKeluarga->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $jenisKeluarga->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $jenisKeluarga->deleted_at !!}</p>
</div>

