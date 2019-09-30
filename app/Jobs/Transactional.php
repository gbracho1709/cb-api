<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;

class Transactional extends Job
{
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $content = array(
            'name' => $this->data->name,
            'email' => $this->data->email,
            'token' => $this->data->token,
            'url' => env('URL_ACTIVATE')
        );

        Mail::send(['html' => 'email.invitation'], $content, function ($msg) {
            $msg->from('noreply@cb.com', 'Cabrera Business');
            $msg->to($this->data->email);
            $msg->subject('Activate account');
        });
    }
}
