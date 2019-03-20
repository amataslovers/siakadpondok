{!! Form::open(['route' => 'form-isi-nilai-karakter']) !!}

    <!-- Id Kelas Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('ID_KELAS', 'Kelas:') !!}
        {!! Form::select('ID_KELAS', $kelas, null, ['class' => 'form-control form-select2']) !!}
    </div>
    
    <!-- Id Semester Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('ID_SEMESTER', 'Semester:') !!}
        {!! Form::select('ID_SEMESTER', $semester, null, ['class' => 'form-control form-select2']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>

{!! Form::close() !!}