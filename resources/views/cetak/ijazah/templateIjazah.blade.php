<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    
    <title>{{$murid->murid->NAMA}}</title>
    <style>
        @page{
            margin:0px;
        }
        @font-face {
            font-family: 'Monotype';
            src: url('{{ storage_path('fonts/MonotypeCorsiva.ttf') }}') format("truetype");
            font-weight: 400;
            font-style: normal;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            @if($murid->kelas->tingkat->KODE_LULUS == 1)
                background-image: url("{{ asset('upload/image/ibtidaiyah.png')}}");
            @elseif($murid->kelas->tingkat->KODE_LULUS == 2)
                background-image: url("{{ asset('upload/image/tsanawiyah.png')}}");
            @elseif($murid->kelas->tingkat->KODE_LULUS == 3)
                background-image: url("{{ asset('upload/image/aliyah.png')}}");
            @endif
            background-repeat: no-repeat;
            background-size: cover;
        }
        .tepi-tabel {
            border-left: 0;
            border-right: 0.01em solid black;
            border-top: 0;
            border-bottom: 0.01em solid black;
        }
        .tepi-utama-tabel{
            border-right: 0;
            border-top: 0.01em solid black;
            border-bottom: 0;
            border-collapse: collapse;
        }
        div.font-ijazah{
            font-family: "Monotype Corsiva";
            font-style: italic;
        }
    </style>
    
</head>
<body>
    @php
        $digit = new \NumberFormatter("id", \NumberFormatter::SPELLOUT);
        $total = 0;
        foreach ($murid->nilaiAkademik as $key => $value) {
            $total += $value->NILAI_UAS;
        }
        $rata2 = $total / $murid->nilaiAkademik->count('NILAI_UAS');
    @endphp
