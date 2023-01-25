<?php

namespace App\Http\Controllers;

use App\Models\CategoryModels;
use App\Models\ProjectModels;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
class ProjectController extends Controller
{
    function projectLink()
    {
        $cont = CategoryModels::all();
        return view('backend.project.index',[
            'cat' => $cont,
        ]);
    }
    function projectStore(Request $request)
    {
        $request->validate([
            'categoryId' => 'required',
            'title' => 'required',
            'clientName' => 'required',
            'startingDate' => 'required',
            'location' => 'required',
            'website' => 'required',
            'shortDescription' => 'required',
            'longDescription' => 'required',
            'image' => 'required | image:jpeg,jpg,png | max:1000',
            'thumbnail' => 'required | image:jpeg,jpg,png | max:1000',
        ]);
        // Image Making
        $img = $request->image;
        $extention = $img->getClientOriginalExtension();
        $name = 'P'.rand(1,2000).'I'.rand(1,500).'.'.$extention;
        Image::make($img)->resize(500, 500)->save(public_path('uploads/project/'.$name));
        // Image Making End

        // Thumbnail Making
        $thumb = $request->thumbnail;
        $thumbextention = $thumb->getClientOriginalExtension();
        $thumbname = 'T'.rand(1,2000).'P'.rand(1,500).'.'.$thumbextention;
        Image::make($thumb)->save(public_path('uploads/project/'.$thumbname));
        // Thumbnail Making End
        ProjectModels::insert([
            'categoryId' => $request->categoryId,
            'photo' => $name,
            'thumbnail' => $thumbname,
            'title' => $request->title,
            'clientName' => $request->clientName,
            'startingDate' => $request->startingDate,
            'endDate' => $request->endDate,
            'location' => $request->location,
            'website' => $request->website,
            'shortDescription' => $request->shortDescription,
            'longDescription' => $request->longDescription,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('add','Successfully Added');
    }
    function projectManage()
    {
        $data = ProjectModels::all();
        return view('backend.project.manage',[
            'data' => $data,
        ]);
    }
    function projectEdit($id)
    {
        $cat = CategoryModels::all();
        $data = ProjectModels::where('id',$id)->first();
        return view('backend.project.edit',[
            'data' => $data,
            'cat' => $cat,
        ]);
    }
    function projectDelete($id)
    {
        $name = ProjectModels::where('id', $id)->first()->photo;
        $path = public_path('uploads/project/'.$name);
        unlink($path);
        $tname = ProjectModels::where('id', $id)->first()->thumbnail;
        $tpath = public_path('uploads/project/'.$tname);
        unlink($tpath);
        ProjectModels::where('id', $id)->delete();
        return back()->with('del','Deleted');
    }
    function projectUpdate(Request $request)
    {
            $request->validate([
                'categoryId' => 'required',
                'title' => 'required',
                'clientName' => 'required',
                'startingDate' => 'required',
                'location' => 'required',
                'website' => 'required',
                'shortDescription' => 'required',
                'longDescription' => 'required',
            ]);
            ProjectModels::find($request->id)->update([
                'categoryId' => $request->categoryId,
                'title' => $request->title,
                'clientName' => $request->clientName,
                'startingDate' => $request->startingDate,
                'endDate' => $request->endDate,
                'location' => $request->location,
                'website' => $request->website,
                'shortDescription' => $request->shortDescription,
                'longDescription' => $request->longDescription,
                'status' =>$request->status,
                'updated_at' =>Carbon::now(),
            ]);
            if ($request->image != '') {
                $request->validate([
                    'image' => 'required | image:jpeg,jpg,png | max:1000',
                ]);
                $img = ProjectModels::where('id',$request->id)->first()->photo;
                $path = public_path('uploads/project/'.$img);
                unlink($path);
                Image::make($request->image)->resize(500, 500)->save(public_path('uploads/project/'.$img));
                return redirect()->route('project.manage')->with('up','Updated');
            }
            elseif ($request->thumbnail != '') {
                $request->validate([
                    'thumbnail' => 'required | image:jpeg,jpg,png | max:1000',
                ]);
                $img = ProjectModels::where('id',$request->id)->first()->thumbnail;
                $path = public_path('uploads/project/'.$img);
                unlink($path);
                Image::make($request->thumbnail)->save(public_path('uploads/project/'.$img));
                return redirect()->route('project.manage')->with('up','Updated');
            }
            return redirect()->route('project.manage')->with('up','Updated');
    }
    function categoryLink()
    {
        $datas = CategoryModels::all();
        return view('backend.project.category',[
            'data' => $datas,
        ]);
    }
    function categoryStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        CategoryModels::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }
    function categoryDelete($id)
    {
        CategoryModels::where('id', $id)->delete();
        return back()->with('del','Deleted');
    }
}
