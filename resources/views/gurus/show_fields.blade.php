<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h4><strong>Data Pribadi Guru</strong></h4>
            </div>
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td><strong>NIP</strong></td>
                        <td>:</td>
                        <td>{{ $guru->NIP_GURU }}</td>
                    </tr>
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td>:</td>
                        <td>{{ $guru->GELAR_DEPAN . ' ' . $guru->NAMA . ' ' . $guru->GELAR_BELAKANG }}</td>
                    </tr>
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td>:</td>
                        <td>{{ $guru->NAMA_ARAB }}</td>
                    </tr>
                    <tr>
                        <td><strong>Agama</strong></td>
                        <td>:</td>
                        <td>{{ $guru->agama->NAMA }}</td>
                    </tr>
                    <tr>
                        <td><strong>Jenis Kelamin</strong></td>
                        <td>:</td>
                        <td>{{ $guru->JENIS_KELAMIN }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tempat Lahir</strong></td>
                        <td>:</td>
                        <td>{{ $guru->TEMPAT_LAHIR }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Lahir</strong></td>
                        <td>:</td>
                        <td>{{ $guru->TANGGAL_LAHIR }}</td>
                    </tr>
                    <tr>
                        <td><strong>Alamat</strong></td>
                        <td>:</td>
                        <td>{{ $guru->ALAMAT }}</td>
                    </tr>
                    <tr>
                        <td><strong>No Telepon</strong></td>
                        <td>:</td>
                        <td>{{ $guru->NOTELP }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>:</td>
                        <td>{{ $guru->EMAIL }}</td>
                    </tr>
                    <tr>
                        <td><strong>Foto</strong></td>
                        <td>:</td>
                        <td>
                            @if ($guru->FOTO)
                                <img src="{!! asset('/upload/profile/'. $guru->FOTO) !!}" width="200px" height="250px">
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>