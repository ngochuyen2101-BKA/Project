<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('KhoaHoc',function(){
	return "Xin chao cac ban!";
});

Route::get('NgocHuyen/Laravel',function(){
	echo "<h1>Khoa Hoc - Laravel</h1>";
});

Route::get('Route1',['as' => 'MyRoute', function(){
	echo "Xin chao";
}]);

// Truyen tham so

Route::get('HoTen/{ten}',function($ten){
	echo "Ten cua ban la: ".$ten;
});

Route::get('Laravel/{ngay}',function($ngay){
	echo "Ngoc Huyen: ".$ngay;
})->where(['ngay'=>'[a-zA-Z]+']);

// Dinh danh

Route::get('Route1',['as'=>'MyRoute',function(){
	echo "Xin chao cac ban";
}]);

Route::get('Route2',function(){
	echo "Day la Route2";
})->name('MyRoute2');

Route::get('GoiTen',function(){
	return redirect()->route('MyRoute2');
});

Route::group(['prefix'=>'MyGroup'],function(){
	Route::get('User1',function(){
		echo "User1";
	});
	Route::get('User2',function(){
		echo "User2";
	});
	Route::get('User3',function(){
		echo "User3";
	});
});

Route::get('GoiController','MyController@XinChao');

Route::get('ThamSo/{ten}','MyController@KhoaHoc');

Route::get('MyRequest','MyController@GetURL');

// Gui nhan du lieu voi request

Route::get('getForm',function(){
	return view('postForm');
});

Route::post('postForm',['as'=>'postForm','uses'=>'MyController@postForm']);

Route::get('setCookie','MyController@setCookie');

Route::get('getCookie','MyController@getCookie');

// upload File

Route::get('uploadFile',function(){
	return view('postFile');
});

Route::post('postFile',['as'=>'postFile','uses'=>'MyController@postFile']);

Route::get('getJson','MyController@getJson');

Route::get('myView','MyController@myView');

Route::get('Time/{t}','MyController@Time');

View::share('KhoaHoc','Laravel');

Route::get('blade',function(){
	return view('pages.php');
});

Route::get('BladeTemplate/{str}','MyController@blade');

Route::get('database',function(){
	Schema::create('loaisanpham',function($table){
		$table->increments('id');
		$table->string('ten',200);
	});

	echo "Da thuc hien tao bang";
});

// QueryBuilder

Route::get('qb/get',function(){
	$data = DB::table('users')->get();
	// var_dump($data);
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});

//select * from users where id = 2

Route::get('qb/where',function(){
	$data = DB::table('users')->where('id','=',2)->get();
	// var_dump($data);
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});

//select id, name, email...

Route::get('qb/select',function(){
	$data = DB::table('users')->select(['id','name','email'])->where('id',2)->get();

	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});

// select name as hoten from...

Route::get('qb/raw',function(){
	$data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->where('id',2)->get();

	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});

Route::get('qb/order',function(){
	$data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->where('id','>',0)->orderBy('id','desc')->get();

	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});

//limit 2,5

Route::get('qb/skip',function(){
	$data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->where('id','>',0)->orderBy('id','desc')->skip(1)->take(4)->get();
	echo $data->count();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});

Route::get('qb/update',function(){
	DB::table('users')->where('id',1)->update(['name'=>'website','email'=>'nguyenhuyen@email.com']);
	echo "Da update";
});

Route::get('qb/delete',function(){
	DB::table('users')->where('id','=',1)->delete();
	echo "Da xoa";
});

Route::get('qb/deleteall',function(){
	DB::table('users')->truncate();
	echo "Da xoa";
});

//Model

Route::get('model/save',function(){
	$user = new App\User();
	$user->name = "Mai";
	$user->email = "mai@gmail.com";
	$user->password = "mat khau";

	$user->save();

	echo "da thuc hien save";
});

Route::get('model/query',function(){
	$user = App\User::find(2);
	echo $user->name;
});

Route::get('model/sanpham/save/{ten}',function($ten){
	$sanpham = new App\SanPham();
	$sanpham->ten = $ten;
	$sanpham->soluong = 100;
	$sanpham->save();

	echo "Da luu ".$ten;
});

Route::get('model/sanpham/all',function(){
	// $sanpham = App\SanPham::all()->toJson();
	// echo $sanpham;

	$sanpham = App\SanPham::all()->toArray();
	var_dump($sanpham);
});

Route::get('model/sanpham/ten',function(){
	$sanpham = App\SanPham::where('ten','Laptop')->get()->toArray();
	// var_dump($sanpham);
	echo $sanpham[0]['ten'];
});

Route::get('model/sanpham/delete',function(){
	App\SanPham::destroy(4);
	echo "Da xoa";
});

Route::get('lienket',function(){
	$data = App\SanPham::find(1)->loaisanpham->toArray();
	var_dump($data);
});

Route::get('lienketloaisanpham',function(){
	$data = App\LoaiSanPham::find(1)->sanpham->toArray();
	var_dump($data);
});

Route::get('diem',function(){
	echo "Ban da co diem";
})->middleware('MyMiddle')->name('diem');

Route::get('loi',function(){
	echo "Ban chua co diem";
})->name('loi');

Route::get('nhapdiem',function(){
	return view('nhapdiem');
})->name('nhapdiem');

//Auth

Route::get('dangnhap',function(){
	return view('dangnhap');
});

Route::get('thu',function(){
	return view('thanhcong');
});

Route::post('login','AuthController@login')->name('login');

Route::get('logout','AuthController@logout');

Route::group(['middleware' => ['web']], function(){
	Route::get('Session',function(){
		Session::put('KhoaHoc','Laravel');
		Session::put('LapTrinh','Web');
		echo "Da dat session thanh cong";
		echo "<br>";
		Session::Flash('mess','Hello');
		//Session::flush();
		// Session::forget('KhoaHoc');
		//echo Session::get('KhoaHoc');
		echo Session::get('mess');
		// if (Session::has('KhoaHoc')) {
		// 	echo "Da co session";
		// }else{
		// 	echo "Khoa hoc khong ton tai";
		// }
	});

	Route::get('Session/flash',function(){
		//echo Session::get('mess');
		echo session('mess');
	});
});

Route::get('tin','TinController@index');