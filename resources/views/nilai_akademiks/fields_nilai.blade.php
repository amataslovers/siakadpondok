{!! Form::open(['route' => 'form-isi-nilai-akademik']) !!}

    <!-- Id Mata Pelajaran Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('ID_MATA_PELAJARAN', 'Mata Pelajaran:') !!}
        {!! Form::select('ID_MATA_PELAJARAN', $mapel, null, ['class' => 'form-control form-select2', 'placeholder' => 'Pilih Mapel', 'required']) !!}
    </div>
    
    <!-- Nip Guru Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('NIP_GURU', 'Guru:') !!}
        {!! Form::select('NIP_GURU', $guru, null, ['class' => 'form-control form-select2', 'required']) !!}
    </div>
    
    <!-- Id Semester Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('ID_SEMESTER', 'Semester:') !!}
        {!! Form::select('ID_SEMESTER', $semester, null, ['class' => 'form-control form-select2', 'placeholder' => 'Pilih Semester', 'required']) !!}
    </div>
    
    <!-- Id Kelas Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('ID_KELAS', 'Kelas:') !!}
        {!! Form::select('ID_KELAS', $kelas, null, ['class' => 'form-control form-select2', 'placeholder' => 'Pilih Kelas', 'required']) !!}
    </div>

    <!-- Id Kelas Field -->
    <div class="form-group col-sm-1">
        {!! Form::label('CAT', 'Jenis:') !!}
        {!! Form::select('CAT', [1 => 'UTS', 2 => 'UAS', 3 => 'UTS & UAS'], null, ['class' => 'form-control form-select2', 'required']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>

{!! Form::close() !!}