<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition(): array
    {
        return [
            'code' => strtoupper($this->faker->unique()->bothify('MBR-###')),
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ];
    }
}
