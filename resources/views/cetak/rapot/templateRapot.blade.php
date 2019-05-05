<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <title>{{$murid->murid->NAMA}}</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
        .tepi-tabel {
            border-left: 0;
            border-right: 0.01em solid black;
            border-top: 0;
            border-bottom: 0.01em solid black;
        },
        .tepi-utama-tabel{
            border-left: 0.01em solid black;
            border-right: 0;
            border-top: 0.01em solid black;
            border-bottom: 0;
            border-collapse: collapse;
        },
        .tepi-utama-tabel-karakter{
            border-left: 0;
            border-right: 0.01em solid black;
            border-top: 0.01em solid black;
            border-bottom: 0.01em solid black;
            border-collapse: collapse;
        },
        .tepi-tabel-karakter {
            border-left: 0.01em solid black;
            border-right: 0;
            border-top: 0;
            border-bottom: 0;
        },
    </style>
</head>
<body style="margin: 1cm 2cm 2cm 2cm">
    @php
        $digit = new \NumberFormatter("id", \NumberFormatter::SPELLOUT);
        $total = 0;
        foreach ($murid->nilaiAkademik as $key => $value) {
            $total += ( (float)$value->NILAI_UTS + (float)$value->NILAI_UAS ) / 2;
        }
        $rata2 = $total / $murid->nilaiAkademik->count('NILAI_UAS');
    @endphp
