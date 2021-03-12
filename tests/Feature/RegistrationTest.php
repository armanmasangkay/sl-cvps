<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    public function test_registration_form_can_be_rendered()
    {
        $response=$this->get(route('person.registration'));
        $response->assertViewIs('pages.register');

    }
}
