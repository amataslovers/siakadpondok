<!-- Id Peraturan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_SANKSI', 'Sanksi:') !!}
    {!! Form::select('ID_SANKSI', $sanksi, null, ['class' => 'form-control form-select2', 'placeholder' => 'Sanksi', 'required']) !!}
</div>

<!-- Id Peraturan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_PERATURAN', 'Peraturan:') !!}
    {!! Form::select('ID_PERATURAN', ['' => 'Peraturan'], null, ['class' => 'form-control form-select2', 'required']) !!}
</div>

<!-- Id History Kelas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_HISTORY_KELAS', 'Nama Murid | Kelas | Semester:') !!}
    {!! Form::select('ID_HISTORY_KELAS', $murid, null, ['class' => 'form-control form-select2', 'placeholder' => 'Pilih Murid', 'required']) !!}
</div>

<!-- Tanggal Melanggar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TANGGAL_MELANGGAR', 'Tanggal Melanggar:') !!}
    {!! Form::text('TANGGAL_MELANGGAR', null, ['class' => 'form-control', 'required', 'autocomplete' => 'off', 'required']) !!}
</div>

<div class="form-group col-md-12" id="show-info">

</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('KETERANGAN', 'Keterangan:') !!}
    {!! Form::textarea('KETERANGAN', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pelanggaranMurids.index') !!}" class="btn btn-default">Cancel</a>
</div>