<div>
    <div class="row">
        <table style="width: 100%">
            <tr>
                <td style="width: 2cm">
                    <img src="{!! asset('upload/image/logo.jpg') !!}" style="width: 2.45cm; height: 2cm">
                </td>
                <td class="text-center" style="padding: 0%;vertical-align : middle;">
                        <span style="font-size: 12pt"><strong>PONDOK PESANTREN DARUN NASYI'IEN</strong></span><br>
                        <span style="font-size: 12pt"><u>Jl. Pandowo No. 20/132 Telp. )0341( 420557, Telp. / Fax. )0341( 426090 Lawang Jawa Timur Indonesia</u></span>
                </td>
            </tr>
        </table>
    </div>
    <div class="text-center row" style="font-size: 18pt;margin-top: 1cm"><strong>Buku Nilai</strong></div>
    <div class="row">
        <div style="font-size: 11pt">
            <table style="width: 100%">
                <tr>
                    <td class="text-capitalize"><strong>Nama : {{ strtolower($murid->murid->NAMA) }}</strong></td>
                    <td><strong>Tahun Ajaran : {{ $murid->semester->tahunAjaran->NAMA }}</strong></td>
                </tr>
                <tr>
                    <td><strong>
                        Kelas : {{ $murid->kelas->tingkat->TINGKAT }} 
                        <span>
                            @if ($murid->kelas->tingkat->SETARA == 1)
                                <span><s>Ibtidaiyah</s> / </span> 
                                <span>Tsanawiyah / </span> 
                                <span>Aliyah</span>
                                @elseif($murid->kelas->tingkat->SETARA == 2)
                                <span>Ibtidaiyah / </span>
                                <span><s>Tsanawiyah</s> / </span>
                                <span>Aliyah</span>
                                @else
                                <span>Ibtidaiyah / </span>
                                <span>Tsanawiyah / </span>
                                <span><s>Aliyah</s></span>
                                @endif
                        </span></strong>
                    </td>
                    <td><strong>Semester : {{ $murid->semester->SEMESTER }}</strong></td>
                </tr>
            </table>
        </div>
    </div>

    <div style="margin-top: 1cm">
        <div style="float: left; width: 70%;">
            <table class="tepi-utama-tabel" style="width: 100%;">
                <thead>
                    <tr>
                        <td rowspan="2" colspan="2" class="text-center tepi-tabel" style="vertical-align : middle;height: 40px"><strong>Mata Pelajaran</strong></td>
                        <td colspan="2" class="text-center tepi-tabel" style="vertical-align : middle;height: 40px"><strong>Nilai</strong></td>
                    </tr>
                    <tr>
                        <td  class="text-center tepi-tabel" style="vertical-align : middle;height: 40px"><strong>Angka</strong></td>
                        <td  class="text-center tepi-tabel" style="vertical-align : middle;"><strong>Huruf</strong></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($murid->nilaiAkademik as $key => $item)
                        @php
                            $nilai = ( (float)$item->NILAI_UTS + (float)$item->NILAI_UAS ) / 2;
                        @endphp
                        <tr>
                            <td class="tepi-tabel text-center" style="width: 5%; height: 40px">{{++$key}}</td>
                            <td class="tepi-tabel text-center"><strong>{{$item->pengampu->mataPelajaran->NAMA}}</strong></td>
                            <td class="tepi-tabel text-center" style="width: 10%">{{number_format($nilai, 2, ",", ".")}}</td>
                            <td class="tepi-tabel text-center text-capitalize" style="font-size: 10pt">{{$digit->format($nilai)}}</td>
                        </tr>
                        @if ($key == 10 && $murid->kelas->tingkat->SETARA == 3)
                            <tr>
                                <td class="tepi-tabel text-center" style="width: 5%; height: 40px"> </td>
                                <td class="tepi-tabel text-center"><strong> </strong></td>
                                <td class="tepi-tabel text-center" style="width: 10%"> </td>
                                <td class="tepi-tabel text-center text-capitalize" style="font-size: 10pt"> </td>
                            </tr>
                        @endif
                    @endforeach

                    <tr>
                        <td colspan="2" class="tepi-tabel text-center" style="height: 40px"><strong>Total</strong></td>
                        <td class="tepi-tabel text-center" style="height: 40px">{{ number_format($total, 2, ",", ".") }}</td>
                        <td class="tepi-tabel text-center text-capitalize" style="font-size: 10pt">{{ $digit->format(number_format($total, 2, ",", "")) }} </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="tepi-tabel text-center" style="height: 40px"><strong>Rata - rata</strong></td>
                        <td class="tepi-tabel text-center" style="height: 40px">{{ number_format($rata2, 2, ",", ".") }}</td>
                        <td class="tepi-tabel text-center text-capitalize" style="font-size: 10pt"> {{ $digit->format(number_format($rata2, 2, ",", "")) }} </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="tepi-tabel text-center" style="height: 40px;font-size: 10pt">
                            <table style="width: 100%">
                                <tr>
                                    <td class="text-left">Rangking : </td>
                                    <td class="text-center">{{ $rank }}</td>
                                    <td class="text-right"></td>
                                </tr>
                            </table>
                        </td>
                        <td class="tepi-tabel text-center" style="height: 40px"></td>
                        <td class="tepi-tabel text-center text-capitalize" style="font-size: 10pt">
                            <table style="width: 100%">
                                <tr>
                                    <td class="text-left">Dari : </td>
                                    <td class="text-center">{{ $totalMurid }}</td>
                                    <td class="text-right">Murid</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="tepi-tabel text-center" style="height: 40px;font-size: 10pt">
                            <table style="width: 100%">
                                <tr>
                                    <td class="text-left">
                                            @if ($murid->STATUS_NAIK || $murid->STATUS_NAIK == null)
                                            <span>Tidak Naik / </span>
                                            <span><s>Naik Kelas</s></span>
                                            @else
                                            <span><s>Tidak Naik / </s></span>
                                            <span>Naik Kelas</span>
                                            @endif </td>
                                    <td class="text-center"></td>
                                    <td class="text-right"></td>
                                </tr>
                            </table>
                        </td>
                        <td class="tepi-tabel text-center" style="height: 40px"></td>
                        <td class="tepi-tabel text-center text-capitalize" style="font-size: 10pt">
                            <table style="width: 100%">
                                <tr>
                                    <td class="text-left">Tanggal </td>
                                    <td class="text-center"></td>
                                    <td class="text-right"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
            
        <div style="float: right; width: 30%; position: absolute">
            <table style="width: 100%; empty-cells: show">
                    <thead>
                    <tr>
                        <td rowspan="2" class="text-center tepi-utama-tabel-karakter" style="vertical-align : middle;height: 32.4px"><strong>Nilai Akademik</strong></td>
                        <td colspan="2" class="text-center" style="vertical-align : middle;padding-top:25px;height: 32.4px"></td>
                    </tr>
                    <tr>
                        <td  class="text-center" style="vertical-align : middle;padding-top:25px;"></td>
                        <td  class="text-center" style="vertical-align : middle;padding-top:25px"></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tepi-tabel text-center" style="border-bottom: 0em;height: 40px">Akhlaq :</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="tepi-tabel text-center" style="height: 40px">
                            @if ($murid->nilaiKarakter->AKHLAQ == 1)
                            <span><s>Kurang</s> / </span>
                            <span>Cukup / </span>
                            <span>Baik</span>
                            @elseif($murid->nilaiKarakter->AKHLAQ == 2)
                            <span>Kurang / </span>
                            <span><s>Cukup</s> / </span>
                            <span>Baik</span>
                            @else
                            <span>Kurang / </span>
                            <span>Cukup / </span>
                            <span><s>Baik</s></span>
                            @endif
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="tepi-tabel text-center" style="border-bottom: 0em;height: 40px">Kerajinan</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="tepi-tabel text-center" style="height: 40px">
                            @if ($murid->nilaiKarakter->KERAJINAN == 1)
                            <span><s>Kurang</s> / </span>
                            <span>Cukup / </span>
                            <span>Baik</span>
                            @elseif($murid->nilaiKarakter->KERAJINAN == 2)
                            <span>Kurang / </span>
                            <span><s>Cukup</s> / </span>
                            <span>Baik</span>
                            @else
                            <span>Kurang / </span>
                            <span>Cukup / </span>
                            <span><s>Baik</s></span>
                            @endif
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="tepi-tabel text-center" style="border-bottom: 0em;height: 40px">Ketekunan</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="tepi-tabel text-center" style="height: 40px">
                            @if ($murid->nilaiKarakter->KETEKUNAN == 1)
                            <span><s>Kurang</s> / </span>
                            <span>Cukup / </span>
                            <span>Baik</span>
                            @elseif($murid->nilaiKarakter->KETEKUNAN == 2)
                            <span>Kurang / </span>
                            <span><s>Cukup</s> / </span>
                            <span>Baik</span>
                            @else
                            <span>Kurang / </span>
                            <span>Cukup / </span>
                            <span><s>Baik</s></span>
                            @endif
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="tepi-tabel text-center" style="border-bottom: 0em;height: 40px">Kebersihan</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="tepi-tabel text-center" style="height: 40px">
                            @if ($murid->nilaiKarakter->KEBERSIHAN == 1)
                            <span><s>Kurang</s> / </span>
                            <span>Cukup / </span>
                            <span>Baik</span>
                            @elseif($murid->nilaiKarakter->KEBERSIHAN == 2)
                            <span>Kurang / </span>
                            <span><s>Cukup</s> / </span>
                            <span>Baik</span>
                            @else
                            <span>Kurang / </span>
                            <span>Cukup / </span>
                            <span><s>Baik</s></span>
                            @endif
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="tepi-tabel text-center" style="border-bottom: 0em;height: 40px">Ketidakhadiran</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="tepi-tabel text-center" style="border-bottom: 0em;height: 40px">
                            <table style="width: 100%">
                                <tr>
                                    <td class="text-left">Sakit</td>
                                    <td class="text-center">{{ $murid->nilaiKarakter->SAKIT }}</td>
                                    <td class="text-right">Kali</td>
                                </tr>
                            </table>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="tepi-tabel text-center" style="border-bottom: 0em;height: 40px">
                            <table style="width: 100%">
                                <tr>
                                    <td class="text-left">Ijin</td>
                                    <td class="text-center">{{ $murid->nilaiKarakter->IJIN }}</td>
                                    <td class="text-right">Kali</td>
                                </tr>
                            </table>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="tepi-tabel text-center" style="height: 40px">
                            <table style="width: 100%">
                                <tr>
                                    <td class="text-left">Alfa</td>
                                    <td class="text-center">{{ $murid->nilaiKarakter->ALFA }}</td>
                                    <td class="text-right">Kali</td>
                                </tr>
                            </table>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="tepi-tabel text-center" style="border-bottom: 0em;height: 40px;vertical-align: text-top;border-left: 0.01em solid black">
                            Wali Kelas
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="tepi-tabel text-center" style="border-bottom: 0em;height: 40px;vertical-align: text-bottom;border-left: 0.01em solid black">
                            )...............(
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="tepi-tabel text-center" style="border-bottom: 0em;height: 40px;vertical-align: text-top;border-left: 0.01em solid black">
                            Wali Murid
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="tepi-tabel text-center" style="height: 40px;vertical-align: text-bottom;border-left: 0.01em solid black">
                            )...............(
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
        
<!-- jQuery 3.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>