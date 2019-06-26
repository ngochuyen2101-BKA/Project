<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tin;

class TinController extends Controller
{
    public function index(){

    	$tin = Tin::where('id','>=','10')->paginate(5);
    	//$tin = Tin::where('id','>=','10')->simplePaginate(5);
    	return view('tin',['tin'=>$tin]);
    }
}
