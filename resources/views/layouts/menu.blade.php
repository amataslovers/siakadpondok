<li class="treeview">
    <a href="#"><i class="fa fa-link"></i> <span>Murid</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('murids*') ? 'active' : '' }}">
            <a href="{!! route('murids.index') !!}"><i class="fa fa-edit"></i><span>Murids</span></a>
        </li>
        
        <li class="{{ Request::is('detailKeluargas*') ? 'active' : '' }}">
            <a href="{!! route('detailKeluargas.index') !!}"><i class="fa fa-edit"></i><span>Detail Keluargas</span></a>
        </li>

        <li class="{{ Request::is('historyKelas*') ? 'active' : '' }}">
            <a href="{!! route('historyKelas.index') !!}"><i class="fa fa-edit"></i><span>History Kelas</span></a>
        </li>

        <li class="{{ Request::is('keluargaMurids*') ? 'active' : '' }}">
            <a href="{!! route('keluargaMurids.index') !!}"><i class="fa fa-edit"></i><span>Keluarga Murids</span></a>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#"><i class="fa fa-link"></i> <span>Keperluan Tambahan</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('agamas*') ? 'active' : '' }}">
            <a href="{!! route('agamas.index') !!}"><i class="fa fa-edit"></i><span>Agamas</span></a>
        </li>

        <li class="{{ Request::is('semesters*') ? 'active' : '' }}">
            <a href="{!! route('semesters.index') !!}"><i class="fa fa-edit"></i><span>Semesters</span></a>
        </li>
        
        <li class="{{ Request::is('tahunAjarans*') ? 'active' : '' }}">
            <a href="{!! route('tahunAjarans.index') !!}"><i class="fa fa-edit"></i><span>Tahun Ajarans</span></a>
        </li>

        <li class="{{ Request::is('jenisKeluargas*') ? 'active' : '' }}">
            <a href="{!! route('jenisKeluargas.index') !!}"><i class="fa fa-edit"></i><span>Jenis Keluargas</span></a>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#"><i class="fa fa-link"></i> <span>Mata Pelajaran</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('mataPelajarans*') ? 'active' : '' }}">
            <a href="{!! route('mataPelajarans.index') !!}"><i class="fa fa-edit"></i><span>Mata Pelajarans</span></a>
        </li>

        <li class="{{ Request::is('pengampus*') ? 'active' : '' }}">
            <a href="{!! route('pengampus.index') !!}"><i class="fa fa-edit"></i><span>Pengampus</span></a>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#"><i class="fa fa-link"></i> <span>Kelas</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('kelas*') ? 'active' : '' }}">
            <a href="{!! route('kelas.index') !!}"><i class="fa fa-edit"></i><span>Kelas</span></a>
        </li>

        <li class="{{ Request::is('kenaikanKelas*') ? 'active' : '' }}">
            <a href="{!! route('index-kenaikan-kelas') !!}"><i class="fa fa-edit"></i><span>Kenaikan Kelas</span></a>
        </li>

        <li class="{{ Request::is('tengah-semester*') ? 'active' : '' }}">
            <a href="{!! route('index-tengah-semester') !!}"><i class="fa fa-edit"></i><span>Tengah Semester</span></a>
        </li>

        <li class="{{ Request::is('tingkats*') ? 'active' : '' }}">
            <a href="{!! route('tingkats.index') !!}"><i class="fa fa-edit"></i><span>Tingkat</span></a>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#"><i class="fa fa-link"></i> <span>Nilai</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('nilaiAkademiks*') ? 'active' : '' }}">
            <a href="{!! route('nilaiAkademiks.index') !!}"><i class="fa fa-edit"></i><span>Nilai Akademiks</span></a>
        </li>
        
        <li class="{{ Request::is('nilaiKarakters*') ? 'active' : '' }}">
            <a href="{!! route('nilaiKarakters.index') !!}"><i class="fa fa-edit"></i><span>Nilai Karakters</span></a>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#"><i class="fa fa-link"></i> <span>Kepegawaian</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('gurus*') ? 'active' : '' }}">
            <a href="{!! route('gurus.index') !!}"><i class="fa fa-edit"></i><span>Gurus</span></a>
        </li>

        <li class="{{ Request::is('tenagaUmums*') ? 'active' : '' }}">
            <a href="{!! route('tenagaUmums.index') !!}"><i class="fa fa-edit"></i><span>Tenaga Umums</span></a>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#"><i class="fa fa-link"></i> <span>Peraturan & Pelanggaran</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('pelanggaranMurids*') ? 'active' : '' }}">
            <a href="{!! route('pelanggaranMurids.index') !!}"><i class="fa fa-edit"></i><span>Pelanggaran Murids</span></a>
        </li>
        
        <li class="{{ Request::is('peraturans*') ? 'active' : '' }}">
            <a href="{!! route('peraturans.index') !!}"><i class="fa fa-edit"></i><span>Peraturans</span></a>
        </li>
        
        <li class="{{ Request::is('sanksis*') ? 'active' : '' }}">
            <a href="{!! route('sanksis.index') !!}"><i class="fa fa-edit"></i><span>Sanksis</span></a>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#"><i class="fa fa-link"></i> <span>Cetak</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('cetak/rapot*') ? 'active' : '' }}">
            <a href="{!! route('cetakRapotIndex') !!}"><i class="fa fa-edit"></i><span>Cetak Rapot</span></a>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#"><i class="fa fa-link"></i> <span>Keuangan</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('catatanSpps*') ? 'active' : '' }}">
            <a href="{!! route('catatanSpps.index') !!}"><i class="fa fa-edit"></i><span>Catatan Spps</span></a>
        </li>
    </ul>
</li>



