@extends('layouts.master')

@section('NoiDung')

<!-- <h2>PHP</h2>
{{$khoahoc}}
{!!$khoahoc!!} -->

<!-- @if($khoahoc != "")
{{$khoahoc}}
@else
{{"Khong co khoa hoc"}}
@endif -->

<!-- {{ isset($khoahoc) ? $khoahoc:"khong co khoa hoc"}}

<br>

@for($i = 1; $i<=10; $i++)
{{$i." "}}
@endfor -->

<?php $khoahoc = array('PHP','IOS','ASP','Android'); ?>

<!-- @if(!empty($khoahoc))
	@foreach($khoahoc as $value)
		{{$value}}
	@endforeach
@else
	{{"Mang rong"}}
@endif -->

@forelse($khoahoc as $value)
	<!-- @continue($value == "PHP") -->
	@break($value=="ASP")
	{{$value}}
@empty
	{{"Mang rong"}}
@endforelse

@endsection