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
        // we've gotta have tasks
        if (count(config('updates.tasks')) == 0) {
            return app('log')->error('No update sent since there are no tasks configured');
        }

        // randomly pick one of the predefined tasks
        $task = config('updates.tasks')[array_rand(config('updates.tasks'))];

        $ch = curl_init();
        
        $fields = [
            'userEmail' => config('updates.from.email'),
            'costCenterId' => $task['costCenter'],
            'updateContent' => $task['description'],
            'password' => config('updates.token')
        ];
        // images are optional
        if (isset($task['image'])) {
            $fields['image'] = curl_file_create(storage_path($task['image']));
        }
        curl_setopt($ch, CURLOPT_URL, config('updates.url'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

        $result = curl_exec($ch);
        $result = json_decode($result,true);

        if ($result['status']) {
            app('log')->info('Update sent', [
                'task' => $task
            ]);
        } else {
            app('log')->error('Update error');
        }

    }
}