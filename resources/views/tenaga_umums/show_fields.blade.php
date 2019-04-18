<table class="table">
    <tr>
        <td><strong>NIP</strong></td>
        <td>:</td>
        <td>{{ $tenagaUmum->NIP }}</td>
    </tr>
    <tr>
        <td><strong>Nama</strong></td>
        <td>:</td>
        <td>{{ $tenagaUmum->NAMA }}</td>
    </tr>
    <tr>
        <td><strong>Agama</strong></td>
        <td>:</td>
        <td>{{ $tenagaUmum->agama->NAMA }}</td>
    </tr>
    <tr>
        <td><strong>Jenis Kelamin</strong></td>
        <td>:</td>
        <td>{{ $tenagaUmum->JENIS_KELAMIN }}</td>
    </tr>
    <tr>
        <td><strong>Tempat Lahir</strong></td>
        <td>:</td>
        <td>{{ $tenagaUmum->TEMPAT_LAHIR }}</td>
    </tr>
    <tr>
        <td><strong>Tanggal Lahir</strong></td>
        <td>:</td>
        <td>{{ $tenagaUmum->TANGGAL_LAHIR }}</td>
    </tr>
    <tr>
        <td><strong>Alamat</strong></td>
        <td>:</td>
        <td>{{ $tenagaUmum->ALAMAT }}</td>
    </tr>
    <tr>
        <td><strong>No Telepon</strong></td>
        <td>:</td>
        <td>{{ $tenagaUmum->NOTELP }}</td>
    </tr>
    <tr>
        <td><strong>Email</strong></td>
        <td>:</td>
        <td>{{ $tenagaUmum->EMAIL }}</td>
    </tr>
    <tr>
        <td><strong>Foto</strong></td>
        <td>:</td>
        <td>
            @if ($tenagaUmum->FOTO)
                <img src="{!! asset('/upload/profile/'. $tenagaUmum->FOTO) !!}" width="200px" height="250px">
            @endif
        </td>
    </tr>
</table>