<!-- Nis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NIS', 'Nis:') !!}
    {!! Form::text('NIS', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Keluarga Murid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_KELUARGA_MURID', 'Id Keluarga Murid:') !!}
    {!! Form::number('ID_KELUARGA_MURID', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('detailKeluargas.index') !!}" class="btn btn-default">Cancel</a>
</div>
