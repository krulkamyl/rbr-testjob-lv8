<?php

namespace App\Console\Commands;

use App\Http\Repository\UserRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUser extends Command
{
    private UserRepositoryInterface $userRepository;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user
                                {name? : User name}
                                {email? : User email}
                                {password? : User password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user from cli with artisan';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $input['email'] = ($this->argument('email') === null)
            ? $this->ask('E-mail')
            : $this->argument('email');

        if ($this->userRepository->whereEmail($input['email']) !== null && filter_var($input['email'], FILTER_VALIDATE_EMAIL))
            return $this->error('E-mail is incorrect or used');

        $input['name'] = ($this->argument('name') === null)
            ? $this->ask('Name')
            : $this->argument('name');

        if (Str::length($input['name']) < 3)
            return $this->error('Name must have at least 3 characters');

        $input['password'] = ($this->argument('password') === null)
            ? $this->secret('Password')
            : $this->argument('password');

        if (Str::length($input['password']) < 8)
            return $this->error('Password must have at least 8 characters');

        $input['password'] = Hash::make($input['password']);
        $input['email_verified_at'] = now()->toDateTimeString();
        $input['remember_token'] = Str::random(10);

        if ($this->userRepository->create($input))
            return $this->alert('User was created');
        else
            return $this->error('User is no created');
    }
}
