{!! Form::open(['route' => ['tahunAjarans.destroy', $ID_TAHUN_AJARAN], 'method' => 'delete']) !!}
<div class='btn-group' style="width: 100px">
    {{-- <a href="{{ route('tahunAjarans.show', $ID_TAHUN_AJARAN) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a> --}}
    @can('tahun-ajaran-edit')
    <a href="{{ route('tahunAjarans.edit', $ID_TAHUN_AJARAN) }}" class='btn btn-warning btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    @can('tahun-ajaran-delete')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
