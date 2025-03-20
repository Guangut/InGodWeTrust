<?php

namespace Database\Factories;

use App\Models\Supporter;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupporterFactory extends Factory
{
    protected $model = Supporter::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(18, 80),
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'support_type' => $this->faker->randomElement(['one-time', 'recurring']),
            'contribution_amount' => $this->faker->randomFloat(2, 50, 1000),
            'commit_duration' => $this->faker->numberBetween(1, 24), // e.g., in months
            'start_date' => $this->faker->date(),
            'bank_details' => $this->faker->bankAccountNumber,
            'testimonial_content' => $this->faker->sentence,
            'photo_url' => $this->faker->imageUrl,
        ];
    }
}
