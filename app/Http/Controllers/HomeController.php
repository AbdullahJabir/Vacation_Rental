<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AjaxCrud;
use App\vacationleft;

class HomeController extends Controller
{
    public function index(){
    	 $items = AjaxCrud::all();
    	 $vacation_rental=vacationleft::all();
       return view('welcome',compact('items','vacation_rental'));

    }
}
