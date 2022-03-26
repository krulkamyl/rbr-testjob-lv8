<?php

namespace App\Console;

use App\Repository\Eloquent\PostRepository;
use App\Models\Post;
use Faker\Factory;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Http;
use Spatie\Activitylog\Models\Activity;

class Kernel extends ConsoleKernel
{

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function() {
            $faker = Factory::create();
            echo Http::localhostApi()->post('posts', [
                'title' => $faker->text(200),
                'content' => $faker->realText(1500),
                'author' => $faker->userName().' CRON'
            ]);
        })->hourly();

        $schedule->call(function () {
            $postRepository = new PostRepository(new Post());
            $activity = Activity::where('event', 'cron-adding')->latest('id')->first();
            if (!$activity && $activity->created_at->diffInMinutes(now()) >= 36) {
                Http::localhostApi()->post('comments', [
                    'post_id' => $postRepository->randomPost()->id,
                    'content' => 'tak',
                    'author' => 'Bot cron'
                ]);
                activity()->event('cron-adding')->log('cron add new comment');
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
