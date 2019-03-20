<!-- Id Tahun Ajaran Field -->
<div class="form-group">
    {!! Form::label('ID_TAHUN_AJARAN', 'Id Tahun Ajaran:') !!}
    <p>{!! $tahunAjaran->ID_TAHUN_AJARAN !!}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('NAMA', 'Nama:') !!}
    <p>{!! $tahunAjaran->NAMA !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('STATUS', 'Status:') !!}
    <p>{!! $tahunAjaran->STATUS !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tahunAjaran->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tahunAjaran->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $tahunAjaran->deleted_at !!}</p>
</div>

