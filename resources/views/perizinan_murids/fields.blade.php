<!-- Id History Kelas <span class="required">*</span> Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_HISTORY_KELAS', 'Nama Murid | Kelas | Semester:') !!}
    {!! Form::select('ID_HISTORY_KELAS', $murid, null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('JENIS', 'Jenis:') !!}
    {!! Form::text('JENIS', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('KETERANGAN', 'Keterangan:') !!}
    {!! Form::textarea('KETERANGAN', null, ['class' => 'form-control', 'rows' => 2]) !!}
</div>

<!-- Tanggal <span class="required">*</span> Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TANGGAL', 'Tanggal:') !!}
    {!! Form::text('TANGGAL', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Hari Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TOTAL_HARI', 'Total Hari:') !!}
    {!! Form::number('TOTAL_HARI', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('perizinanMurids.index') !!}" class="btn btn-default">Cancel</a>
</div>
