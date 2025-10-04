<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Messages>
 */
class MessagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sender_id'   => \App\Models\User::inRandomOrder()->first()?->id ?? \App\Models\User::factory(),
            'receiver_id' => \App\Models\User::inRandomOrder()->first()?->id ?? \App\Models\User::factory(),
            'message'     => $this->faker->sentence(),
            'is_read'     => false,
        ];
    }
}
