<?php

namespace App\Http\Controllers;

use App\Models\ServiceModels;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function serviceLink()
    {
        $cont = ServiceModels::all()->count();
        $active = ServiceModels::where('status',1)->count();
        return view('backend.service.index',[
            'count' => $cont,
            'active' => $active,
        ]);
    }
    function serviceStore(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'offerTitle' => 'required',
            'offerDescription' => 'required',
        ]);
        ServiceModels::insert([
            'icon' => $request->icon,
            'offerTitle' => $request->offerTitle,
            'offerDescription' => $request->offerDescription,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('add','Successfully Added');
    }
    function serviceManage()
    {
        $data = ServiceModels::all();
        return view('backend.service.manage',[
            'data' => $data
        ]);
    }
    function serviceEdit($id)
    {
        $data = ServiceModels::where('id',$id)->first();
        return view('backend.service.edit',[
            'data' => $data,
        ]);
    }
    function serviceDelete($id)
    {
        ServiceModels::where('id', $id)->delete();
        return back()->with('del','Deleted');
    }
    function serviceUpdate(Request $request)
    {
            $request->validate([
                'offerTitle' => 'required',
                'offerDescription' => 'required',
            ]);
            ServiceModels::find($request->id)->update([
                'offerTitle' => $request->offerTitle,
                'offerDescription' => $request->offerDescription,
                'status' => $request->status,
                'updated_at' =>Carbon::now(),
            ]);
            return redirect()->route('service.manage')->with('up','Updated');
    }
}
