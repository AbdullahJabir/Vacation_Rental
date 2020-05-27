<?php

namespace App\Http\Controllers;
use App\ClientFeedback;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ClientsFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $apartment=ClientFeedback::all();
       return view('admin.client.index',compact('apartment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
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
            'client_name' => 'required',
            'client_title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->room_name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/client'))
            {
                mkdir('uploads/client', 0777 , true);
            }
            $image->move('uploads/client',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $slider = new ClientFeedback();
        $slider->client_name = $request->client_name;
        $slider->client_title = $request->client_title;
        $slider->client_description = $request->client_description;
        
        $slider->image = $imagename;
        $slider->save();
        return redirect()->route('client.index')->with('successMsg','Slider Successfully Saved');
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
        $apartment = ClientFeedback::find($id);
        return view('admin.client.edit',compact('apartment'));
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
            'client_name' => 'required',
            'client_title' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->room_name);
        $slider = ClientFeedback::find($id);
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
        $slider->client_name = $request->client_name;
        $slider->client_title = $request->client_title;
        $slider->client_description = $request->client_description;
        $slider->image = $imagename;
       /* $slider->image = $imagename;*/
        $slider->save();
        return redirect()->route('client.index')->with('successMsg','Slider Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = ClientFeedback::find($id);
        if (file_exists('uploads/client/'.$slider->image))
        {
            unlink('uploads/client/'.$slider->image);
        }
        $slider->delete();
        return redirect()->back()->with('successMsg','Slider Successfully Deleted');
    }
}
