<?php

namespace App\Console\Commands;

    use App\User;
    use Illuminate\Console\Command;
    use Illuminate\Contracts\Mail\Mailer;

class DailyUpdates extends Command
{
    const SIGNATURE = 'update:send';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = self::SIGNATURE;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a daily update to a given email address';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $mailer = app('mailer');

        // we've gotta have tasks
        if (count(config('updates.tasks')) == 0) {
            return app('log')->error('No update sent since there are no tasks configured');
        }

        // randomly pick one of the predefined tasks
        $task = config('updates.tasks')[array_rand(config('updates.tasks'))];
        $body = $task['description'];

        $mailer->raw($body, function ($message) use ($task) {
            $message->to(config('updates.to'));
            $message->subject(config('updates.subject'));

            if (strlen(config('updates.from.email')) > 0) {
                if (strlen(config('updates.from.name')) > 0) {
                    $message->from(config('updates.from.email'), config('updates.from.name'));
                } else {
                    $message->from(config('updates.from.email'));
                }
            }

            // images are optional
            if (isset($task['image'])) {
                $message->attach($task['image']);
            }
        });

        app('log')->info('Update sent', [
            'task' => $task
        ]);
    }
}