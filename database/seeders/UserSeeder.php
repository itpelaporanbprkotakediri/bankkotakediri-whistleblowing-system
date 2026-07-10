<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = [
            [
                'username' => 'superadmin',
                'name'     => 'Superadmin',
                'email'    => 'superadmin@' . config('app.domain'),
                'password' => env('SEED_SUPERADMIN_PASSWORD', 'password123'),
                'role'     => 'superadmin',
            ],
            [
                'username' => 'developer',
                'name'     => 'Developer',
                'email'    => 'developer@' . config('app.domain'),
                'password' => env('SEED_DEVELOPER_PASSWORD', 'password123'),
                'role'     => 'superadmin',
            ],
            [
                'username' => 'admin',
                'name'     => 'Admin',
                'email'    => 'admin@' . config('app.domain'),
                'password' => env('SEED_ADMIN_PASSWORD', 'password123'),
                'role'     => 'admin',
            ],
            [
                'username' => 'user1',
                'name'     => 'User 1',
                'email'    => 'user1@' . config('app.domain'),
                'password' => env('SEED_USER_PASSWORD', 'password123'),
                'role'     => 'user',
            ],
        ];

        foreach ($usersData as $data) {
            // firstOrCreate berdasarkan username (unique)
            $user = User::firstOrCreate(
                ['username' => $data['username']],
                [
                    'uuid'              => Str::uuid(),
                    'name'              => $data['name'],
                    'email'             => $data['email'],
                    'email_verified_at' => now(),
                    'password'          => Hash::make($data['password']),
                    'remember_token'    => Str::random(10),
                ]
            );

            // Assign role (Spatie's assignRole bersifat idempotent/aman dipanggil berulang)
            $user->assignRole($data['role']);
        }
    }
}