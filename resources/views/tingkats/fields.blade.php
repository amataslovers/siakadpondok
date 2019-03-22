<!-- Tingkat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TINGKAT', 'Tingkat:') !!}
    {!! Form::number('TINGKAT', null, ['class' => 'form-control']) !!}
</div>

<!-- Tingkat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('SETARA', 'Kesetaraan :') !!}
    {!! Form::number('SETARA', [1 => 'Ibtidaiyah', 2 => 'Tsanawiyah', 3 => 'Aliyah'] , null, ['class' => 'form-control', 'placeholder' => 'Pilih Kesetaraan']) !!}
</div>


<!-- Kode Lulus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('KODE_LULUS', 'Kode Lulus:') !!}
    {!! Form::number('KODE_LULUS',[0 => ' -------- ', 1 => 'Ibtidaiyah', 2 => 'Tsanawiyah', 3 => 'Aliyah'] null, ['class' => 'form-control', 'placeholder' => 'Pilih Tingkat Kelulusan']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tingkats.index') !!}" class="btn btn-default">Cancel</a>
</div>
