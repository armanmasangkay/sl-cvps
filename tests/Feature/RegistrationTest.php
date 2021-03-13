<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    //save registration data
    //

    use RefreshDatabase;

    public function test_registration_form_can_be_rendered()
    {
        $response=$this->get(route('person.register'));
        $response->assertViewIs('pages.register');
    }


    public function test_save_registration_data()
    {
        $response=$this->post(route('person.register'),[
            'category'=>'Health Care Worker',
            'category_id'=>'PRC Number',
            'category_id_num'=>'123123',
            'philhealth_id'=>'',
            'pwd_id'=>'',
            'lastname'=>'Masangkay',
            'firstname'=>'Arman',
            'middlename'=>'Macasuhot',
            'suffix'=>'',
            'contact_num'=>'097573757475',
            'loc_region'=>'Region 8',
            'loc_prov'=>'Southern Leyte',
            'loc_muni'=>'Malitbog',
            'sex'=>'male',
            'birth_date=>1992-01-07'
        ]);

        $response->assertRedirect(route('person.register'));
        $response->assertSessionHas([
            'registered'=>true,
            'message'=>'Registration went through successfully. Thank you!'
        ]);

        $this->assertDatabaseHas('people',[
            'firstname'=>'Arman',
            'lastname'=>'Masangkay',
            'middlename'=>'Macasuhot',
        ]);

    }


}
