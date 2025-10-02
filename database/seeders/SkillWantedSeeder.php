<?php
namespace Database\Seeders;

use App\Models\SkillWanted;
use Illuminate\Database\Seeder;

class SkillWantedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SkillWanted::factory()->count(10)->create();
    }
}
