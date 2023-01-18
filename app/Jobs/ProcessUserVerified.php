<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ProcessUserVerified implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email) {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        $user = User::where("email", $this->email)->first();
        $msg = "<a href='http://laravel-blog.local/".$user->remember_token."'>link</a>";
        mail(
            $this->email,
            "Register verified",
            $msg
        );
    }
}
