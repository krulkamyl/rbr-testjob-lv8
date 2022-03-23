<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(config('app.debug') == true) {
            Post::all()->each(function (Post $post) {
                $comments = Comment::factory()
                    ->count(random_int(5, 30))
                    ->make();

                $post->comments()->saveMany($comments);
            });

            dump("Comments factory - seeded");
        }
    }
}
