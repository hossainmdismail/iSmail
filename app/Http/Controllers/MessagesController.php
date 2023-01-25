<?php

namespace App\Http\Controllers;

use App\Models\CategoryModels;
use App\Models\MessagesModels;
use App\Models\ProjectModels;
use App\Models\PromotionModels;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'comments' => 'required',
        ]);
        MessagesModels::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'comments' => $request->comments,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('succ', 'Message Sent Successfully !');
    }
    function promotion(Request $request){
        $request->validate([
            'email' => 'required|unique:promotion_models,email',
        ]);
        PromotionModels::insert([
            'email' => $request->email,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('succ','Subscribed');
    }
    function allProject(){
        $project = ProjectModels::all();
        $cat = CategoryModels::all();
        return view('frontend.project.all',[
            'projects' => $project,
            'cat' => $cat,
        ]);
    }
    function singleProject($id){
        $project = ProjectModels::where('id',$id)->first() ;
        return view('frontend.project.single',[
            'project' => $project,
        ]);
    }
}
