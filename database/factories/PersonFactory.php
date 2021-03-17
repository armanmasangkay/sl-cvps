<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category'=>Str::random(4),
            'qr_code'=>'',
            'category_id'=>Str::random(4),
            'category_id_num'=>Str::random(4),
            'philhealth_id'=>Str::random(4),
            'pwd_id'=>Str::random(4),
            'lastname'=>$this->faker->lastName,
            'firstname'=>$this->faker->firstName,
            'middlename'=>$this->faker->lastName,
            'suffix'=>'',
            'contact_num'=>random_int(0,9999999),
            'loc_region'=>8,
            'loc_prov'=>'Southern Leyte',
            'loc_muni'=>'Sogod',
            'loc_brgy'=>'San Roque',
            'sex'=>'Male',
            'birth_date'=>$this->faker->date()
        ];
    }
}
