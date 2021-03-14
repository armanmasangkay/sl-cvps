<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddVaccinatorTest extends TestCase
{
  use RefreshDatabase;

  public function test_add_vaccinator_form_can_be_rendered()
  {
      $view=$this->view('pages.admin.vaccinator-registration');
       $view->assertSee('Register a New Vaccinator');
  }

  public function test_add_vaccinator_can_be_accessed()
  {
      $response=$this->get(route('vaccinator.create'));
      $response->assertOk();
      $response->assertViewIs('pages.admin.vaccinator-registration');
  }

  public function test_vaccinator_can_be_saved_to_db()
  {
    $response=$this->post(route('vaccinator.store'),[
      'firstname'=>'Arman',
      'middlename'=>'Macasuhot',
      'lastname'=>'Masangkay',
      'position'=>'nurse',
      'role'=>'encoder',
      'facility'=>'RHU Malitbog',
      'prc'=>'123456'
    ]);

    $response->assertRedirect(route('vaccinator.create'));
    $response->assertSessionHasAll([
        'created'=>true,
        'message'=>'Vaccinator successfully registered.'
    ]);

    $this->assertDatabaseCount('vaccinators',1);
    $this->assertDatabaseHas('vaccinators',[
      'firstname'=>'Arman',
      'middlename'=>'Macasuhot',
      'lastname'=>'Masangkay',
      'position'=>'nurse',
      'role'=>'encoder',
      'facility'=>'RHU Malitbog',
      'prc'=>'123456'
    ]);

  }
}
