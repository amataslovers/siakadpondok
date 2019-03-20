{!! Form::open(['route' => ['tenagaUmums.destroy', $ID_TENAGA_UMUM], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('tenagaUmums.show', $ID_TENAGA_UMUM) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('tenagaUmums.edit', $ID_TENAGA_UMUM) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
