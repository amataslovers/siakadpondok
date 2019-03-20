@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Murid
        </h1>
    </section>
    <div class="content">
            @include('adminlte-templates::common.errors')
            {!! Form::model($murid, ['route' => ['murids.update', $murid->NIS], 'method' => 'patch', 'files' => true]) !!}
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">
                            @include('murids.fields')
                            @include('murids.fields_button_submit')
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
@endsection

@section('scripts')
    <script>
        var hapusKeluarga;
        var keluarga = [];

        $(document).ready(function(){
            $('.tanggal').datepicker({
               autoclose : true,
               format: 'dd/mm/yyyy'
            });

            $('#ANGKATAN').datepicker({
               autoclose : true,
               minViewMode: 2,
               format: 'yyyy'
            });
            
            $('.form-select2').select2({
                width : '100%'
            });

            var i = 1;

            $('#btn-tambah-keluarga').on('click', function(e){

                if ($('#ID_JENIS_KELUARGA').val() !== '' && $('#ID_AGAMA_KELUARGA').val() !== '' && $('#NAMA_KELUARGA').val() !== '' && $('#TANGGAL_LAHIR_KELUARGA').val() !== '' && $('#NOTELP_KELUARGA').val() !== '' && $('#ALAMAT_KELUARGA').val() !== '') {

                    inputArray();
                    tampilData();

                    e.preventDefault();
                }else {
                    alert("Harap Isi Hubungan, Nama, Agama, Tanggal Lahir, No Telp dan Alamat");
                }

                
            });

            function tampilData() {
                $('#daftar-keluarga').empty();

                for (var i = 0; i < keluarga.length; i++) {
                    
                    $('#daftar-keluarga').append(
                        '<tr>' +
                            '<td>'+(i+1)+'</td>'+
                            '<td> ' + 
                                '<input type="hidden" readonly class="form-control" name="_jenis_keluarga_id[]" value="'+keluarga[i]['idJenis']+'">'+
                                '<input type="text" readonly class="form-control" name="_jenis_keluarga_nama[]" value="'+keluarga[i]['namaJenis']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<input type="text" readonly class="form-control" name="_nama[]" value="'+keluarga[i]['nama']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<input type="text" readonly class="form-control" name="_tempat_lahir[]" value="'+keluarga[i]['tempatLahir']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<input type="text" readonly class="form-control" name="_tanggal_lahir[]" value="'+keluarga[i]['tanggalLahir']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<input type="hidden" readonly class="form-control" name="_agama_id[]" value="'+keluarga[i]['idAgama']+'">'+
                                '<input type="text" readonly class="form-control" name="_agama_nama[]" value="'+keluarga[i]['namaAgama']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<input type="text" readonly class="form-control" name="_alamat[]" value="'+keluarga[i]['alamat']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<input type="text" readonly class="form-control" name="_notelp[]" value="'+keluarga[i]['notelp']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<input type="text" readonly class="form-control" name="_email[]" value="'+keluarga[i]['email']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<input type="text" readonly class="form-control" name="_pekerjaan[]" value="'+keluarga[i]['pekerjaan']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<button type="button" onclick="hapusKeluarga('+(i-1)+')"  class="glyphicon glyphicon-trash">'+i+'</button>'+
                            '</td>'+
                        '</tr>');
                }
                    $('#NAMA_KELUARGA').val('');
                    $('#TEMPAT_LAHIR_KELUARGA').val('');
                    $('#TANGGAL_LAHIR_KELUARGA').val('');
                    $('#EMAIL_KELUARGA').val('');
                    $('#PEKERJAAN_KELUARGA').val('');
                    $('#ALAMAT_KELUARGA').val('');
                    $('#NOTELP_KELUARGA').val('');
                    $('#ID_JENIS_KELUARGA').val(null).trigger('change');
                    $('#ID_AGAMA_KELUARGA').val(null).trigger('change');
            }

            hapusKeluarga = function(index) {
                keluarga.splice(index, 1);
                tampilData();
            }


            function inputArray() {
                var keluarga_murid = {
                    idJenis: $('#ID_JENIS_KELUARGA').val(),
                    namaJenis: $('#ID_JENIS_KELUARGA option:selected').text(),
                    nama: $('#NAMA_KELUARGA').val(),
                    tempatLahir: $('#TEMPAT_LAHIR_KELUARGA').val(),
                    tanggalLahir: $('#TANGGAL_LAHIR_KELUARGA').val(),
                    idAgama: $('#ID_AGAMA_KELUARGA').val(),
                    namaAgama: $('#ID_AGAMA_KELUARGA option:selected').text(),
                    alamat: $('#ALAMAT_KELUARGA').val(),
                    notelp: $('#NOTELP_KELUARGA').val(),
                    email: $('#EMAIL_KELUARGA').val(),
                    pekerjaan: $('#PEKERJAAN_KELUARGA').val()
                };
                return keluarga.push(keluarga_murid);
            }
        });
    </script>
@endsection
