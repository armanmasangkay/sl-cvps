<?php

namespace Tests\Feature;

use App\Classes\Facades\User as UserRole;
use App\Models\Municipality;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VaccineTest extends TestCase
{

    use RefreshDatabase;

    public function test_display_the_add_form_vaccine()
    {
        Municipality::factory()->create();
        $admin=User::factory()->create([
            'role'=>UserRole::ADMIN
        ]);
        $response = $this->actingAs($admin)->get(route('vaccine.create'));
        $response->assertViewIs('pages.admin.add-vaccines');
    }

    public function test_add_vaccine_with_valid_information()
    {
        $municipality=Municipality::factory()->create();

        $admin=User::factory()->create([
            'role'=>UserRole::ADMIN
        ]);

        
        $response = $this->actingAs($admin)->post(route('vaccine.store'),[
            'vaccine_name' => 'Pfizer',
            'batch_number'  =>   '1',
            'lot_number'    =>   '1',
            'vaccine_manufacturer'  =>  'Pfizer',
            'municipality_id' =>$municipality->id
            ]);

        $response->assertRedirect(route('vaccine.create'));
        $response->dumpSession();
        $response->assertSessionHasAll([
            'created' => true,
            'title' => 'Great!',
            'text' => 'New vaccine added'
        ]);

        $this->assertDatabaseHas('vaccines', [
            'batch_number'  => '1'
        ]);

        $this->assertDatabaseCount('vaccines', 1);
    }

    public function test_fail_if_required_information_are_not_supplied()
    {

        Municipality::factory()->create();
        $admin=User::factory()->create([
            'role'=>UserRole::ADMIN
        ]);
        $response = $this->actingAs($admin)->post(route('vaccine.store'), [
            'batch'                 =>      '',
            'lot_number'            =>      '',
            'vaccine_manufacturer'  =>      '',
            'municipality_id'       =>      '',
        ]);

        $response->assertRedirect(route('vaccine.create'));
        $response->assertSessionHasErrors([
            'batch_number',
            'vaccine_manufacturer',
            'municipality_id'
        ]);
    }

    public function test_fail_if_supplied_municipality_not_exist_in_database_list()
    {
        Municipality::factory()->create();
        $admin=User::factory()->create([
            'role'=>UserRole::ADMIN
        ]);

    
        $response = $this->actingAs($admin)->post(route('vaccine.store'), [
            'batch_number'          =>      '1',
            'lot_number'            =>      '1',
            'vaccine_manufacturer'  =>      'Pfizer',
            'municipality_id'          =>    99
        ]);

        $response->assertRedirect(route('vaccine.create'));
        $response->assertSessionHasErrors(['municipality_id']);
    }
}
