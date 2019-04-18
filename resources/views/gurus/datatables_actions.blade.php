{!! Form::open(['route' => ['gurus.destroy', $NIP_GURU], 'method' => 'delete']) !!}
<div class='btn-group' style="width: 100px">
    <a href="{{ route('gurus.show', $NIP_GURU) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('gurus.edit', $NIP_GURU) }}" class='btn btn-warning btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
