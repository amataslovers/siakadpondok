<!-- Id History Kelas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_HISTORY_KELAS', 'Id History Kelas:') !!}
    {!! Form::number('ID_HISTORY_KELAS', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Bayar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TANGGAL_BAYAR', 'Tanggal Bayar:') !!}
    {!! Form::date('TANGGAL_BAYAR', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Pembayaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('JENIS_PEMBAYARAN', 'Jenis Pembayaran:') !!}
    {!! Form::text('JENIS_PEMBAYARAN', null, ['class' => 'form-control']) !!}
</div>

<!-- No Referensi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NO_REFERENSI', 'No Referensi:') !!}
    {!! Form::text('NO_REFERENSI', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('KETERANGAN', 'Keterangan:') !!}
    {!! Form::textarea('KETERANGAN', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Bayar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TOTAL_BAYAR', 'Total Bayar:') !!}
    {!! Form::number('TOTAL_BAYAR', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('catatanSpps.index') !!}" class="btn btn-default">Cancel</a>
</div>
