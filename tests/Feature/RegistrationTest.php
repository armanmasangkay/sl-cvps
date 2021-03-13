<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Person;

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

    public function test_fail_registration_when_all_required_files_are_not_filled()
    {
        $response=$this->post(route('person.register'),[
            'category'=>'123',
            'category_id'=>'1',
            'category_id_num'=>'112',
            'philhealth_id'=>'N/A',
            'pwd_id'=>'N/A',
            'lastname'=>'lk',
            'firstname'=>'sdfg',
            'middlename'=>'N/A',
            'suffix'=>'N/A',
            'contact_num'=>'435645',
            'loc_region'=>'N/A',
            'loc_prov'=>'dsf',
            'loc_muni'=>'fg',
            'loc_brgy'=>'dsfg',
            'sex'=>'sdfg',
            'birth_date'=>'FDl',
        ]);
        
        $response->assertRedirect(route('person.register'));
        $response->assertSessionHasErrors([
            'category'=>'Please select category',
            'category_id'=>'Please enter category ID',
            'category_id_num'=>'Please enter category ID number',
            'lastname'=>'Please enter last name',
            'firstname'=>'Please enter first name',
            'contact_num'=>'Please provide working contact number',
            'loc_region'=>'Please enter residence region',
            'loc_prov'=>'Please enter residence province',
            'loc_muni'=>'Please enter residence municipality',
            'loc_brgy'=>'Please enter residence barangay',
            'sex'=>'Please select gender',
            'birth_date'=>'Please specify your birthdate',
        ]);
        
        $this->assertDatabaseCount('people', 0);
    }


    public function test_save_registration_data()
    {
        $response=$this->post(route('person.register'),[
            'category'=>'Health Care Worker',
            'category_id'=>'PRC Number',
            'category_id_num'=>'123123',
            'philhealth_id'=>'N/A',
            'pwd_id'=>'N/A',
            'lastname'=>'Masangkay',
            'firstname'=>'Arman',
            'middlename'=>'Macasuhot',
            'suffix'=>'N/A',
            'contact_num'=>'097573757475',
            'loc_region'=>'Region 8',
            'loc_prov'=>'Southern Leyte',
            'loc_muni'=>'Malitbog',
            'loc_brgy'=>'San Jose',
            'sex'=>'male',
            'birth_date'=>'1992-01-07'
        ]);
        $response->dump();
        $response->assertRedirect(route('person.register'));
        $response->assertSessionHas([
            'registered'=>true,
            'message'=>'Registration went through successfully. Thank you!'
        ]);

        $this->assertDatabaseCount('people',1);
        $this->assertDatabaseHas('people',[
            'firstname'=>'Arman',
            'lastname'=>'Masangkay',
            'middlename'=>'Macasuhot',
        ]);

    }


}
