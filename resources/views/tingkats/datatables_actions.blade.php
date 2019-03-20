{!! Form::open(['route' => ['tingkats.destroy', $ID_TINGKAT], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('tingkats.show', $ID_TINGKAT) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('tingkats.edit', $ID_TINGKAT) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
