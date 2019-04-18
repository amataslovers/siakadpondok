<!-- Id History Kelas Field -->
<div class="form-group col-sm-9">
    {!! Form::label('ID_HISTORY_KELAS', 'NIS | Nama | Kelas | Semester :') !!}
    {!! Form::select('ID_HISTORY_KELAS', $murid, null, ['class' => 'form-control form-select2', 'required']) !!}
</div>

<!-- Bulan  Field -->
<div class="form-group col-sm-3">
    {!! Form::label('BULAN', 'Bulan :') !!}
    {!! Form::text('BULAN', null, ['class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
</div>

<!-- Tanggal Bayar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TANGGAL_BAYAR', 'Tanggal Bayar:') !!}
    {!! Form::text('TANGGAL_BAYAR', null, ['class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
</div>

<!-- Total Bayar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TOTAL_BAYAR', 'Bayar:') !!}
    {!! Form::number('TOTAL_BAYAR', null, ['class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('KETERANGAN', 'Keterangan:') !!}
    {!! Form::textarea('KETERANGAN', null, ['class' => 'form-control', 'rows' => 2]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('catatanSpps.index') !!}" class="btn btn-default">Cancel</a>
</div>
