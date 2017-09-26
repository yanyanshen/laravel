<?php

namespace App\Jobs;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $email;//指定将邮件发送给谁

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        //
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        //第一种测试
        Mail::raw('队列测试',function($message){
            $message->to($this->email);
        });
        //第二种测试
//        Log::info('已发送邮件 - '.$this->email);
    }
}
