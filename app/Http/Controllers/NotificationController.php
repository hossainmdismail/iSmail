<?php

namespace App\Http\Controllers;

use App\Models\MessagesModels;
use App\Models\PromotionModels;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    function messageLink(){
        $data = MessagesModels::paginate(15);
        return view('backend.notification.manage',[
            'data' => $data,
        ]);
    }
    function messageEdit($id){
        $data = MessagesModels::where('id', $id)->first();
        $data->update([
            'seen' => 0,
        ]);
        return view('backend.notification.edit',[
            'data' => $data,
        ]);
    }
    function subscribeLink(){
        $data = PromotionModels::paginate(15);
        PromotionModels::where('seen',1)->update([
            'seen' => 0,
        ]);
        return view('backend.notification.index',[
            'data' => $data,
        ]);
    }
    function check(){
        PromotionModels::where('seen',1)->update([
            'seen' => 0,
        ]);
        MessagesModels::where('seen',1)->update([
            'seen' => 0,
        ]);
        return back();
    }
}
