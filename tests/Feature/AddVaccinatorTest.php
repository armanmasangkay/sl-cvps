<?php

namespace Tests\Feature;

use App\Classes\Facades\User as UserRole;
use App\Models\Municipality;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddVaccinatorTest extends TestCase
{
  use RefreshDatabase;

 
  public function test_add_vaccinator_can_be_accessed()
  {
    Municipality::factory()->create();
    $admin=User::factory()->create([
        'role'=>UserRole::ADMIN
    ]);

      $response=$this->actingAs($admin)->get(route('vaccinator.create'));
      $response->assertOk();
      $response->assertViewIs('pages.admin.vaccinator-registration');
  }


  public function test_fail_if_required_data_is_not_available()
  {
    Municipality::factory()->create();
    $admin=User::factory()->create([
        'role'=>UserRole::ADMIN
    ]);

    $response=$this->actingAs($admin)->post(route('vaccinator.store'),[
      'firstname'=>'',
      'middlename'=>'',
      'lastname'=>'',
      'position'=>'',
      'role'=>'',
      'facility_id'=>'',
      'prc'=>'',
      'municipality_id'=>''
    ]);
    
    $response->assertRedirect(route('vaccinator.create'));

    $response->assertSessionHasErrors([
      'firstname',
      'lastname',
      'position',
      'role',
      'facility_id',
      'prc',
      'municipality_id'
    ]);
    $this->assertDatabaseCount('vaccinators',0);
  
  }

  public function test_vaccinator_can_be_saved_to_db()
  {
    Municipality::factory()->create();
    $admin=User::factory()->create([
        'role'=>UserRole::ADMIN
    ]);

    $response=$this->actingAs($admin)->post(route('vaccinator.store'),[
      'firstname'=>'Arman',
      'middlename'=>'Macasuhot',
      'lastname'=>'Masangkay',
      'position'=>'Nurse',
      'role'=>'SampleRole',
      'facility_id'=>1,
      'prc'=>'2322',
      'municipality_id'=>1
    ]);

    $response->assertRedirect(route('vaccinator.create'));
    $response->assertSessionHasAll([
      'created'=>true,
      'title'  => 'Great!',
      'text'   =>'Vaccinator successfully registered.'
    ]);

    $this->assertDatabaseCount('vaccinators',1);
    $this->assertDatabaseHas('vaccinators',[
      'firstname'=>'Arman',
      'middlename'=>'Macasuhot',
      'lastname'=>'Masangkay',
      'position'=>'Nurse',
      'role'=>'SampleRole',
      'facility_id'=>1,
      'prc'=>'2322',
      'municipality_id'=>1
    ]);

  }
}
