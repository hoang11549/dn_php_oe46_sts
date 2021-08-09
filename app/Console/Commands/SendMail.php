<?php

namespace App\Console\Commands;

use App\Jobs\FreeTraineeJob;
use App\Jobs\SendMailForDues;
use App\Models\User;
use App\Notifications\ListTrainee;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Pusher\Pusher;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'freeTraineeJob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification for Trainer about list Trainee Free everyday at 17:00';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $trainer = User::isTrainer()->get();
        $trainee = User::isTrainee()->free()->get();
        foreach ($trainer as $train) {
            $data = [
                'data' => $trainee,
                'email' => $train->email,
                'subject' => 'Danh Sach sinh vien'
            ];
            $dataNoti = [
                'type' => config('training.Notify.studentfree'),
                'role' => $train->role,
            ];
            $job = (new FreeTraineeJob(
                $data,
            ));
            dispatch($job)->onConnection('sync');
            $train->notify(new ListTrainee($dataNoti));
        }

        $dataPusher = [
            'type' => config('training.Notify.studentfree'),
            'listTrainer' => $trainer,
            'role' => $trainer[0]->role,
        ];
        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $pusher->trigger('TraineeFreeEvents', 'send-Trainee-free-', $dataPusher);
    }
}
