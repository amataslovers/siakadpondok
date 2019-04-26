{!! Form::open(['route' => ['nilaiKarakters.destroy', $ID_NILAI_KARAKTER], 'method' => 'delete']) !!}
<div class='btn-group' style="width: 100px">
    {{-- <a href="{{ route('nilaiKarakters.show', $ID_NILAI_KARAKTER) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a> --}}
    @can('nilai-karakter-edit')
    <a href="{{ route('nilaiKarakters.edit', $ID_NILAI_KARAKTER) }}" class='btn btn-warning btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    {{-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!} --}}
</div>
{!! Form::close() !!}
