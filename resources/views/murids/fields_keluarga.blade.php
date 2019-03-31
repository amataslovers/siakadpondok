<div class="panel-group">
    <div class="panel panel-primary">
        <a data-toggle="collapse" href="#collapse1"><div class="panel-heading">
            <h4 class="panel-title">Keluarga Murid Baru</h4>
        </div></a>
        <div id="collapse1" class="panel-collapse collapse">
            <div class="row panel-body">
                <div class="col-md-12">
                    <!-- Jenis Keluarga Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('ID_JENIS_KELUARGA', 'Jenis:') !!}
                        {!! Form::select('ID_JENIS_KELUARGA', $dataJenisKeluarga, null, ['class' => 'form-control form-select2', 'autocomplete' => 'off']) !!}
                    </div>

                    <!-- Id Agama Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('ID_AGAMA_KELUARGA', 'Id Agama:') !!}
                        {!! Form::select('ID_AGAMA_KELUARGA', $agama, null, ['class' => 'form-control form-select2', 'autocomplete' => 'off']) !!}
                    </div>

                    <!-- Nama Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('NAMA_KELUARGA', 'Nama:') !!}
                        {!! Form::text('NAMA_KELUARGA', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                    </div>

                    <!-- Tanggal Lahir Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('TANGGAL_LAHIR_KELUARGA', 'Tanggal Lahir:') !!}
                        {!! Form::text('TANGGAL_LAHIR_KELUARGA', null, ['class' => 'form-control tanggal', 'autocomplete' => 'off']) !!}
                    </div>

                    <!-- Tempat Lahir Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('TEMPAT_LAHIR_KELUARGA', 'Tempat Lahir:') !!}
                        {!! Form::text('TEMPAT_LAHIR_KELUARGA', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                    </div>

                    <!-- Email Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('EMAIL_KELUARGA', 'Email:') !!}
                        {!! Form::email('EMAIL_KELUARGA', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                    </div>

                    <!-- Notelp Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('NOTELP_KELUARGA', 'Notelp:') !!}
                        {!! Form::text('NOTELP_KELUARGA', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                    </div>

                    <!-- Pekerjaan Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('PEKERJAAN_KELUARGA', 'Pekerjaan:') !!}
                        {!! Form::text('PEKERJAAN_KELUARGA', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                    </div>

                    <!-- Alamat Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('ALAMAT_KELUARGA', 'Alamat:') !!}
                        {!! Form::textarea('ALAMAT_KELUARGA', null, ['class' => 'form-control', 'autocomplete' => 'off', 'rows' => '3']) !!}
                    </div>
                    <div class="clearfix"></div>

                    <button type="button" class="btn btn-primary" id="btn-tambah-keluarga">Tambah Keluarga</button>
                </div>
            </div>
            <div class="form-group panel-footer">
                
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <a data-toggle="collapse" href="#collapse2"><div class="panel-heading">
            <h4 class="panel-title">Keluarga Murid Yang Sudah Ada</h4>
        </div></a>
        <div id="collapse2" class="panel-collapse collapse">
            <div class="row panel-body">
                <div class="col-md-12">
                    <!-- Jenis Keluarga Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('ID_KELUARGA_MURID', 'Keluarga:') !!}
                        {!! Form::select('ID_KELUARGA_MURID', $dataKeluargaAll, null, ['class' => 'form-control form-select2', 'autocomplete' => 'off']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        <button type="button" class="btn btn-primary" id="btn-tambah-keluarga-ygada">Tambah Keluarga</button>
                    </div>

                </div>
            </div>
            <div class="form-group panel-footer">
                
            </div>
        </div>
    </div>

    <div class="card card-primary">
        <table class="table table-responsive" style="width: 100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Jenis</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Email</th>
                    <th>Pekerjaan</th>
                    <th>#</th>
                </tr>
            </thead>
            {{-- <tbody id="daftar-keluarga-ada">
                @if (isset($murid))
                    @foreach ($murid->keluargaMurid as $key => $item)
                        <tr id="row-{{$key}}">
                            <td>
                                <i class="fa fa-circle-o" aria-hidden="true"></i>
                                {!! Form::hidden('_id_keluarga_murid', $item->ID_KELUARGA_MURID, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                            </td>
                            <td>{{ $item->jenisKeluarga->NAMA }}</td>
                            <td>{{ $item->NAMA }}</td>
                            <td>{{ $item->TANGGAL_LAHIR }}</td>
                            <td>{{ $item->TEMPAT_LAHIR }}</td>
                            <td>{{ $item->agama->NAMA }}</td>
                            <td>{{ $item->ALAMAT }}</td>
                            <td>{{ $item->NOTELP }}</td>
                            <td>{{ $item->EMAIL }}</td>
                            <td>{{ $item->PEKERJAAN }}</td>
                            <td><button type="button" class="btn btn-danger" onclick="deleteKeluarga({{$item->ID_KELUARGA_MURID}}, {{$murid->NIS}}, 'row-{{$key}}')"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></button></td>
                        </tr>
                    @endforeach
                @endif
            </tbody> --}}
            <tbody id="daftar-keluarga">
                
            </tbody>
        </table>
    </div>
    <br>
    <br>
</div>