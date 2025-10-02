<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SkillwantedFactory extends Factory
{

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()?->id ?? \App\Models\User::factory(),
            'skills'  => fake()->randomElement([
                'javascript,python,english',
                'c,c++,UI,Ux',
                'php,laravel,mysql',
                'html,css,tailwind',
                'react,react native,vue',
                'angular,angularjs,angular material',
                'nodejs,express,mongodb',
            ]),
        ];
    }
}
