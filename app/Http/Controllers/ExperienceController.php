<?php

namespace App\Http\Controllers;

use App\Models\ExperienceModels;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ExperienceController extends Controller
{
    function experienceLink()
    {
        $cont = ExperienceModels::all()->count();
        $active = ExperienceModels::where('status',1)->count();
        return view('backend.experience.index',[
            'count' => $cont,
            'active' => $active,
        ]);
    }
    function experienceStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'startingDate' => 'required',
            'image' => 'required | image:jpeg,jpg,png | max:1000',
        ]);
        // Image Making
        $img = $request->image;
        $extention = $img->getClientOriginalExtension();
        $name = 'A'.rand(1,2000).'D'.rand(1,500).'.'.$extention;
        Image::make($img)->save(public_path('uploads/experience/'.$name));
        // Image Making End

        ExperienceModels::insert([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'startingDate' => $request->startingDate,
            'endDate' => $request->endDate,
            'logo' => $name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('add','Successfully Added');
    }
    function experienceManage()
    {
        $data = ExperienceModels::all();
        return view('backend.experience.manage',[
            'data' => $data,
        ]);
    }
    function experienceEdit($id)
    {
        $data = ExperienceModels::where('id',$id)->first();
        return view('backend.experience.edit',[
            'data' => $data,
        ]);
    }
    function experienceDelete($id)
    {
        $name = ExperienceModels::where('id', $id)->first()->logo;
        $path = public_path('uploads/experience/'.$name);
        unlink($path);
        ExperienceModels::where('id', $id)->delete();
        return back()->with('del','Deleted');
    }
    function experienceUpdate(Request $request)
    {
        if ($request->image == '') {
            $request->validate([
                'name' => 'required',
                'title' => 'required',
                'description' => 'required',
                'startingDate' => 'required',
            ]);
            ExperienceModels::find($request->id)->update([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'startingDate' => $request->startingDate,
                'endDate' => $request->endDate,
                'status' =>$request->status,
                'updated_at' =>Carbon::now(),
            ]);
            return redirect()->route('experience.manage')->with('up','Updated');
        }else {
            $request->validate([
                'name' => 'required',
                'title' => 'required',
                'description' => 'required',
                'startingDate' => 'required',
                'image' => 'required | image:jpeg,jpg,png | max:1000',
            ]);
            $unimg = ExperienceModels::where('id',$request->id)->first()->logo;
            $path = public_path('uploads/experience/'.$unimg);
            unlink($path);

            $img = $request->image;
            $extention = $img->getClientOriginalExtension();
            $name = 'A'.rand(1,2000).'D'.rand(1,500).'.'.$extention;
            Image::make($img)->save(public_path('uploads/experience/'.$name));
            ExperienceModels::find($request->id)->update([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'startingDate' => $request->startingDate,
                'endDate' => $request->endDate,
                'status' =>$request->status,
                'logo' => $name,
                'updated_at' =>Carbon::now(),
            ]);
            return redirect()->route('experience.manage')->with('up','Updated');
        }
    }
}
