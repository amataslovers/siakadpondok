{!! Form::open(['route' => ['agamas.destroy', $ID_AGAMA], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('agamas.show', $ID_AGAMA) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('agamas.edit', $ID_AGAMA) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
