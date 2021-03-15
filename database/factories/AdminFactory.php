<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
        'last_name'      => $this->faker->lastName,
        'username'       => 'admin',
        'password'       => bcrypt('1234'),
        'municipality_id'   => '18',
        'role'          => '1',
        ];
    }
}
