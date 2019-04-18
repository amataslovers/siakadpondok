<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
            <h4><strong>Data Kelas</strong></h4>
        </div>
        <div class="box-body">
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $kelas->NAMA }}</td>
                </tr>
                <tr>
                    <td>Tingkat</td>
                    <td>:</td>
                    <td>{{ $kelas->tingkat->TINGKAT }}</td>
                </tr>
                <tr>
                    <td>Angkatan</td>
                    <td>:</td>
                    <td>{{ $kelas->TAHUN_ANGKATAN }}</td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td>:</td>
                    <td>{{ $kelas->tahunAjaran->NAMA }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
            <h4><strong>Wali Kelas</strong></h4>
        </div>
        <div class="box-body">
            <table class="table">
                <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td>{{ $kelas->NIP_GURU }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $kelas->guru->GELAR_DEPAN . ' ' . $kelas->guru->NAMA . ' ' . $kelas->guru->GELAR_BELAKANG }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>


