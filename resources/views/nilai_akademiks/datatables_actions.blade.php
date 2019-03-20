{!! Form::open(['route' => ['nilaiAkademiks.destroy', $ID_NILAI], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('nilaiAkademiks.show', $ID_NILAI) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('nilaiAkademiks.edit', $ID_NILAI) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
