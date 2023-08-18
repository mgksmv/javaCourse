<?php

namespace App\Console\Commands;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user {--email=} {--password=} {--role=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user account. Available roles: admin or user';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $email = $this->option('email');
        $password = $this->option('password');
        $role = $this->option('role');

        if (!$email) {
            $this->warn('Укажите --email!');
        }

        if (!$password) {
            $this->warn('Укажите --password!');
        }

        if (!$role) {
            $this->warn('Укажите --role! Варианты: admin или user');
        }

        if ($email && $password && $role) {
            $validRoles = ['admin', 'user'];

            if (!in_array($role, $validRoles)) {
                $this->warn('Укажите валидную роль: admin или user');
            } else {
                $userExists = User::query()->where('email', $email)->exists();

                if ($userExists) {
                    $this->error('Пользователь с таким email уже существует!');
                } else {
                    User::query()->create([
                        'email' => $email,
                        'password' => Hash::make($password),
                        'role' => $role === 'admin'
                            ? RoleEnum::ADMIN->name
                            : RoleEnum::USER->name
                    ]);

                    $this->info('Пользователь создан!');
                }
            }
        }
    }
}
