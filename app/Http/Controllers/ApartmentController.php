<?php

namespace App\Http\Controllers;
use App\ApartmentRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartment=ApartmentRoom::all();
       return view('admin.apartment.index',compact('apartment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.apartment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'room_name' => 'required',
            'max_person' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->room_name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/slider'))
            {
                mkdir('uploads/slider', 0777 , true);
            }
            $image->move('uploads/slider',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $slider = new ApartmentRoom();
        $slider->room_name = $request->room_name;
        $slider->max_person = $request->max_person;
        $slider->size = $request->size;
        $slider->view = $request->view;
        $slider->bed = $request->bed;
        $slider->image = $imagename;
        $slider->save();
        return redirect()->route('apartment.index')->with('successMsg','Slider Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = ApartmentRoom::find($id);
        return view('admin.apartment.edit',compact('apartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'room_name' => 'required',
            'max_person' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->room_name);
        $slider = ApartmentRoom::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/apartment'))
            {
                mkdir('uploads/apartment', 0777 , true);
            }
            $image->move('uploads/apartment',$imagename);
        }else {
            $imagename = $slider->image;
        }
        $slider->room_name = $request->room_name;
        $slider->max_person = $request->max_person;
        $slider->size = $request->size;
        $slider->view = $request->view;
        $slider->bed = $request->bed;
        $slider->image = $imagename;
        $slider->image = $imagename;
        $slider->save();
        return redirect()->route('apartment.index')->with('successMsg','Slider Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = ApartmentRoom::find($id);
        if (file_exists('uploads/apartment/'.$slider->image))
        {
            unlink('uploads/apartment/'.$slider->image);
        }
        $slider->delete();
        return redirect()->back()->with('successMsg','Slider Successfully Deleted');
    }
}
