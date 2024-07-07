<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // get all available user ids
        $userIds = \App\Models\User::pluck('id')->toArray();
        return [
            'ownerId' => $this->faker->randomElement($userIds),
            'long_url' => $this->faker->url(),
            'short_url' => $this->faker->regexify('[A-Za-z0-9]{10}'),
        ];
    }
}
