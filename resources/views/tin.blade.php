<style>
	.pagination li{
		list-style: none;
		float: left;
		margin-left: 5px;
	}
</style>
@foreach($tin as $value)
	{{$value->id}}
	{{$value->ten}}<br>
	
@endforeach

{!!  $tin->appends(['abc'=>'123'])->links() !!}