<!-- Tingkat Field -->
<div class="form-group">
    {!! Form::label('TINGKAT', 'Tingkat:') !!}
    <p>{!! $tingkat->TINGKAT !!}</p>
</div>

<!-- Tingkat Field -->
<div class="form-group">
    {!! Form::label('SETARA', 'Kesetaraan:') !!}
    <p> @if($tingkat->SETARA == 0) 
            -----
        @elseif($tingkat->SETARA == 1) 
            Ibtidaiyah
        @elseif($tingkat->SETARA == 2) 
            Tsanawiyah
        @elseif($tingkat->SETARA == 3) 
            Aliyah
        @endif</p>
</div>

<!-- Kode Lulus Field -->
<div class="form-group">
    {!! Form::label('KODE_LULUS', 'Kode Lulus:') !!}
    <p>@if($tingkat->KODE_LULUS == 0) 
            -----
        @elseif($tingkat->KODE_LULUS == 1) 
            Ibtidaiyah
        @elseif($tingkat->KODE_LULUS == 2) 
            Tsanawiyah
        @elseif($tingkat->KODE_LULUS == 3) 
            Aliyah
        @endif</p>
</div>
