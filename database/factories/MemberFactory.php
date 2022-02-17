<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = ['male', 'female'];
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'code' => $this->faker->randomNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'gender' => $gender[array_rand($gender)],
            'nationality' => $this->faker->country(),
            'id_no' => $this->faker->randomNumber(),
            'mobile' => $this->faker->randomNumber(),
            'birth_date' => $this->faker->dateTimeThisCentury->format('Y-m-d'),
            'note' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'is_active' => true
        ];
    }
}
