<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        return [
            'firstname' => $this->faker->firstName($gender),
            'lastname' => $this->faker->lastName($gender),
            'dob' => $this->faker->dateTimeBetween('-20 years', '-10 years'),
            'place_of_birth' => $this->faker->city,
            'gender' => $gender,
            'mothers_name' => $this->faker->name('female'),
            'fathers_name' => $this->faker->name('male')
        ];
    }
}
