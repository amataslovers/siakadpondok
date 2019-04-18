<table class="table table-responsive table-hover table-bordered" style="width: 100%">
    <thead>
        <tr>
            <th>#</th>
            <th>NIS & Nama</th>
            <th>Ijin</th>
            <th>Sakit</th>
            <th>Alfa</th>
            <th>Akhlaq</th>
            <th>Kebersihan</th>
            <th>Kerajinan</th>
            <th>Ketekunan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($history as $key => $value)
            <tr>
                <td>
                    <button type="button" class="btn btn-success fa fa-chevron-circle-down" data-toggle="modal" data-target="#modalPelanggaran{{$key}}">
                    </button>
                    {!! Form::hidden('ID_HISTORY_KELAS', $value->ID_HISTORY_KELAS, ['class' => 'form-control', 'name' => '_ID_HISTORY_KELAS[]']) !!}
                </td>

                <td>
                    <b>{{$value->murid->NIS}}</b> <br>
                    {{$value->murid->NAMA}}
                </td>

                <td class="col-md-1">
                    {!! Form::number('IJIN', 1, ['class' => 'form-control', 'name' => '_IJIN[]', 'required']) !!}
                </td>

                <td class="col-md-1">
                    {!! Form::number('SAKIT', 1, ['class' => 'form-control', 'name' => '_SAKIT[]', 'required']) !!}
                </td>

                <td class="col-md-1">
                    {!! Form::number('ALFA', 1, ['class' => 'form-control', 'name' => '_ALFA[]', 'required']) !!}
                </td>

                <td>
                    {!! Form::select('AKHLAQ', [3 => 'Baik', 1 => 'Kurang', 2 => 'Cukup'] , NULL, ['class' => 'form-control', 'name' => '_AKHLAQ[]', 'required']) !!}
                </td>
                
                <td>
                    {!! Form::select('KEBERSIHAN', [3 => 'Baik', 1 => 'Kurang', 2 => 'Cukup'] , NULL, ['class' => 'form-control', 'name' => '_KEBERSIHAN[]', 'required']) !!}
                </td>

                <td>
                    {!! Form::select('KERAJINAN', [3 => 'Baik', 1 => 'Kurang', 2 => 'Cukup'] , NULL, ['class' => 'form-control', 'name' => '_KERAJINAN[]', 'required']) !!}
                </td>

                <td>
                    {!! Form::select('KETEKUNAN', [3 => 'Baik', 1 => 'Kurang', 2 => 'Cukup'] , NULL, ['class' => 'form-control', 'name' => '_KETEKUNAN[]', 'required']) !!}
                </td>
                
            </tr>
        @endforeach
    </tbody>
</table>
@foreach ($history as $key => $value)
    <div class="modal fade" id="modalPelanggaran{{$key}}" tabindex="-1" role="dialog" aria-labelledby="labelPelanggaran{{$key}}" style="display:none">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="labelPelanggaran{{$key}}">Pelanggaran Murid {{$value->murid->NAMA}}</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-responsive table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Melanggar</th>
                                <th>Sanksi</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($value->pelanggaranMurid as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->peraturan->NAMA_PERATURAN}}</td>
                                    <td>{{$item->peraturan->sanksi->NAMA_SANKSI}}</td>
                                    <td>{{$item->TANGGAL_MELANGGAR}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('nilaiKarakters.index') !!}" class="btn btn-default">Cancel</a>
</div>
