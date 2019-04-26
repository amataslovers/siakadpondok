{!! Form::open(['route' => ['semesters.destroy', $ID_SEMESTER], 'method' => 'delete']) !!}
<div class='btn-group' style="width: 100px">
    {{-- <a href="{{ route('semesters.show', $ID_SEMESTER) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a> --}}
    @can('semester-edit')
    <a href="{{ route('semesters.edit', $ID_SEMESTER) }}" class='btn btn-warning btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    @can('semester-delete')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
