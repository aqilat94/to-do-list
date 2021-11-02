<?php

namespace App\Jobs;

use App\Models\ToDoList;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendReminderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $list;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ToDoList $list)
    {
        $this->list = $list;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('email.send_reminder',[
            'title' => $this->list->title,             
            'description' => $this->list->description,
            'date' => $this->list->date,           
        ], function ($message) {             
            $message->to('test@mail.com');            
            $message->subject('Drone Created Email using Inline Mail');         
        });
    }
}
