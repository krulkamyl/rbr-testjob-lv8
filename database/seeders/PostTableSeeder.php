<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        if(config('app.debug') == true) {
            Post::factory()
                ->count(random_int(20, 300))
                ->create();

            dump("Post factory - seeded");
        }
    }
}
