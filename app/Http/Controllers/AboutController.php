<?php

namespace App\Http\Controllers;

use App\Models\AboutModels;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
class AboutController extends Controller
{
    function aboutLink()
    {
        $cont = AboutModels::all()->count();
        $active = AboutModels::where('status',1)->count();
        return view('backend.about.index',[
            'count' => $cont,
            'active' => $active,
        ]);
    }
    function aboutStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
            'image' => 'required | image:jpeg,jpg,png | max:1000',
        ]);
        // Image Making
        $img = $request->image;
        $extention = $img->getClientOriginalExtension();
        $name = 'R'.rand(1,2000).'A'.rand(1,500).'.'.$extention;
        Image::make($img)->save(public_path('uploads/about/'.$name));
        // Image Making End

        AboutModels::insert([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'image' => $name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('add','Successfully Added');
    }
    function aboutManage()
    {
        $data = AboutModels::all();
        return view('backend.about.manage',[
            'data' => $data
        ]);
    }
    function aboutEdit($id)
    {
        $data = AboutModels::where('id',$id)->first();
        return view('backend.about.edit',[
            'data' => $data,
        ]);
    }
    function aboutDelete($id)
    {
        $name = AboutModels::where('id', $id)->first()->image;
        $path = public_path('uploads/about/'.$name);
        unlink($path);
        AboutModels::where('id', $id)->delete();
        return back()->with('del','Deleted');
    }
    function aboutUpdate(Request $request)
    {
        if ($request->image == '') {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'link' => 'required',
            ]);
            AboutModels::find($request->id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'status' =>$request->status,
                'updated_at' =>Carbon::now(),
            ]);
            return redirect()->route('about.manage')->with('up','Updated');
        }else {
            $request->validate([
                'image' => 'required | image:jpeg,jpg,png | max:1000',
            ]);
            $img = AboutModels::where('id',$request->id)->first()->image;
            $path = public_path('uploads/about/'.$img);
            unlink($path);
            Image::make($request->image)->save(public_path('uploads/about/'.$img));
            AboutModels::find($request->id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'status' =>$request->status,
                'updated_at' =>Carbon::now(),
            ]);
            return redirect()->route('about.manage')->with('up','Updated');
        }

    }

}
