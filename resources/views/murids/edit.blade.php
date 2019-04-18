@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Form Edit Murid
        </h1>
    </section>
    <div class="content">
            @include('adminlte-templates::common.errors')
            {!! Form::model($murid, ['route' => ['murids.update', $murid->NIS], 'method' => 'patch', 'files' => true]) !!}
                {{-- <div class="box box-primary">
                    <div class="box-body">
                        <div class="row"> --}}
                            @include('murids.fields')
                        {{-- </div>
                    </div>
                </div> --}}

                <div class="box box-primary">
                    <div class="box-body">
                            @include('murids.fields_keluarga')
                            @include('murids.fields_button_submit')
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
            
            var dataKeluargaMurid = {!! json_encode($murid->keluargaMurid->toArray()) !!};
            if (dataKeluargaMurid != null) {
                inputArrayMurid();
                tampilData();
            }

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
                            '<td><i class="fa fa-circle-o" aria-hidden="true"></i></td>'+
                            '<td> ' + 
                                '<input type="hidden" readonly class="form-control" name="_id_keluarga_murid[]" value="'+keluarga[i]['idKeluargaMurid']+'">'+
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
                                '<button type="button" onclick="hapusKeluarga('+(i)+')"  class="glyphicon glyphicon-trash btn btn-danger"></button>'+
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

            function inputArrayMurid() {
                for (var i = 0; i < dataKeluargaMurid.length; i++) {
                    var keluarga_murid = {
                        idJenis: dataKeluargaMurid[i]['ID_JENIS_KELUARGA'],
                        namaJenis: dataKeluargaMurid[i].jenis_keluarga['NAMA'],
                        nama: dataKeluargaMurid[i]['NAMA'],
                        tempatLahir: dataKeluargaMurid[i]['TEMPAT_LAHIR'],
                        tanggalLahir: dataKeluargaMurid[i]['TANGGAL_LAHIR'],
                        idAgama: dataKeluargaMurid[i]['ID_AGAMA'],
                        namaAgama: dataKeluargaMurid[i].agama['NAMA'],
                        alamat: dataKeluargaMurid[i]['ALAMAT'],
                        notelp: dataKeluargaMurid[i]['NOTELP'],
                        email: dataKeluargaMurid[i]['EMAIL'],
                        pekerjaan: dataKeluargaMurid[i]['PEKERJAAN']
                    };
                    keluarga.push(keluarga_murid);
                }
            }

            $('#btn-tambah-keluarga-ygada').on('click', function(e){
                var id = $('#ID_KELUARGA_MURID').val();
                $.ajax({
                    type: 'GET',
                    url: '{{url('api/keluarga')}}/' + id
                }).then(function (data) {
                    var keluarga_murid = {
                        idKeluargaMurid: data.ID_KELUARGA_MURID,
                        idJenis: data.ID_JENIS_KELUARGA,
                        namaJenis: data.jenis_keluarga.NAMA,
                        nama: data.NAMA,
                        tempatLahir: data.TEMPAT_LAHIR,
                        tanggalLahir: data.TANGGAL_LAHIR,
                        idAgama: data.ID_AGAMA,
                        namaAgama: data.agama.NAMA,
                        alamat: data.ALAMAT,
                        notelp: data.NOTELP,
                        email: data.EMAIL,
                        pekerjaan: data.PEKERJAAN
                    };
                    keluarga.push(keluarga_murid);

                    tampilData();
                });
            });
            
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });


            // window.deleteKeluarga = function(id, nis, rowid)
            // {
            //     $.ajax({
            //         type: 'DELETE',
            //         url: '{{url('api/keluarga')}}/' + id + '/' + nis
            //     }).then(function (data) {
            //         var row = document.getElementById(rowid);
            //         row.parentNode.removeChild(row);
            //        if(data){
            //             alert('Data Keluarga berhasil dihapus');
            //         }else{
            //             alert('Data Keluarga tersebut masih memiliki murid yang lain');
            //         }
            //     });
            // }
        });
    </script>
@endsection
