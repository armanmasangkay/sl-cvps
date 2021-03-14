<?php

namespace Tests\Feature;

use App\Models\Municipality;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VaccineTest extends TestCase
{

    // use RefreshDatabase;

    public function test_display_the_add_form_vaccine()
    {
        $response = $this->get(route('vaccine.create'));
        $response->assertViewIs('pages.vaccine.add-vaccine');
    }

    public function test_add_vaccine_with_valid_information()
    {
        $response = $this->post(
            route('vaccine.store'),
            [
                'batch_number'          =>      '1',
                'lot_number'            =>      '1',
                'vaccine_manufacturer'  =>      'Pfizer',
                'municipality_id'          =>      'Tomas Oppus'
            ]
        );


        $response->assertRedirect(route('vaccine.create'));
        $response->assertSessionHasAll([
            'created' => true,
            'message' => 'New vaccine added'
        ]);

        $this->assertDatabaseHas('vaccines', [
            'batch_number'  => '1'
        ]);

        $this->assertDatabaseCount('vaccines', 1);
    }

    public function test_fail_if_required_information_are_not_supplied()
    {
        $response = $this->post(route('vaccine.store'), [
            'batch'                 =>      '',
            'lot_number'            =>      '',
            'vaccine_manufacturer'  =>      '',
            'municipality_id'       =>      '',
        ]);

        $response->assertRedirect(route('vaccine.create'));
        $response->assertSessionHasErrors([
            'batch_number',
            'lot_number',
            'vaccine_manufacturer',
            'municipality_id'
        ]);
    }

    public function test_fail_if_supplied_municipality_not_exist_in_database_list()
    {
        $response = $this->post(route('vaccine.store'), [
            'batch_number'          =>      '1',
            'lot_number'            =>      '1',
            'vaccine_manufacturer'  =>      'Pfizer',
            'municipality_id'          =>      'Tomas Oppussss'
        ]);

        $response->assertRedirect(route('vaccine.create'));
        $response->assertSessionHasErrors(['municipality_id']);
    }
}
