{!! Form::open(['route' => ['catatanSpps.destroy', $ID_CATATAN_SPP], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('catatanSpps.show', $ID_CATATAN_SPP) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('catatanSpps.edit', $ID_CATATAN_SPP) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
