{!! Form::open(['route' => ['tingkats.destroy', $ID_TINGKAT], 'method' => 'delete']) !!}
<div class='btn-group' style="width: 100px">
    <a href="{{ route('tingkats.show', $ID_TINGKAT) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('tingkat-edit')
    <a href="{{ route('tingkats.edit', $ID_TINGKAT) }}" class='btn btn-warning btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    @can('tingkat-delete')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
