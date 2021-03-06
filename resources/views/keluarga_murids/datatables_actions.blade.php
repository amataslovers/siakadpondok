{!! Form::open(['route' => ['keluargaMurids.destroy', $ID_KELUARGA_MURID], 'method' => 'delete']) !!}
<div class='btn-group' style="width: 100px">
    <a href="{{ route('keluargaMurids.show', $ID_KELUARGA_MURID) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('keluarga-murid-edit')
    <a href="{{ route('keluargaMurids.edit', $ID_KELUARGA_MURID) }}" class='btn btn-warning btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    @can('keluarga-murid-delete')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
