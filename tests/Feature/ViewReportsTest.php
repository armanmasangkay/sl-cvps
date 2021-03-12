<?php

namespace Tests\Feature;

use App\Models\Person;
use App\Models\Vaccination;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewReportsTest extends TestCase
{
    use RefreshDatabase;
    public function test_view_reports_ui_can_be_rendered()
    {
        $response=$this->get(route('superadmin.reports'));
        $response->assertViewIs('pages.superadmin.reports');
    }
    public function test_view_reports_ui_with_vaccinated_individuals()
    {
        $person=Person::create([
            'category'=>'Category Example',
            'category_id'=>1,
            'category_id_num'=>1,
            'philhealth_id'=>123,
            'pwd_id'=>'1231231',
            'lastname'=>'Masangkay',
            'firstname'=>'Arman',
            'middlename'=>'Macasuhot',
            'suffix'=>'',
            'contact_num'=>'09231231',
            'loc_region'=>'Region 8',
            'loc_prov'=>'Southern Leyte',
            'loc_muni'=>'Sogod',
            'sex'=>'male',
            'birth_date'=>'2017-08-20'
        ]);
        Vaccination::create([
            'person_id'=>$person->id,
        ]);

        $response=$this->get(route('superadmin.reports'));

        $response->dump();
        $response->assertViewIs('pages.superadmin.reports');
        $response->assertViewHas('vaccinateds');
        
        $hasVaccinateds=$response['vaccinateds']->count()>0?true:false;
        $vaccinatedPerson=$response['vaccinateds']->first();
        $this->assertEquals('Arman',$vaccinatedPerson->firstname);
        $this->assertTrue($hasVaccinateds);
    }







}
