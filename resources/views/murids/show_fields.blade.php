<div class="row" style="padding-left: 20px">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h4><strong>Data Pribadi Murid</strong></h4>
            </div>
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td class="text-left"><strong>NIS</strong></td>
                        <td>:</td>
                        <td>{{ $murid->NIS }}</td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>NIK</strong></td>
                        <td>:</td>
                        <td>{{ $murid->NIK }}</td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Agama</strong></td>
                        <td>:</td>
                        <td>{{ $murid->agama->NAMA }}</td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Nama</strong></td>
                        <td>:</td>
                        <td>{{ $murid->NAMA }}</td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Nama</strong></td>
                        <td>:</td>
                        <td>{{ $murid->NAMA_ARAB }}</td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Jenis Kelamin</strong></td>
                        <td>:</td>
                        <td>{{ $murid->JENIS_KELAMIN }}</td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Tempat Lahir</strong></td>
                        <td>:</td>
                        <td>{{ $murid->TEMPAT_LAHIR }}</td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Tanggal Lahir</strong></td>
                        <td>:</td>
                        <td>{{ $murid->TANGGAL_LAHIR }}</td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Alamat</strong></td>
                        <td>:</td>
                        <td>{{ $murid->ALAMAT }}</td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Email</strong></td>
                        <td>:</td>
                        <td>{{ $murid->EMAIL }}</td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>No Telepon</strong></td>
                        <td>:</td>
                        <td>{{ $murid->NOTELP }}</td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Tanggal Masuk</strong></td>
                        <td>:</td>
                        <td>{{ $murid->TANGGAL_MASUK }}</td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Tanggal Keluar</strong></td>
                        <td>:</td>
                        <td>{{ $murid->TANGGAL_KELUAR }}</td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Angkatan</strong></td>
                        <td>:</td>
                        <td>{{ $murid->ANGKATAN }}</td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Status Aktif</strong></td>
                        <td>:</td>
                        <td>
                            @if ($murid->STATUS_AKTIF)
                                <span class="label label-success">Aktif</span>
                            @else
                                <span class="label label-danger">Non Aktif</span>
                            @endif    
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Foto Akte Lahir</strong></td>
                        <td>:</td>
                        <td>
                            @if(isset($murid) && !empty($murid->FOTO_AKTE_LAHIR))
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#picAkteLahir">
                                  Lihat Akte Lahir
                                </button>
                            @endif    
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Foto</strong></td>
                        <td>:</td>
                        <td>
                            @if(isset($murid) && !empty($murid->FOTO))
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#picFoto">
                                  Lihat Foto
                                </button>
                            @endif    
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h4><strong>Data Asal Sekolah</strong></h4>
            </div>
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td class="text-left"><strong>Nama</strong></td>
                        <td>:</td>
                        <td>{{ $murid->NAMA_ASAL_SEKOLAH }}</td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Alamat</strong></td>
                        <td>:</td>
                        <td>{{ $murid->ALAMAT_ASAL_SEKOLAH }}</td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Ijazah SD</strong></td>
                        <td>:</td>
                        <td>
                            @if(isset($murid) && !empty($murid->IJAZAH_SD))
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#picIjazahSd">
                                  Lihat Ijazah SD
                                </button>
                            @endif        
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Ijazah SMP</strong></td>
                        <td>:</td>
                        <td>
                            @if(isset($murid) && !empty($murid->IJAZAH_SMP))
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#picIjazahSmp">
                                  Lihat Ijazah SMP
                                </button>
                            @endif    
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Ijazah SMA</strong></td>
                        <td>:</td>
                        <td>
                            @if(isset($murid) && !empty($murid->IJAZAH_SMA))
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#picIjazahSma">
                                  Lihat Ijazah SMA
                                </button>
                            @endif    
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@if (!empty($murid->keluargaMurid))
    <div class="row" style="padding-left: 20px">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h4><strong>Daftar Keluarga Murid</strong></h4>
                </div>
                <div class="box-body">
                    @foreach ($murid->keluargaMurid as $item)
                        <table class="table">
                            <tr>
                                <td><strong>Hubungan</strong></td>
                                <td>:</td>
                                <td>{{$item->jenisKeluarga->NAMA}}</td>
                            </tr>
                            <tr>
                                <td><strong>Nama</strong></td>
                                <td>:</td>
                                <td>{{$item->NAMA}}</td>
                            </tr>
                            <tr>
                                <td><strong>Tempat Lahir</strong></td>
                                <td>:</td>
                                <td>{{$item->TEMPAT_LAHIR}}</td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal Lahir</strong></td>
                                <td>:</td>
                                <td>{{$item->TANGGAL_LAHIR}}</td>
                            </tr>
                            <tr>
                                <td><strong>Alamat</strong></td>
                                <td>:</td>
                                <td>{{$item->ALAMAT}}</td>
                            </tr>
                            <tr>
                                <td><strong>No Telepon</strong></td>
                                <td>:</td>
                                <td>{{$item->NOTELP}}</td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td>:</td>
                                <td>{{$item->EMAIL}}</td>
                            </tr>
                            <tr>
                                <td><strong>Pekerjaan</strong></td>
                                <td>:</td>
                                <td>{{$item->PEKERJAAN}}</td>
                            </tr>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif

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