<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
    public function XinChao()
    {
    	echo "Chao cac ban";
    }

    public function KhoaHoc($ten)
    {
    	echo "Khoa Hoc: ".$ten;
    	return redirect()->route('MyRoute');
    }

    public function GetURL(Request $request)
    {
    	// return $request->path();
    	// return $request->url();

    	/* if($request->isMethod('get'))
    		echo "Phuong thuc Get";
    	else
    		echo "Khong phai phuong thuc Get";*/

    		if($request->is('My*'))
    			echo "co My";
    		else
    			echo "Khong co My";
    }

    public function postForm(Request $request)
    {
    	echo "Ten cua ban la: ";
    	// echo $request->HoTen; 
    	echo $request->input('HoTen');

    	// if($request->has('Tuoi'))
    	// 	echo "Co tham so";
    	// else
    	// 	echo "Khong co tham so";
    }

    public function setCookie()
    {
    	$response = new Response();
    	$response->withCookie('KhoaHoc','Laravel - Ngoc Huyen',1);
    	echo "Da set Cookie";
    	return $response;
    }

    public function getCookie(Request $request)
    {
    	echo "Cookie cua ban la: ";
    	return $request->cookie('KhoaHoc');
    }

    public function postFile(Request $request)
    {
    	if($request->hasFile('myFile'))
    	{
    		$file = $request->file('myFile');
    		if($file->getClientOriginalExtension('myFile') == "JPG")
    		{
	    		$filename = $file->getClientOriginalName('myFile');
	    		// echo $filename;
	    		$file->move('img',$filename);
	    		// $file->move('img','myfile.jpg');
	    		echo "Da luu file: ".$filename;
	    	}
	    	else
	    	{
	    		echo "Khong upload duoc file";
	    	}
    	}
    	else
    	{
    		echo "Chua co File";
    	}
    }

    public function getJson()
    {
    	// $array = ['Laravel','Php','ASP.net','HTML'];
    	$array = ['KhoaHoc'=>'Laravel-NgocHuyen'];
    	return response()->json($array);
    }

    public function myView()
    {
    	// return view('myView');
    	return view('view.NgocHuyen');
    }

    public function Time($t)
    {
    	return view('myView',['time'=>$t]);
    }

    public function blade($str)
    {
        $khoahoc = "<b>Laravel - Ngoc Huyen</b>";
        if ($str == "laravel") {
            return view('pages.laravel',['khoahoc'=>$khoahoc]);
        }elseif($str == "php"){
            return view('pages.php',['khoahoc'=>$khoahoc]);
        }
    }
}
