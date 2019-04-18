<!-- Id Kelas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_KELAS', 'Id Kelas:') !!}
    {!! Form::select('ID_KELAS', $kelas, null, ['class' => 'form-control form-select2']) !!}
</div>

<!-- Id Semester Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_SEMESTER', 'Id Semester:') !!}
    {!! Form::select('ID_SEMESTER', $semester, null, ['class' => 'form-control form-select2']) !!}
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
