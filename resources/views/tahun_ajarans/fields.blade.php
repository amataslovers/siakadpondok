<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA', 'Nama:') !!}
    {!! Form::text('NAMA', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('STATUS', 'Status:') !!}
    {!! Form::select('STATUS', [1 => 'Aktif', 0 => 'NonAktif'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tahunAjarans.index') !!}" class="btn btn-default">Cancel</a>
</div>
