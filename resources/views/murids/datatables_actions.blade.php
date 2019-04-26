{!! Form::open(['route' => ['murids.destroy', $NIS], 'method' => 'delete']) !!}
<div class='btn-group' style="width: 100px">
    <a href="{{ route('murids.show', $NIS) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('murid-edit')
    <a href="{{ route('murids.edit', $NIS) }}" class='btn btn-warning btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    @can('murid-delete')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
