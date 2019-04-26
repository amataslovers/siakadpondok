{!! Form::open(['route' => ['catatanSpps.destroy', $ID_CATATAN_SPP], 'method' => 'delete']) !!}
<div class='btn-group' style="width: 100px">
    {{-- <a href="{{ route('catatanSpps.show', $ID_CATATAN_SPP) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a> --}}
    @can('catatan-spp-edit')
        <a href="{{ route('catatanSpps.edit', $ID_CATATAN_SPP) }}" class='btn btn-warning btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    @endcan
    @can('catatan-spp-delete')
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirm('Are you sure?')"
        ]) !!}
    @endcan
</div>
{!! Form::close() !!}
