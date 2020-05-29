<?php
namespace App\Http\Controllers;
use App\LatestBlog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LatestnewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartment=LatestBlog::all();
       return view('admin.blog.index',compact('apartment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            
            'title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->room_name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/blog'))
            {
                mkdir('uploads/blog', 0777 , true);
            }
            $image->move('uploads/blog',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $slider = new LatestBlog();
        
        $slider->title = $request->title;
        $slider->description = $request->description;
        
        $slider->image = $imagename;
        $slider->save();
        return redirect()->route('blog.index')->with('successMsg','Slider Successfully Saved');
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
        $apartment = LatestBlog::find($id);
        return view('admin.blog.edit',compact('apartment'));
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
            
            'title' => 'required',
            
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->room_name);
        $slider = LatestBlog::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/blog'))
            {
                mkdir('uploads/blog', 0777 , true);
            }
            $image->move('uploads/blog',$imagename);
        }else {
            $imagename = $slider->image;
        }
       
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $imagename;
       /* $slider->image = $imagename;*/
        $slider->save();
        return redirect()->route('blog.index')->with('successMsg','Slider Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = LatestBlog::find($id);
        if (file_exists('uploads/blog/'.$slider->image))
        {
            unlink('uploads/blog/'.$slider->image);
        }
        $slider->delete();
        return redirect()->back()->with('successMsg','Slider Successfully Deleted');
    }


    public function updateStatus(Request $request)
{
    $user = LatestBlog::findOrFail($request->user_id);
    $user->status = $request->status;
    $user->save();

    return response()->json(['message' => 'User status updated successfully.']);
}
}
