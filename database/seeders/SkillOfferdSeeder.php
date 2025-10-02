<?php
namespace Database\Seeders;

use App\Models\SkillOfferd;
use Illuminate\Database\Seeder;

class SkillOfferdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SkillOfferd::factory()->count(10)->create();
    }
}
