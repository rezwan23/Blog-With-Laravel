<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function show(){
        $messages = Message::all();
        return view('admin.messages', ['messages'=>$messages]);
    }
    public function destroy(Request $request){
        $message = Message::find($request->id);
        $message->delete();
        return redirect()->route('messages')->with('success-message', 'Message Deleted Successfully!');
    }
}
