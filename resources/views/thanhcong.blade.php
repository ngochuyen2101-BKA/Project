@if(Auth::check())

	<h1>Dang nhap thanh cong</h1>
	@if(isset($user))
		{{"Ten: ".$user->name}}
		<br>
		{{"Email: ".$user->email}}

		<a href="{{url('logout')}}">Logout</a>
	@endif
@else
	<h1>Ban chua dang nhap thanh cong</h1>
@endif