<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h4><strong>Data Mapel & Murid</strong></h4>
            </div>
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td>NIS Murid</td>
                        <td>:</td>
                        <td>{{ $nilai->NIS }}</td>
                    </tr>
                    <tr>
                        <td>Nama Murid</td>
                        <td>:</td>
                        <td>{{ $nilai->murid->NAMA }}</td>
                    </tr>
                    <tr>
                        <td>Kode Mapel</td>
                        <td>:</td>
                        <td>{{ $nilai->pengampu->mataPelajaran->KODE_MAPEL }}</td>
                    </tr>
                    <tr>
                        <td>Nama Mapel</td>
                        <td>:</td>
                        <td>{{ $nilai->pengampu->mataPelajaran->NAMA }}</td>
                    </tr>
                    <tr>
                        <td>Nama Guru Pengampu</td>
                        <td>:</td>
                        <td>{{ $nilai->pengampu->guru->GELAR_DEPAN . ' ' . $nilai->pengampu->guru->NAMA . ' ' . $nilai->pengampu->guru->GELAR_BELAKANG }}</td>
                    </tr>
                    <tr>
                        <td>KKM</td>
                        <td>:</td>
                        <td>{{ $nilai->pengampu->KKM }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h4><strong>Form Nilai</strong></h4>
            </div>
            <div class="box-body">
                <!-- Nis Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('NIS', 'Nis:') !!}
                    {!! Form::text('NIS', null, ['class' => 'form-control', 'readonly']) !!}
                </div>
                
                <!-- Nilai Uts Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('NILAI_UTS', 'Nilai Uts:') !!}
                    {!! Form::number('NILAI_UTS', null, ['class' => 'form-control']) !!}
                </div>
                
                <!-- Nilai Uas Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('NILAI_UAS', 'Nilai Uas:') !!}
                    {!! Form::number('NILAI_UAS', null, ['class' => 'form-control', $nilai->NILAI_UAS == '' ? 'readonly' : '']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('nilaiAkademiks.index') !!}" class="btn btn-default">Cancel</a>
</div>