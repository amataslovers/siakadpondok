<!-- Id Sanksi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_SANKSI', 'Id Sanksi:') !!}
    {!! Form::select('ID_SANKSI', $sanksi, null, ['class' => 'form-control form-select2']) !!}
</div>

<!-- Nama Peraturan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA_PERATURAN', 'Nama Peraturan:') !!}
    {!! Form::text('NAMA_PERATURAN', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('peraturans.index') !!}" class="btn btn-default">Cancel</a>
</div>
