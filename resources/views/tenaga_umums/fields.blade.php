<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NIP', 'NIP:') !!}
    {!! Form::text('NIP', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA', 'Nama:') !!}
    {!! Form::text('NAMA', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Agama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_AGAMA', 'Agama:') !!}
    {!! Form::select('ID_AGAMA', $agama, null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('JENIS_KELAMIN', 'Jenis Kelamin:') !!}
    {!! Form::select('JENIS_KELAMIN', ['L' => 'Laki-laki', 'P' => 'Perempuan'], null, ['class' => 'form-control']) !!}
</div>

<!-- Tempat Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TEMPAT_LAHIR', 'Tempat Lahir:') !!}
    {!! Form::text('TEMPAT_LAHIR', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TANGGAL_LAHIR', 'Tanggal Lahir:') !!}
    {!! Form::text('TANGGAL_LAHIR', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('ALAMAT', 'Alamat:') !!}
    {!! Form::textarea('ALAMAT', null, ['class' => 'form-control', 'rows' => 2]) !!}
</div>

<!-- Notelp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NOTELP', 'Notelp:') !!}
    {!! Form::text('NOTELP', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('EMAIL', 'Email:') !!}
    {!! Form::email('EMAIL', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('FOTO', 'Foto:') !!}
    {!! Form::file('FOTO', null, ['class' => 'form-control']) !!}
    @if(isset($tenagaUmum) && !is_null($tenagaUmum->FOTO))
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#picFoto">
            Lihat Foto
        </button>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tenagaUmums.index') !!}" class="btn btn-default">Cancel</a>
</div>

@if(!empty($tenagaUmum->FOTO))
    <!-- Modal FOTO -->
    <div class="modal fade" id="picFoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Foto</h4>
                </div>
                <div class="modal-body">
                    <img src="{!! asset('/upload/profile/'. $tenagaUmum->FOTO) !!}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif