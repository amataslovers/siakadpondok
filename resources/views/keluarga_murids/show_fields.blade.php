<!-- Id Jenis Keluarga Field -->
<div class="form-group">
    {!! Form::label('ID_JENIS_KELUARGA', 'Hubungan Keluarga:') !!}
    <p>{!! $keluargaMurid->jenisKeluarga->NAMA !!}</p>
</div>

<!-- Id Agama Field -->
<div class="form-group">
    {!! Form::label('ID_AGAMA', 'Agama:') !!}
    <p>{!! $keluargaMurid->agama->NAMA !!}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('NAMA', 'Nama:') !!}
    <p>{!! $keluargaMurid->NAMA !!}</p>
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group">
    {!! Form::label('TANGGAL_LAHIR', 'Tanggal Lahir:') !!}
    <p>{!! $keluargaMurid->TANGGAL_LAHIR !!}</p>
</div>

<!-- Tempat Lahir Field -->
<div class="form-group">
    {!! Form::label('TEMPAT_LAHIR', 'Tempat Lahir:') !!}
    <p>{!! $keluargaMurid->TEMPAT_LAHIR !!}</p>
</div>

<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('ALAMAT', 'Alamat:') !!}
    <p>{!! $keluargaMurid->ALAMAT !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('EMAIL', 'Email:') !!}
    <p>{!! $keluargaMurid->EMAIL !!}</p>
</div>

<!-- Notelp Field -->
<div class="form-group">
    {!! Form::label('NOTELP', 'Notelp:') !!}
    <p>{!! $keluargaMurid->NOTELP !!}</p>
</div>

<!-- Pekerjaan Field -->
<div class="form-group">
    {!! Form::label('PEKERJAAN', 'Pekerjaan:') !!}
    <p>{!! $keluargaMurid->PEKERJAAN !!}</p>
</div>
