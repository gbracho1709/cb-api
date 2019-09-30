<?php

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
            'email' => $data->email,
            'token' => $data->token,
            'url' => env('APP_URL_ACTIVATE')
        );

        Mail::send(['html' => 'email.invitation'], $content, function ($msg) use ($data) {
            $msg->from('noreply@empleandolosheroes.com', 'Empleando los heroes');
            $msg->to($data->email);
            $msg->subject('Activar cuenta');
        });

        return "OK";
    }

    public function reset(Contact $data)
    {
        $content = array(
            'email' => $data->email,
            'token' => $data->token,
            'url' => env('APP_URL_RECOVERY')
        );

        Mail::send(['html' => 'email.reset'], $content, function ($msg) use ($data) {
            $msg->from('noreply@empleandolosheroes.com', 'Empleando los heroes');
            $msg->to($data->email);
            $msg->subject('Recuperar cuenta');
        });

        return "OK";
    }
}
