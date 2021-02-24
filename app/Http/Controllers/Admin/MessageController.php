<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function manageMessage(){
        return view('admin.message.manage-message',[
            'messages'  =>  Message::all(),
        ]);
    }

    private function validateMessage($request){
        $request->validate([
            'name'      =>  ['required','max:50','min:3'],
            'email'     =>  ['required','max:50','min:3'],
            'subject'   =>  ['required','max:100','min:5'],
            'message'   =>  ['required','max:500','min:5'],
        ]);
    }
    public function visitorMessage(Request $request){
        $this->validateMessage($request);
        Message::newVisitorMessage($request);
        return redirect('/contact')->with('message','Thank you for contact with us!');
    }

    // view message

    public function viewMessage($id){
        $message = Message::find($id);
        $message->read_status = 1;
        $message->save();
        return view('admin.message.view-message',[
            'message'   =>  Message::find($id),
        ]);
    }

    // Delete message

    public function deleteMessage(Request $request){
        $message = Message::find($request->id);
        $message->delete();

        return redirect('/message/manage-message')->with('message','Message delete successfully!');
    }

}
