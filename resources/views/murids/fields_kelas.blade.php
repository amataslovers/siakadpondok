<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
            <h4><strong>Masuk Kelas</strong></h4>
        </div>
        <div class="box-body">
                <!-- KELAS Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('ID_KELAS', 'Kelas:') !!}
                    {!! Form::select('ID_KELAS', $kelas, null , ['class' => 'form-control form-select2']) !!}
                </div>
        </div>
    </div>
</div>
