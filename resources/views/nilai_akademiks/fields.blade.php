    <!-- Id Detail Mapel Field -->
    <div class="form-group col-sm-6">
        {!! Form::hidden('ID_PENGAMPU', $detail->ID_PENGAMPU, ['class' => 'form-control']) !!}
        {!! Form::hidden('ID_SEMESTER', $semester->ID_SEMESTER, ['class' => 'form-control']) !!}
        {!! Form::hidden('CAT', $cat, ['class' => 'form-control']) !!}
    </div>

    <div class="clearfix"></div>
    <div class="col-sm-12">
        <table class="table table-bordered table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>No</th>
                    <th class="col-sm-2">NIS</th>
                    <th>Nama</th>
                    @if ($cat == 1 || $cat == 3)
                        <th>NILAI UTS</th>
                    @endif
                    @if ($cat == 2 || $cat == 3)
                        <th>NILAI UAS</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                    @foreach ($murid as $key => $value)
                        <tr>
                            <td scope="row">{{ $key+1 }}</td>
                            <td>{!! Form::text('NIS', $value->NIS, ['class' => 'form-control', 'name' => 'NIS[]', 'readonly']) !!}</td>
                            <td>{!! Form::text('NAMA', $value->NAMA, ['class' => 'form-control', 'name' => 'NAMA[]', 'readonly']) !!}</td>
                            @if ($cat == 1 || $cat == 3)
                                <td>{!! Form::number('NILAI_UTS', mt_rand(60,95), ['class' => 'form-control', 'name' => 'NILAI_UTS[]', 'step' => 'any', 'required']) !!}</td>
                            @endif
                            @if ($cat == 2 || $cat == 3)
                                <td>{!! Form::number('NILAI_UAS', mt_rand(59,95), ['class' => 'form-control', 'name' => 'NILAI_UAS[]', 'step' => 'any', 'required']) !!}</td>
                            @endif
                        </tr>
        
                    @endforeach
                </tbody>
        </table>
    </div>
    
    {{-- <!-- Nis Field -->
    <div class="form-group col-sm-6">
            {!! Form::label('NIS', 'Nis:') !!}
            {!! Form::text('NIS', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Nilai Uts Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('NILAI_UTS', 'Nilai Uts:') !!}
            {!! Form::number('NILAI_UTS', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Nilai Uas Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('NILAI_UAS', 'Nilai Uas:') !!}
            {!! Form::number('NILAI_UAS', null, ['class' => 'form-control']) !!}
        </div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('nilaiAkademiks.index') !!}" class="btn btn-default">Cancel</a>
</div>
