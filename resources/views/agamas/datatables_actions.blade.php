{!! Form::open(['route' => ['agamas.destroy', $ID_AGAMA], 'method' => 'delete']) !!}
<div class='btn-group' style="width: 100px">
    {{-- <a href="{{ route('agamas.show', $ID_AGAMA) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a> --}}
    @can('agama-edit')
        <a href="{{ route('agamas.edit', $ID_AGAMA) }}" class='btn btn-warning btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    @endcan
    @can('agama-delete')
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirm('Are you sure?')"
        ]) !!}
    @endcan
</div>
{!! Form::close() !!}
