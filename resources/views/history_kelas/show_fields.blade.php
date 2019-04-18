<!-- Nis Field -->
<div class="form-group">
    {!! Form::label('NIS', 'Nis:') !!}
    <p>{!! $historyKelas->NIS !!}</p>
</div>

<div class="form-group">
    {!! Form::label('NIS', 'Nama:') !!}
    <p>{!! $historyKelas->murid->NAMA !!}</p>
</div>

<div class="form-group">
    {!! Form::label('NIS', 'Angkatan:') !!}
    <p>{!! $historyKelas->murid->ANGKATAN !!}</p>
</div>

<!-- Id Kelas Field -->
<div class="form-group">
    {!! Form::label('ID_KELAS', 'Kelas:') !!}
    <p>{!! $historyKelas->kelas->tingkat->TINGKAT !!} {!! $historyKelas->kelas->NAMA !!}</p>
</div>

<!-- Id Semester Field -->
<div class="form-group">
    {!! Form::label('ID_SEMESTER', 'Semester :') !!}
    <p>{!! $historyKelas->semester->SEMESTER !!}</p>
</div>

<!-- Id Semester Field -->
<div class="form-group">
    {!! Form::label('ID_SEMESTER', 'Tahun Ajaran :') !!}
    <p>{!! $historyKelas->semester->tahunAjaran->NAMA !!}</p>
</div>