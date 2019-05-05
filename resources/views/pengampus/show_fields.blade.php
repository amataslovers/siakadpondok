<table class="table table-responsive" style="width: 100%">
    <tbody>
        <tr>
            <td><strong>NIP Guru</strong></td>
            <td>:</td>
            <td>{{ $pengampu->guru->NIP_GURU }}</td>
        </tr>
        <tr>
            <td><strong>Nama Guru</strong></td>
            <td>:</td>
            <td>{{ $pengampu->guru->GELAR_DEPAN . '. ' . $pengampu->guru->NAMA . ' ' . $pengampu->guru->GELAR_BELAKANG }}</td>
        </tr>
        <tr>
            <td><strong>Nama Mapel</strong></td>
            <td>:</td>
            <td>{{ $pengampu->mataPelajaran->NAMA }}</td>
        </tr>
        <tr>
            <td><strong>KKM</strong></td>
            <td>:</td>
            <td>{{ $pengampu->KKM }}</td>
        </tr>
        <tr>
            <td><strong>Status KKM</strong></td>
            <td>:</td>
            <td>
                @if($pengampu->STATUS_KKM)
                    <span class="text-danger">(Wajib)</span>
                @else
                    <span>(Tidak Wajib)</span>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Kelas</strong></td>
            <td>:</td>
            <td>{{ $pengampu->kelas->tingkat->TINGKAT . ' ' . $pengampu->kelas->NAMA }}</td>
        </tr>
        <tr>
            <td><strong>Tahun Ajaran</strong></td>
            <td>:</td>
            <td>{{ $pengampu->tahunAjaran->NAMA }}</td>
        </tr>
        <tr>
            <td><strong>Hari</strong></td>
            <td>:</td>
            <td>{{ $pengampu->HARI }}</td>
        </tr>
        <tr>
            <td><strong>Jam</strong></td>
            <td>:</td>
            <td>{{ $pengampu->JAM }}</td>
        </tr>
    </tbody>
</table>

