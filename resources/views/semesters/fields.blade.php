<!-- Id Tahun Ajaran Field -->
<div class="form-group col-sm-4">
    {!! Form::label('ID_TAHUN_AJARAN', 'Tahun Ajaran:') !!}
    {!! Form::select('ID_TAHUN_AJARAN', $tahunAjaran, null, ['class' => 'form-control']) !!}
</div>

<!-- Semester Field -->
<div class="form-group col-sm-4">
    {!! Form::label('SEMESTER', 'Semester:') !!}
    {!! Form::number('SEMESTER', 1, ['class' => 'form-control', 'readonly']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-4">
    {!! Form::label('STATUS', 'Status:') !!}
    {!! Form::select('STATUS', [1 => 'Aktif', 0 => 'NonAktif'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('semesters.index') !!}" class="btn btn-default">Cancel</a>
</div>
