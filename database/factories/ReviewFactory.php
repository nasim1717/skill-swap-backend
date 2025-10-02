<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reviewer_id'      => \App\Models\User::inRandomOrder()->first()?->id ?? \App\Models\User::factory(),
            'reviewed_user_id' => \App\Models\User::inRandomOrder()->first()?->id ?? \App\Models\User::factory(),
            'rating'           => $this->faker->numberBetween(1, 5),
            'comment'          => $this->faker->sentence(),
        ];
    }
}
