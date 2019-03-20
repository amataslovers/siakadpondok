<!-- Id Tahun Ajaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_TAHUN_AJARAN', 'Id Tahun Ajaran:') !!}
    {!! Form::select('ID_TAHUN_AJARAN', $tahunAjaran, null, ['class' => 'form-control']) !!}
</div>

<!-- Semester Field -->
<div class="form-group col-sm-6">
    {!! Form::label('SEMESTER', 'Semester:') !!}
    {!! Form::number('SEMESTER', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('STATUS', 'Status:') !!}
    {!! Form::number('STATUS', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('semesters.index') !!}" class="btn btn-default">Cancel</a>
</div>
