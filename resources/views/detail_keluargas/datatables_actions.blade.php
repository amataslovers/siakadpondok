{!! Form::open(['route' => ['detailKeluargas.destroy', $ID_DETAIL_KELUARGA], 'method' => 'delete']) !!}
<div class='btn-group' style="width: 100px">
    <a href="{{ route('detailKeluargas.show', $ID_DETAIL_KELUARGA) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('detail-keluarga-edit')
    <a href="{{ route('detailKeluargas.edit', $ID_DETAIL_KELUARGA) }}" class='btn btn-warning btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    @can('detail-keluarga-delete')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
