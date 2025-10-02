<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 10 verified users (default factory definition)
        // User::factory()->count(10)->create();

        // 5 unverified users (explicit state call)
        User::factory()->count(5)->unverified()->create();

        // 1 specific admin user (optional, fixed data)
        // User::factory()->create([
        //     'full_name'         => 'Admin User',
        //     'email'             => 'admin@example.com',
        //     'password'          => bcrypt('password'), // default password
        //     'email_verified_at' => null,
        // ]);
    }
}
