<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Mail;

class Email
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function invitation($data)
    {
        $content = array(
            'name' => $data->name,
            'email' => $data->email,
            'token' => $data->token,
            'url' => env('URL_ACTIVATE')
        );

        Mail::send(['html' => 'email.invitation'], $content, function ($msg) use ($data) {
            $msg->from('noreply@cb.com', 'Cabrera Business');
            $msg->to($data->email);
            $msg->subject('Activate account');
        });

        return "OK";
    }

    public function reset($data)
    {
        $content = array(
            'name' => $data->name,
            'email' => $data->email,
            'token' => $data->token,
            'url' => env('URL_RECOVERY')
        );

        Mail::send(['html' => 'email.reset'], $content, function ($msg) use ($data) {
            $msg->from('noreply@cb.com', 'Cabrera Business');
            $msg->to($data->email);
            $msg->subject('Recover account');
        });

        return "OK";
    }
}
