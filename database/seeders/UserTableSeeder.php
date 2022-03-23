<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(config('app.debug') == true) {
            if (!User::where('email', 'test@test.com')->first())
                User::create([
                    'name' => 'Johny Tester',
                    'email' => 'test@test.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                ])->save();

                User::factory()
                    ->count(5)
                    ->create();
                dump("User factory - seeded");
        }
    }
}
