<?php

namespace App\Http\Controllers;

use App\Models\ContactModels;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function contactLink()
    {
        $cont = ContactModels::all()->count();
        $active = ContactModels::where('status',1)->count();
        return view('backend.contact.index',[
            'count' => $cont,
            'active' => $active,
        ]);
    }
    function contactStore(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'information' => 'required',
        ]);
        ContactModels::insert([
            'icon' => $request->icon,
            'title' => $request->title,
            'information' => $request->information,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('add','Successfully Added');
    }
    function contactManage()
    {
        $data = ContactModels::all();
        return view('backend.contact.manage',[
            'data' => $data
        ]);
    }
    function contactEdit($id)
    {
        $data = ContactModels::where('id',$id)->first();
        return view('backend.contact.edit',[
            'data' => $data,
        ]);
    }
    function contactDelete($id)
    {
        ContactModels::where('id', $id)->delete();
        return back()->with('del','Deleted');
    }
    function contactUpdate(Request $request)
    {
            $request->validate([
                'title' => 'required',
                'information' => 'required',
            ]);
            ContactModels::find($request->id)->update([
                'title' => $request->title,
                'information' => $request->information,
                'status' => $request->status,
                'updated_at' =>Carbon::now(),
            ]);
            return redirect()->route('contact.manage')->with('up','Updated');
    }
}
