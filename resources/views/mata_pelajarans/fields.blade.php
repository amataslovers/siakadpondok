<!-- Kode Mapel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('KODE_MAPEL', 'Kode Mapel:') !!}
    {!! Form::text('KODE_MAPEL', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA', 'Nama:') !!}
    {!! Form::text('NAMA', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Arab Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA_ARAB', 'Nama Arab:') !!}
    {!! Form::text('NAMA_ARAB', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('mataPelajarans.index') !!}" class="btn btn-default">Cancel</a>
</div>
