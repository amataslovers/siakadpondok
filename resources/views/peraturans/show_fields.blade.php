<!-- Id Peraturan Field -->
<div class="form-group">
    {!! Form::label('ID_PERATURAN', 'Id Peraturan:') !!}
    <p>{!! $peraturan->ID_PERATURAN !!}</p>
</div>

<!-- Id Sanksi Field -->
<div class="form-group">
    {!! Form::label('ID_SANKSI', 'Id Sanksi:') !!}
    <p>{!! $peraturan->ID_SANKSI !!}</p>
</div>

<!-- Nama Peraturan Field -->
<div class="form-group">
    {!! Form::label('NAMA_PERATURAN', 'Nama Peraturan:') !!}
    <p>{!! $peraturan->NAMA_PERATURAN !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $peraturan->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $peraturan->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $peraturan->deleted_at !!}</p>
</div>

