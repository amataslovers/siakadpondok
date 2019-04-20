<a class="btn btn-info" href="{{ route('users.show',$id) }}">Show</a>
<a class="btn btn-primary" href="{{ route('users.edit',$id) }}">Edit</a> 
{{-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $id],'style'=>'display:inline']) !!} 
{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} 
{!! Form::close() !!} --}}