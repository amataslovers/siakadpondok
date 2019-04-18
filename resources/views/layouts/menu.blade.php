<li class="treeview {{ Request::is('murids*') || Request::is('detailKeluargas*') || Request::is('historyKelas*') || Request::is('keluargaMurids*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-child"></i> <span>Murid</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('murids*') ? 'active' : '' }}">
            <a href="{!! route('murids.index') !!}"><i class="fa fa-child"></i><span>Data Murid</span></a>
        </li>

        <li>
            <a href="{!! url('murids?status=0') !!}"><i class="fa fa-child"></i><span>Data Murid Nonaktif</span></a>
        </li>
        
        <li class="{{ Request::is('detailKeluargas*') ? 'active' : '' }}">
            <a href="{!! route('detailKeluargas.index') !!}"><i class="fa fa-columns"></i><span>Penghubung Keluarga Murid</span></a>
        </li>

        <li class="{{ Request::is('historyKelas*') ? 'active' : '' }}">
            <a href="{!! route('historyKelas.index') !!}"><i class="fa fa-history"></i><span>History Kelas Murid</span></a>
        </li>

        <li class="{{ Request::is('keluargaMurids*') ? 'active' : '' }}">
            <a href="{!! route('keluargaMurids.index') !!}"><i class="fa fa-users"></i><span>Keluarga Murid</span></a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is('mataPelajarans*') || Request::is('pengampus*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-book"></i> <span>Mata Pelajaran</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('mataPelajarans*') ? 'active' : '' }}">
            <a href="{!! route('mataPelajarans.index') !!}"><i class="fa fa-book"></i><span>Mata Pelajaran</span></a>
        </li>

        <li class="{{ Request::is('pengampus*') ? 'active' : '' }}">
            <a href="{!! route('pengampus.index') !!}"><i class="fa fa-book"></i><span>Pengampu</span></a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is('kelas*') || Request::is('kenaikanKelas*') || Request::is('tengah-semester*') || Request::is('tingkats*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-dot-circle-o"></i> <span>Kelas</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('kelas*') ? 'active' : '' }}">
            <a href="{!! route('kelas.index') !!}"><i class="fa fa-dot-circle-o"></i><span>Kelas</span></a>
        </li>

        <li class="{{ Request::is('kenaikanKelas*') ? 'active' : '' }}">
            <a href="{!! route('index-kenaikan-kelas') !!}"><i class="fa fa-square"></i><span>Kenaikan Kelas</span></a>
        </li>

        <li class="{{ Request::is('tengah-semester*') ? 'active' : '' }}">
            <a href="{!! route('index-tengah-semester') !!}"><i class="fa fa-square"></i><span>Tengah Semester</span></a>
        </li>

        <li class="{{ Request::is('tingkats*') ? 'active' : '' }}">
            <a href="{!! route('tingkats.index') !!}"><i class="fa fa-level-up"></i><span>Tingkat</span></a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is('nilaiAkademiks*') || Request::is('nilaiKarakters*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-list"></i> <span>Nilai</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('nilaiAkademiks*') ? 'active' : '' }}">
            <a href="{!! route('nilaiAkademiks.index') !!}"><i class="fa fa-list"></i><span>Nilai Akademik</span></a>
        </li>
        
        <li class="{{ Request::is('nilaiKarakters*') ? 'active' : '' }}">
            <a href="{!! route('nilaiKarakters.index') !!}"><i class="fa fa-list"></i><span>Nilai Karakter</span></a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is('gurus*') || Request::is('tenagaUmums*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-user-md"></i> <span>Kepegawaian</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('gurus*') ? 'active' : '' }}">
            <a href="{!! route('gurus.index') !!}"><i class="fa fa-user-md"></i><span>Guru</span></a>
        </li>

        <li class="{{ Request::is('tenagaUmums*') ? 'active' : '' }}">
            <a href="{!! route('tenagaUmums.index') !!}"><i class="fa fa-user-md"></i><span>Tenaga Umum</span></a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is('perizinanMurids*') || Request::is('pelanggaranMurids*') || Request::is('peraturans*') || Request::is('sanksis*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-clipboard"></i> <span>Perizinan & Pelanggaran</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('perizinanMurids*') ? 'active' : '' }}">
            <a href="{!! route('perizinanMurids.index') !!}"><i class="fa fa-clipboard"></i><span>Perizinan Murids</span></a>
        </li>

        <li class="{{ Request::is('pelanggaranMurids*') ? 'active' : '' }}">
            <a href="{!! route('pelanggaranMurids.index') !!}"><i class="fa fa-clipboard"></i><span>Pelanggaran Murid</span></a>
        </li>
        
        <li class="{{ Request::is('peraturans*') ? 'active' : '' }}">
            <a href="{!! route('peraturans.index') !!}"><i class="fa fa-clipboard"></i><span>Peraturan</span></a>
        </li>
        
        <li class="{{ Request::is('sanksis*') ? 'active' : '' }}">
            <a href="{!! route('sanksis.index') !!}"><i class="fa fa-clipboard"></i><span>Sanksi</span></a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is('cetak/rapot*') || Request::is('cetak/ijazah*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-print"></i> <span>Rapot / Ijazah</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('cetak/rapot*') ? 'active' : '' }}">
            <a href="{!! route('cetakRapotIndex') !!}"><i class="fa fa-print"></i><span>Cetak Rapot</span></a>
        </li>

        <li class="{{ Request::is('cetak/ijazah*') ? 'active' : '' }}">
            <a href="{!! route('cetakIjazahIndex') !!}"><i class="fa fa-print"></i><span>Cetak Ijazah</span></a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is('catatanSpps*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-money"></i> <span>Keuangan</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('catatanSpps*') ? 'active' : '' }}">
            <a href="{!! route('catatanSpps.index') !!}"><i class="fa fa-money"></i><span>Catatan Spp</span></a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is('agamas*') || Request::is('semesters*') || Request::is('tahunAjarans*') || Request::is('jenisKeluargas*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-plus-circle"></i> <span>Keperluan Tambahan</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('agamas*') ? 'active' : '' }}">
            <a href="{!! route('agamas.index') !!}"><i class="fa fa-star"></i><span> Agama</span></a>
        </li>

        <li class="{{ Request::is('semesters*') ? 'active' : '' }}">
            <a href="{!! route('semesters.index') !!}"><i class="fa fa-bookmark"></i><span>Semester</span></a>
        </li>
        
        <li class="{{ Request::is('tahunAjarans*') ? 'active' : '' }}">
            <a href="{!! route('tahunAjarans.index') !!}"><i class="fa fa-th-large"></i><span> Tahun Ajaran</span></a>
        </li>

        <li class="{{ Request::is('jenisKeluargas*') ? 'active' : '' }}">
            <a href="{!! route('jenisKeluargas.index') !!}"><i class="fa fa-bookmark-o"></i><span> Jenis Keluarga</span></a>
        </li>
    </ul>
</li>

