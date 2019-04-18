<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h4><strong>Data Kelas & Murid</strong></h4>
            </div>
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td>NIS Murid</td>
                        <td>:</td>
                        <td>{{ $nilaiKarakter->historyKelas->NIS }}</td>
                    </tr>
                    <tr>
                        <td>Nama Murid</td>
                        <td>:</td>
                        <td>{{ $nilaiKarakter->historyKelas->murid->NAMA }}</td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td>{{ $nilaiKarakter->historyKelas->kelas->tingkat->TINGKAT . ' ' . $nilaiKarakter->historyKelas->kelas->NAMA }}</td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td>:</td>
                        <td>{{ $nilaiKarakter->historyKelas->semester->SEMESTER . ' | ' . $nilaiKarakter->historyKelas->semester->tahunAjaran->NAMA }}</td>
                    </tr>
                </table>

                <div class="form-group col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{!! route('nilaiKarakters.index') !!}" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h4><strong>Form Nilai Karakter</strong></h4>
            </div>
            <div class="box-body">
                <table class="table table-responsive table-hover table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Ijin</th>
                            <th>Sakit</th>
                            <th>Alfa</th>
                            <th>Akhlaq</th>
                            <th>Kebersihan</th>
                            <th>Kerajinan</th>
                            <th>Ketekunan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-1">
                                {!! Form::number('IJIN', 1, ['class' => 'form-control', 'required']) !!}
                            </td>
                
                            <td class="col-md-1">
                                {!! Form::number('SAKIT', 1, ['class' => 'form-control', 'required']) !!}
                            </td>
                
                            <td class="col-md-1">
                                {!! Form::number('ALFA', 1, ['class' => 'form-control', 'required']) !!}
                            </td>
                
                            <td class="col-md-1">
                                {!! Form::select('AKHLAQ', [3 => 'Baik', 1 => 'Kurang', 2 => 'Cukup'] , NULL, ['class' => 'form-control', 'required']) !!}
                            </td>
                            
                            <td class="col-md-1">
                                {!! Form::select('KEBERSIHAN', [3 => 'Baik', 1 => 'Kurang', 2 => 'Cukup'] , NULL, ['class' => 'form-control', 'required']) !!}
                            </td>
                
                            <td class="col-md-1">
                                {!! Form::select('KERAJINAN', [3 => 'Baik', 1 => 'Kurang', 2 => 'Cukup'] , NULL, ['class' => 'form-control', 'required']) !!}
                            </td>
                
                            <td class="col-md-1">
                                {!! Form::select('KETEKUNAN', [3 => 'Baik', 1 => 'Kurang', 2 => 'Cukup'] , NULL, ['class' => 'form-control', 'required']) !!}
                            </td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


    