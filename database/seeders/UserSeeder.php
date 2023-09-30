<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultValue = [
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ];
        $admin =  User::create(array_merge([
            'name' => 'trilogikaedutama',
            'email' => 'trilogika@edutama.com',
        ], $defaultValue));

        $user = User::create(array_merge([
            'name' => 'test',
            'email' => 'test@gmail.com'
        ], $defaultValue));

        $roles = ['admin', 'guest'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $admin->assignRole('admin');
        $user->assignRole('guest');
    }
}
