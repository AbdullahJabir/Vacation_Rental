<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AjaxCrud;


class HomeController extends Controller
{
    public function index(){
    	 $items = AjaxCrud::all();
       return view('welcome',compact('items'));

    }
}
