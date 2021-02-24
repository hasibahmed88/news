<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'read_status',
    ];

    public static function newVisitorMessage($request){
        $message            = new Message();
        $message->name      =   $request->name;
        $message->email     =   $request->email;
        $message->subject   =   $request->subject;
        $message->message   =   $request->message;
        $message->save();
    }

}
