{!! Form::open(['route' => ['kelas.destroy', $ID_KELAS], 'method' => 'delete']) !!}
<div class='btn-group' style="width: 100px">
    <a href="{{ route('kelas.show', $ID_KELAS) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('kelas-edit')
    <a href="{{ route('kelas.edit', $ID_KELAS) }}" class='btn btn-warning btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    @can('kelas-delete')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
