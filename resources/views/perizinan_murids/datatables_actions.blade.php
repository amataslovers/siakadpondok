{!! Form::open(['route' => ['perizinanMurids.destroy', $ID_PERIZINAN_MURID], 'method' => 'delete']) !!}
<div class='btn-group' style="width: 100px">
    {{-- <a href="{{ route('perizinanMurids.show', $ID_PERIZINAN_MURID) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a> --}}
    @can('perizinan-murid-edit')
    <a href="{{ route('perizinanMurids.edit', $ID_PERIZINAN_MURID) }}" class='btn btn-warning btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    @can('perizinan-murid-delete')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
