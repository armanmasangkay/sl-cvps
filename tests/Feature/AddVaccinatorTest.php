<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddVaccinatorTest extends TestCase
{
  public function test_add_vaccinator_form_can_be_rendered()
  {
      $view=$this->view('pages.admin.vaccinator-registration');
       $view->assertSee('Register a New Vaccinator');
  }

  public function test_add_vaccinator_can_be_accessed()
  {
      $response=$this->get(route('admin.vaccinator-registration'));
      $response->assertOk();
      $response->assertViewIs('pages.admin.vaccinator-registration');
  }
}
