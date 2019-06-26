@if (!isset($error))
@else
 {{$error}}
@endif

<form action="{{route('login')}}" method="post">
	<input type="text" name="username" placeholder="username">
	<input type="password" name="password" placeholder="password">
	<input type="submit" >
	{{ csrf_field() }}
</form>