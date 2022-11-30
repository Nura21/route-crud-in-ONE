<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UserFactory extends Factory
{
    //email : nura@gmail.com
    //password : nura123
    public function definition()
    {
        return [
            // 'code' => 'U'.$this->faker->name(),
            'code' => 'Admin',
            'name' => $this->faker->name(),
            // 'email' => $this->faker->unique()->safeEmail(),
            'email' => 'nura@gmail.com',
            // 'email_verified_at' => now(),
            'phone' => $this->faker->phoneNumber(),
            'password' => Hash::make('nura123'), // password
            'remember_token' => Str::random(10),
        ];
    }
    
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
