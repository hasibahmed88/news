<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    public static function newVisitorInfo($request){
        $visitor    = new Visitor();

        $visitor->first_name        =  $request->first_name;
        $visitor->last_name         =  $request->last_name;
        $visitor->email             =  $request->email;
        $visitor->password          =  bcrypt($request->password);
        $visitor->save();

        Session()->put('visitorId',$visitor->id);
        Session()->put('visitorName',$visitor->first_name.' '.$visitor->last_name);

        $data = $visitor->toArray();
        Mail::send('front.mail.congratulations-mail',$data, function($message) use ($data){
            $message->to($data['email']);
            $message->subject('Congratulations Mail');
        });

    }

}
