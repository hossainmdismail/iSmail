<?php

namespace App\Http\Controllers;

use App\Models\AdminDashboardModels;
use App\Models\MessagesModels;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
class AdminDashboardController extends Controller
{
    function dashboardLink()
    {
        $cont = AdminDashboardModels::all()->count();
        $active = AdminDashboardModels::where('status',1)->count();
        return view('backend.Dashboard.index',[
            'count' => $cont,
            'active' => $active,
        ]);
    }
    function dashboardStore(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'careerTitle' => 'required',
            'careerDescription' => 'required',
            'image' => 'required | image:jpeg,jpg,png | max:1000',
        ]);
        // Image Making
        $img = $request->image;
        $extention = $img->getClientOriginalExtension();
        $name = 'A'.rand(1,2000).'D'.rand(1,500).'.'.$extention;
        Image::make($img)->save(public_path('uploads/dashboard/'.$name));
        // Image Making End

        AdminDashboardModels::insert([
            'name' => $request->fname.' '.$request->lname,
            'careerTitle' => $request->careerTitle,
            'careerDescription' => $request->careerDescription,
            'image' => $name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('add','Successfully Added');
    }
    function dashboardManage()
    {
        $data = AdminDashboardModels::all();
        return view('backend.Dashboard.manage',[
            'data' => $data,
        ]);
    }
    function dashboardEdit($id)
    {
        $data = AdminDashboardModels::where('id',$id)->first();
        return view('backend.Dashboard.edit',[
            'data' => $data,
        ]);
    }
    function dashboardDelete($id)
    {
        $name = AdminDashboardModels::where('id', $id)->first()->image;
        $path = public_path('uploads/dashboard/'.$name);
        unlink($path);
        AdminDashboardModels::where('id', $id)->delete();
        return back()->with('del','Deleted');
    }
    function dashboardUpdate(Request $request)
    {
        if ($request->image == '') {
            $request->validate([
                'name' => 'required',
                'careerTitle' => 'required',
                'careerDescription' => 'required',
            ]);
            AdminDashboardModels::find($request->id)->update([
                'name' => $request->name,
                'careerTitle' => $request->careerTitle,
                'careerDescription' => $request->careerDescription,
                'status' =>$request->status,
                'updated_at' =>Carbon::now(),
            ]);
            return redirect()->route('dashboard.manage')->with('up','Updated');
        }else {
            $request->validate([
                'image' => 'required | image:jpeg,jpg,png | max:1000',
            ]);
            $img = AdminDashboardModels::where('id',$request->id)->first()->image;
            $path = public_path('uploads/dashboard/'.$img);
            unlink($path);
            Image::make($request->image)->save(public_path('uploads/dashboard/'.$img));
            AdminDashboardModels::find($request->id)->update([
                'name' => $request->name,
                'careerTitle' => $request->careerTitle,
                'careerDescription' => $request->careerDescription,
                'status' =>$request->status,
                'updated_at' =>Carbon::now(),
            ]);
            return redirect()->route('dashboard.manage')->with('up','Updated');

        }
    }
}
