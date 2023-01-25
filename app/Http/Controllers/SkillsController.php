<?php

namespace App\Http\Controllers;

use App\Models\SkillsModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    function skillsLink()
    {
        $cont = SkillsModel::all()->count();
        $active = SkillsModel::where('status',1)->count();
        return view('backend.skills.index',[
            'count' => $cont,
            'active' => $active,
        ]);
    }
    function skillsStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'percentage' => 'required',
        ]);
        SkillsModel::insert([
            'name' => $request->name,
            'percentage' => $request->percentage,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('add','Successfully Added');
    }
    function skillsManage(){
        $data = SkillsModel::all();
        return view('backend.skills.manage',[
            'data' => $data
        ]);
    }
    function skillsEdit($id){
        $data = SkillsModel::where('id',$id)->first();
        return view('backend.skills.edit',[
            'data' => $data,
        ]);
    }
    function skillsDelete($id){
        SkillsModel::where('id', $id)->delete();
        return back()->with('del','Deleted');
    }
    function skillsUpdate(Request $request){
            $request->validate([
                'name' => 'required',
                'percentage' => 'required',
            ]);
            SkillsModel::find($request->id)->update([
                'name' => $request->name,
                'percentage' => $request->percentage,
                'status' => $request->status,
                'updated_at' =>Carbon::now(),
            ]);
            return redirect()->route('skills.manage')->with('up','Updated');
    }
}
