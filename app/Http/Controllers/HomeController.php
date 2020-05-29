<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AjaxCrud;
use App\vacationleft;
use App\ApartmentRoom;
use App\ClientFeedback;
use App\LatestBlog;
class HomeController extends Controller
{
    public function index(){
    	 $items = AjaxCrud::all();
    	 $vacation_rental=vacationleft::all();
    	 $ApartmentRoom = ApartmentRoom::all();
    	 $feedback = ClientFeedback::all();
    	 $latest = LatestBlog::where('status',1)->get();

       return view('welcome',compact('items','vacation_rental','ApartmentRoom','feedback','latest'));

    }
}