<div style="padding: 2.8cm 3.6cm 3cm 3.1cm">
    <div class="row">
        <span><strong>No:</strong></span>
    </div>
    <div class="row">
        <div class="text-center">
            <div style="font-size: 12pt;"><strong>PONDOK PESANTREN</strong></div>
            <div style="font-size: 16pt"><strong>"DARUN NASYIIEN"</strong></div>
            <div><img src="{!! asset('upload/image/logo.png') !!}" style="width: 1.7cm;height: 1.7cm"></div>
            <div class="font-ijazah" style="font-size: 24pt"><u><strong>Ijazah</strong></u></div>
            <div style="font-size: 11pt"><strong>)SURAT TANDA TAMAT BELAJAR(</strong></div>
            <br>
            <div><strong>MADRASAH 
                @if($murid->kelas->tingkat->KODE_LULUS == 1)
                    IBTIDAIYAH
                @elseif($murid->kelas->tingkat->KODE_LULUS == 2)
                    TSANAWIYAH
                @elseif($murid->kelas->tingkat->KODE_LULUS == 3)
                    ALIYAH
                @endif
            </strong></div>
            <div><strong>)MADRASAH 
                    @if($murid->kelas->tingkat->KODE_LULUS == 1)
                        TINGKAT DASAR
                    @elseif($murid->kelas->tingkat->KODE_LULUS == 2)
                        MENENGAH TINGKAT PERTAMA
                    @elseif($murid->kelas->tingkat->KODE_LULUS == 3)
                        MENENGAH TINGKAT ATAS
                    @endif
                (</strong></div>
            <br>
            <div style="font-size: 11pt;text-indent: 1cm" class="text-justify"><strong>Yang bertanda tangan dibawah ini Kepala Madrasah 
                    @if($murid->kelas->tingkat->KODE_LULUS == 1)
                        Ibtidaiyah
                    @elseif($murid->kelas->tingkat->KODE_LULUS == 2)
                        Tsanawiyah
                    @elseif($murid->kelas->tingkat->KODE_LULUS == 3)
                        Aliyah
                    @endif
                 Swasta Pondok Pesantren "DARUN NASYIIEN" Lawang - Malang - Jawa Timur menerangkan bahwa :</strong></div>
            <br>
            <div class="font-ijazah text-capitalize" style="font-size: 18pt;margin-bottom: 0%">
                <strong>{{ strtolower($murid->murid->NAMA) }}</strong>
            </div>
            <hr style="width: 60%;height: 1px;background-color: black;margin-bottom: 0%;margin-top: 0%">
            <hr style="width: 60%;height: 3px;background-color: black;margin-top: 0%;margin-bottom: 0%">
            <hr style="width: 60%;height: 1px;background-color: black;margin-top: 0%">
            <div style="font-size: 11pt;">
                <div class="col-xs-3 text-left" style="padding-left: 0%">
                    <strong>lahir pada tanggal</strong>
                </div>
                <div class="col-xs-3 text-center" style="font-size: 14pt;">
                    <strong>{{ $tglLahir }}</strong>
                </div>
                <div class="col-xs-1">di</div>
                <div class="col-xs-3 text-center text-capitalize" style="font-size: 14pt;">
                    <strong>{{ strtolower($murid->murid->TEMPAT_LAHIR) }}</strong>
                </div>
            </div>
            <div style="font-size: 11pt;" class="text-justify">
                <strong>
                    telah memenuhi persyaratan dan dinyatakan : <span style="font-size: 16pt"> LULUS </span>
                </strong>
            </div>
            <div style="font-size: 11pt;text-indent: 1cm" class="text-justify">
                <strong>
                    Dalam mengikuti Evaluasi Belajar Tahap Akhir Madrasah 
                    @if($murid->kelas->tingkat->KODE_LULUS == 1)
                        Ibtidaiyah
                    @elseif($murid->kelas->tingkat->KODE_LULUS == 2)
                        Tsanawiyah
                    @elseif($murid->kelas->tingkat->KODE_LULUS == 3)
                        Aliyah
                    @endif
                 yang diselenggarakan Pondok Pesantren "DARUN NASYIIEN" pada tahun {{ $murid->semester->tahunAjaran->NAMA }}. Sehingga yang bersangkutan dinyatakan tamat belajar dan berhak memperoleh ijazah ini sesuai dengan keputusan hasil musyawarah Dewan Guru Pondok Pesantren "DARUN NASYIIEN" Kecamatan Lawang Kabupaten Malang Propinsi Jawa Timur - Indonesia.
                </strong>
            </div>
            <br>
            <div style="font-size: 11pt;text-indent: 1cm" class="text-justify">
                <strong>Pemegang ijazah ini terakhir tercatat sebagai siswa pada Madrasah 
                        @if($murid->kelas->tingkat->KODE_LULUS == 1)
                            Ibtidaiyah
                        @elseif($murid->kelas->tingkat->KODE_LULUS == 2)
                            Tsanawiyah
                        @elseif($murid->kelas->tingkat->KODE_LULUS == 3)
                            Aliyah
                        @endif
                     di Lawang - Malang - Jawa Timur dengan nomor induk : {{ $murid->murid->NIS }}</strong>
            </div>
        </div>
    </div>
    
    <div class="row" style="margin-top: 1cm">
        @php
            $digit = new \NumberFormatter("id", \NumberFormatter::SPELLOUT);
            $total = 0;
            foreach ($murid->nilaiAkademik as $key => $value) {
                $total += ( floatval($value->NILAI_UTS) + floatval($value->NILAI_UAS) ) / 2;
            }
            $rata2 = $total / $murid->nilaiAkademik->count('NILAI_UAS');
        @endphp

        <div class="col-xs-6">
            <table class="tepi-utama-tabel" style="width: 100%;">
                <thead>
                    <tr>
                        <td rowspan="2" class="text-center tepi-tabel" style="vertical-align : middle;width: 20px;border-left: 0.01em solid black;"><strong>No</strong></td>
                        <td rowspan="2" class="text-center tepi-tabel" style="vertical-align : middle;width: 50%"><strong>Bidang Studi</strong></td>
                        <td colspan="2" class="text-center tepi-tabel" style="vertical-align : middle;"><strong>Nilai</strong></td>
                    </tr>
                    <tr>
                        <td  class="text-center tepi-tabel" style="vertical-align : middle;"><strong>Angka</strong></td>
                        <td  class="text-center tepi-tabel" style="vertical-align : middle;"><strong>Huruf</strong></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($murid->nilaiAkademik as $key => $item)
                        @php
                            $nilai = ( floatval($item->NILAI_UTS) + floatval($item->NILAI_UAS) ) / 2;
                        @endphp
                        <tr>
                            <td class="tepi-tabel text-center" style="width: 20px;border-left: 0.01em solid black; ">{{++$key}}</td>
                            <td class="tepi-tabel text-left" style="padding-left: 10px"><strong>{{$item->pengampu->mataPelajaran->NAMA}}</strong></td>
                            <td class="tepi-tabel text-center" style="width: 10%">{{number_format($nilai, 2, ",", ".")}}</td>
                            <td class="tepi-tabel text-center text-capitalize" style="font-size: 10pt;">{{$digit->format($nilai)}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" class="text-right" style="padding-right: 20px;border: 0"><strong>Total</strong></td>
                        <td class="tepi-tabel text-center" style="border-left: 0.01em solid black">{{ number_format($total, 2, ",", ".") }}</td>
                        <td class="tepi-tabel text-center text-capitalize" style="font-size: 10pt">{{$digit->format(number_format($total, 2, ",", "."))}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-right" style="padding-right: 20px;border-left: 0;border-bottom: 0"><strong>Rata - rata</strong></td>
                        <td class="tepi-tabel text-center" style="border-left: 0.01em solid black">{{ number_format($rata2, 2, ",", ".") }}</td>
                        <td class="tepi-tabel text-center text-capitalize" style="font-size: 10pt">{{$digit->format(number_format($rata2, 2, ",", "."))}}</td>
                    </tr>
                </tbody>
            </table>
                
        </div>

        <div class="col-xs-6" style="padding-top: 1cm;">
            <div class="row text-center" style="border: 0.1em solid black; width: 3cm;height: 4cm;vertical-align: middle;margin-left: 0.1cm">
                <span>Pas Foto 3x4</span>
            </div>

            <div class="row" style="padding-top: 1cm">
                <span>Lawang, ................................ 20</span>
            </div>

            <div class="row" style="padding-top: 0.5cm;padding-left: 1.5cm">
                <span><strong>KEPALA MADRASAH</strong></span>
            </div>

            <div class="row text-center" style="padding-top: 2cm;padding-right: 2cm">
                <hr style="width: 100%;height: 3px;background-color: black;margin-top: 0%;margin-bottom: 0%;margin-left: 0.5cm;margin-right: 0.5cm">
                <hr style="width: 100%;height: 1px;background-color: black;margin-top: 0%;margin-right: 0.5cm;margin-left: 0.5cm">
            </div>
        </div>

    </div>
</div>
        
</body>
</html>