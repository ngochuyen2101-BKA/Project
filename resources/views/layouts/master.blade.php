<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ngoc Huyen</title>
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
	@include('layouts.header')

	<div id="content">
		<h1>Ngoc Huyen</h1>
		@yield('NoiDung')
	</div>

	@include('layouts.footer')
</body>
</html>