<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
            <h4><strong>Data Pribadi Murid</strong></h4>
        </div>
        <div class="box-body">
            <!-- NIS Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('NIS', 'NIS:') !!}
                {!! Form::text('NIS', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>

            <!-- NIK Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('NIK', 'NIK:') !!}
                {!! Form::text('NIK', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>
            
            <!-- Nama Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('NAMA', 'Nama:') !!}
                {!! Form::text('NAMA', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>
            
            <!-- Nama Arab Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('NAMA_ARAB', 'Nama Arab:') !!}
                {!! Form::text('NAMA_ARAB', null, ['class' => 'form-control']) !!}
            </div>
            
            <!-- Id Agama Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('ID_AGAMA', 'Agama:') !!}
                {!! Form::select('ID_AGAMA', $agama, null, ['class' => 'form-control']) !!}
            </div>

            <!-- Jenis Kelamin Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('JENIS_KELAMIN', 'Jenis Kelamin:') !!}
                {!! Form::select('JENIS_KELAMIN', ['L' => 'Laki-laki', 'P' => 'Perempuan'], null, ['class' => 'form-control']) !!}
            </div>

            <!-- Tempat Lahir Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('TEMPAT_LAHIR', 'Tempat Lahir:') !!}
                {!! Form::text('TEMPAT_LAHIR', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>

            <!-- Tanggal Lahir Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('TANGGAL_LAHIR', 'Tanggal Lahir:') !!}
                {!! Form::text('TANGGAL_LAHIR', null, ['class' => 'form-control tanggal', 'autocomplete'=> 'off']) !!}
            </div>

            <!-- Alamat Field -->
            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('ALAMAT', 'Alamat:') !!}
                {!! Form::textarea('ALAMAT', null, ['class' => 'form-control', 'rows' => 2]) !!}
            </div>

            <!-- Email Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('EMAIL', 'Email:') !!}
                {!! Form::email('EMAIL', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>

            <!-- Notelp Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('NOTELP', 'No Telepon:') !!}
                {!! Form::text('NOTELP', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>

            <!-- Tanggal Masuk Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('TANGGAL_MASUK', 'Tanggal Masuk:') !!}
                {!! Form::text('TANGGAL_MASUK', null, ['class' => 'form-control tanggal', 'autocomplete' => 'off']) !!}
            </div>
            
            <!-- Tanggal Keluar Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('TANGGAL_KELUAR', 'Tanggal Keluar:') !!}
                {!! Form::text('TANGGAL_KELUAR', null, ['class' => 'form-control tanggal', 'autocomplete' => 'off']) !!}
            </div>
            
            <!-- Angkatan Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('ANGKATAN', 'Angkatan:') !!}
                {!! Form::text('ANGKATAN', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>
            
            <!-- Status Aktif Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('STATUS_AKTIF', 'Status Aktif:') !!}
                {!! Form::select('STATUS_AKTIF', ['1' => 'Aktif', '0' => 'NonAktif'] , null, ['class' => 'form-control']) !!}
            </div>

            <!-- Foto Akte Lahir Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('FOTO_AKTE_LAHIR', 'Foto Akte Lahir:') !!}
                {!! Form::file('FOTO_AKTE_LAHIR') !!}
                @if(isset($murid) && !empty($murid->FOTO_AKTE_LAHIR))
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#picAkteLahir">
                    Lihat Akte Lahir
                    </button>
                @endif
            </div>
            
            <!-- Foto Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('FOTO', 'Foto Murid:') !!}
                {!! Form::file('FOTO') !!}
                @if(isset($murid) && !empty($murid->FOTO))
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#picFoto">
                    Lihat Foto Profile
                    </button>
                @endif
            </div>
            
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
            <h4><strong>Data Asal Sekolah</strong></h4>
        </div>
        <div class="box-body">
            <!-- Nama Asal Sekolah Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('NAMA_ASAL_SEKOLAH', 'Nama Asal Sekolah:') !!}
                {!! Form::text('NAMA_ASAL_SEKOLAH', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>

            <!-- Alamat Asal Sekolah Field -->
            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('ALAMAT_ASAL_SEKOLAH', 'Alamat Asal Sekolah:') !!}
                {!! Form::textarea('ALAMAT_ASAL_SEKOLAH', null, ['class' => 'form-control', 'rows' => 2]) !!}
            </div>

            <!-- Ijazah Sd Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('IJAZAH_SD', 'Ijazah Sd:') !!}
                {!! Form::file('IJAZAH_SD') !!}
                @if(isset($murid) && !empty($murid->IJAZAH_SD))
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#picIjazahSd">
                    Lihat Ijazah SD
                    </button>
                @endif
            </div>

            <!-- Ijazah Smp Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('IJAZAH_SMP', 'Ijazah Smp:') !!}
                {!! Form::file('IJAZAH_SMP') !!}
                @if(isset($murid) && !empty($murid->IJAZAH_SMP))
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#picIjazahSmp">
                    Lihat Ijazah SMP
                    </button>
                @endif
            </div>

            <!-- Ijazah Sma Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('IJAZAH_SMA', 'Ijazah Sma:') !!}
                {!! Form::file('IJAZAH_SMA') !!}
                @if(isset($murid) && !empty($murid->IJAZAH_SMA))
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#picIjazahSma">
                    Lihat Ijazah SMA
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>







@if(!empty($murid->IJAZAH_SD))
    <!-- Modal IJAZAH SD -->
    <div class="modal fade" id="picIjazahSd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body text-center">
                    <img src="{!! asset('/upload/ijazah_sd/'. $murid->IJAZAH_SD) !!}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif

@if(!empty($murid->IJAZAH_SMP))
    <!-- Modal IJAZAH SD -->
    <div class="modal fade" id="picIjazahSmp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ijazah SMP</h4>
                </div>
                <div class="modal-body text-center">
                    <img src="{!! asset('/upload/ijazah_smp/'. $murid->IJAZAH_SMP) !!}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif

@if(!empty($murid->IJAZAH_SMA))
    <!-- Modal IJAZAH SD -->
    <div class="modal fade" id="picIjazahSma" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ijazah SMA</h4>
                </div>
                <div class="modal-body text-center">
                    <img src="{!! asset('/upload/ijazah_sma/'. $murid->IJAZAH_SMA) !!}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif

@if(!empty($murid->FOTO_AKTE_LAHIR))
    <!-- Modal IJAZAH SD -->
    <div class="modal fade" id="picAkteLahir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Akte Lahir</h4>
                </div>
                <div class="modal-body text-center">
                    <img src="{!! asset('/upload/akte_lahir/'. $murid->FOTO_AKTE_LAHIR) !!}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif

@if(!empty($murid->FOTO))
    <!-- Modal IJAZAH SD -->
    <div class="modal fade" id="picFoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Foto Profile</h4>
                </div>
                <div class="modal-body text-center">
                    <img src="{!! asset('/upload/profile/'. $murid->FOTO) !!}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif