<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Classes\Facades\User as UserRole;
use App\Models\Municipality;
use App\Models\User;
use Database\Seeders\MunicipalitiesSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddAdminTest extends TestCase
{
    use RefreshDatabase;
   
    public function test_display_add_admin_form_rendered()
    {
       Municipality::factory()->create();
        $superadmin=User::factory()->create([
            'role'=>UserRole::SUPER_ADMIN
        ]);
        
        $view = $this->actingAs($superadmin)->get(route('admin.create'));
        $view->assertViewIs('pages.superadmin.add-admin');
        
    }

    public function test_fail_if_username_already_exist()
    {

        Municipality::factory()->create();
        $superadmin=User::factory()->create([
            'role'=>UserRole::SUPER_ADMIN
        ]);

        User::factory()->create([
            'username'=>'amasangkay',
            'role'=>UserRole::ADMIN
        ]);

        $response = $this->actingAs($superadmin)->post(route('admin.store'), [
            'first_name' => 'JV',
            'last_name' => 'Cadz',
            'username' => 'amasangkay',
            'password' => '1234',
            'confirm_password' => '1234',
            'municipality'  =>  'Tomas Oppus',
        ]);

        $response->assertRedirect(route('admin.create'));
        $response->assertSessionHasErrors(['username']);
        $this->assertDatabaseMissing('users',[
            'first_name'=>'JV',
            'last_name'=>'Cadz'
        ]);
    }

    public function test_add_admin_user_with_valid_information()
    {
        Municipality::factory()->create();
        $superadmin=User::factory()->create([
            'role'=>UserRole::SUPER_ADMIN
        ]);

        $response = $this->actingAs($superadmin)->post(route('admin.store'), [
            'first_name'=>'Arman',
            'last_name'=>'Masangkay',
            'username'=>'arman',
            'password'=>'1234',
            'confirm_password'=>'1234', 
            'municipality'=>1,
            'role'=>UserRole::ADMIN
        ]);

        $response->assertRedirect(route('admin.create'));

        $response->assertSessionHasAll([
            'registered' => true,
            'title'      => 'Great!',
            'text'       => 'New admin account added'
        ]);

        $this->assertDatabaseHas('users', [
            'username' => 'arman',
            'role'=>UserRole::ADMIN
        ]);

        $this->assertDatabaseCount('users', 2);
    }

    public function test_fail_when_passwords_provided_does_not_match()
    {
        Municipality::factory()->create();

        $superadmin=User::factory()->create([
            'role'=>UserRole::SUPER_ADMIN
        ]);
        $response = $this->actingAs($superadmin)->post(route('admin.store'), [
            'first_name' => 'JV',
            'last_name' => 'Cadz',
            'username' => 'jvcadz',
            'password' => '12345',
            'confirm_password' => '1234',
            'municipality'  =>  1,
        ]);

        $response->assertRedirect(route('admin.create'));
        $response->assertSessionHasAll([
            'matched'  => false,
            'title'    => 'Warning!',
            'text' => 'Password does not match',
            '_old_input'
        ]);
     
        $this->assertDatabaseCount('users', 1);
    }

    public function test_should_fail_if_password_is_less_than_4_digit()
    {
        Municipality::factory()->create();
        $superadmin=User::factory()->create([
            'role'=>UserRole::SUPER_ADMIN
        ]);

        $response = $this->actingAs($superadmin)->post(route('admin.store'), [
            'first_name' => 'JV',
            'last_name' => 'Cadz',
            'username' => 'jvcadz',
            'password' => '123',
            'confirm_password' => '123',
            'municipality'  =>  1,
        ]);

        $response->assertRedirect(route('admin.create'));

        $response->assertSessionHasErrors([
            'password'
        ]);
        $this->assertDatabaseCount('users', 1);
    }

    public function test_fail_when_all_required_info_was_not_supplied()
    {
        Municipality::factory()->create();
        $superadmin=User::factory()->create([
            'role'=>UserRole::SUPER_ADMIN
        ]);
        $response = $this->actingAs($superadmin)->post(route('admin.store'), [
            'first_name' => '',
            'last_name' => '',
            'username' => '',
            'password' => '',
            'confirm_password' => '',
            'municipality'  =>  '',
        ]);

        $response->assertRedirect(route('admin.create'));

        $response->assertSessionHasErrors([
            'first_name',
            'last_name',
            'username',
            'password',
            'confirm_password',
            'municipality'
        ]);
    }

  
}
