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
            font-family: DeJavu Sans, sans-serif;
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
<body>
<div>
    <div style="float: left; width: 70%;">
        <table class="tepi-utama-tabel" style="width: 100%;">
            <thead>
                <tr>
                    <td rowspan="2" colspan="2" class="text-center tepi-tabel" style="vertical-align : middle;">موضوع</td>
                    <td colspan="2" class="text-center tepi-tabel" style="vertical-align : middle;">Nilai</td>
                </tr>
                <tr>
                    <td  class="text-center tepi-tabel" style="vertical-align : middle;">Huruf</td>
                    <td  class="text-center tepi-tabel" style="vertical-align : middle;">Angka</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($murid->nilaiAkademik as $key => $item)
                    <tr>
                        <td class="tepi-tabel text-center">{{++$key}}</td>
                        <td class="tepi-tabel text-center">{{$item->pengampu->mataPelajaran->NAMA}}</td>
                        <td class="tepi-tabel text-center">{{$item->NILAI_UAS}}</td>
                        <td class="tepi-tabel text-center">{{$item->NILAI_UAS}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        
    <div style="float: right; width: 30%; position: absolute">
        <table style="width: 100%; empty-cells: show">
            <thead>
                <tr>
                    <td rowspan="2" class="text-center tepi-utama-tabel-karakter" style="vertical-align : middle;">Nilai Akademik</td>
                    <td colspan="2" class="text-center" style="vertical-align : middle;padding-top:32px"></td>
                </tr>
                <tr>
                    <td  class="text-center" style="vertical-align : middle;padding-top:32px"></td>
                    <td  class="text-center" style="vertical-align : middle;padding-top:32px"></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="tepi-tabel">Contoh Nilai</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="tepi-tabel">Contoh Nilai</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="tepi-tabel">Contoh Nilai</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="tepi-tabel">Contoh Nilai</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="tepi-tabel">Contoh Nilai</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="tepi-tabel">Contoh Nilai</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="tepi-tabel">Contoh Nilai</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="tepi-tabel">Contoh Nilai</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="tepi-tabel">Contoh Nilai</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="tepi-tabel">Contoh Nilai</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="tepi-tabel">Contoh Nilai</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="tepi-tabel">Contoh Nilai</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
        
        <!-- jQuery 3.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>