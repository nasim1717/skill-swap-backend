<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SkillOfferd>
 */
class SkillOfferdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
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
            ]),
        ];
    }
}
