<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Person;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_form_can_be_rendered()
    {
        $response = $this->get(route('person.registration'));
        $response->assertViewIs('pages.register');
    }

    public function test_can_register_person_info()
    {
        $response = $this->post(route('person.registration'),[
            'qr_code'            => '123',
            'category'           => '1',
            'category_id'        => '1',
            'category_id_num'    => '1',
            'philhealth_id'      => 'N/A',
            'pwd_id'             => 'N/A',
            'last_name'          => 'sd',
            'first_name'         => 'eerw',
            'middle_name'        => 'N/A',
            'suffix'             => 'N/A',
            'current_reside_reg' => 'N/A',
            'current_reside_prov'=> 'asd',
            'current_reside_mun' => 'adfadsf',
            'current_reside_brgy'=> 'df',
            'sex'                => '33',
            'birth_date'         => 'dasf'
        ]);
        
        $response->assertRedirect(route('person.registration'));
        $response->assertSessionHas('title', 'Great!');
        $response->assertSessionHas('text', 'Registration was successful!');
    }

    public function test_verify_required_person_info_has_value()
    {
        $response = $this->post(route('person.registration'),[
            'qr_code'            => '123',
            'category'           => '1',
            'category_id'        => '1',
            'category_id_num'    => '1',
            'last_name'          => 'sd',
            'first_name'         => 'eerw',
            'current_reside_prov'=> 'asd',
            'current_reside_mun' => 'adfadsf',
            'current_reside_brgy'=> 'df',
            'sex'                => '33',
            'birth_date'         => 'were'
        ]);
        
        $response->assertRedirect(route('person.registration'));
        $response->assertSessionHasErrors();
    }
}
