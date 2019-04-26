{!! Form::open(['route' => ['pengampus.destroy', $ID_PENGAMPU], 'method' => 'delete']) !!}
<div class='btn-group' style="width: 100px">
    <a href="{{ route('pengampus.show', $ID_PENGAMPU) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('pengampu-edit')
    <a href="{{ route('pengampus.edit', $ID_PENGAMPU) }}" class='btn btn-warning btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    @can('pengampu-delete')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
