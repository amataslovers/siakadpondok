<!-- Id Kelas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_KELAS', 'Id Kelas:') !!}
    {!! Form::number('ID_KELAS', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Semester Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_SEMESTER', 'Id Semester:') !!}
    {!! Form::number('ID_SEMESTER', null, ['class' => 'form-control']) !!}
</div>

<!-- Nis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NIS', 'Nis:') !!}
    {!! Form::text('NIS', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('historyKelas.index') !!}" class="btn btn-default">Cancel</a>
</div>
