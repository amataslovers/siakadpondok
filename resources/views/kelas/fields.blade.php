<!-- Nip Guru Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NIP_GURU', 'Nip Guru:') !!}
    {!! Form::select('NIP_GURU', $guru, null, ['class' => 'form-control form-select2']) !!}
</div>

<!-- Id Tingkat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_TINGKAT', 'Id Tingkat:') !!}
    {!! Form::select('ID_TINGKAT', $tingkat, null, ['class' => 'form-control form-select2']) !!}
</div>

<!-- Id Tahun Ajaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_TAHUN_AJARAN', 'Id Tahun Ajaran:') !!}
    {!! Form::select('ID_TAHUN_AJARAN', $tahun, null, ['class' => 'form-control form-select2']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA', 'Nama:') !!}
    {!! Form::text('NAMA', null, ['class' => 'form-control']) !!}
</div>

<!-- Angkatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TAHUN_ANGKATAN', 'Angkatan:') !!}
    {!! Form::text('TAHUN_ANGKATAN', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('STATUS', 'Status:') !!}
    {!! Form::select('STATUS', [1 => 'Aktif', 0 => 'Nonaktif'] , null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kelas.index') !!}" class="btn btn-default">Cancel</a>
</div>
