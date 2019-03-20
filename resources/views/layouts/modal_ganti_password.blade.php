<!-- Modal Form Ganti Password -->
<div class="modal fade" id="formPassword" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Buat Password Baru</h4>
            </div>
            <div class="modal-body">
                {{-- {!! Form::open(['route' => 'ganti-password']) !!}
                    <div class="form-group col-sm-6">
                        {!! Form::label('NAMA', 'Nama:') !!}
                        {!! Form::text('NAMA', null, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!} --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>