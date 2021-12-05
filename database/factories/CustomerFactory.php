<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_first_name' => $this->faker->firstName(),
            'customer_last_name' => $this->faker->lastName(),
            'customer_email' => $this->faker->unique->email(),
            'customer_password' => $this->faker->password(),
            'customer_dob' => $this->faker->dateTime(),
            'customer_phone' => $this->faker->phoneNumber(),
            'customer_address' => $this->faker->address(),
        ];
    }
}
