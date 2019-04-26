{!! Form::open(['route' => ['mataPelajarans.destroy', $ID_MATA_PELAJARAN], 'method' => 'delete']) !!}
<div class='btn-group' style="width: 100px">
    <a href="{{ route('mataPelajarans.show', $ID_MATA_PELAJARAN) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('mata-pelajaran-edit')
    <a href="{{ route('mataPelajarans.edit', $ID_MATA_PELAJARAN) }}" class='btn btn-warning btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    @can('mata-pelajaran-delete')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
