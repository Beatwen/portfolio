<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminEmail = env('DEFAULT_ADMIN_EMAIL');

        if (!User::where('email', $adminEmail)->exists()) {
            User::create([
                'name' => 'Administrator',
                'email' => $adminEmail,
                'password' => Hash::make(env('DEFAULT_ADMIN_PASSWORD')),
            ]);
        } else {
            echo "Admin user already exists\n";
        }
        $this->call(ProjectsTableSeeder::class);
    }
}
