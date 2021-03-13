<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AddAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_display_add_admin_form_rendered()
    {
        $view = $this->get(route('admin.create'));
        $view->assertViewIs('pages.admin.add-new');
    }

    public function test_fail_if_username_already_exist()
    {

        Admin::create([
            'first_name'=>'Arman',
            'last_name'=>'Masangkay',
            'username'=>'amasangkay',
            'password'=>Hash::make('1234'),
            'municipality'=>'Malitbog',
        ]);

        $response = $this->post(route('admin.store'),[
            'first_name'=>'JV',
            'last_name'=>'Cadz',
            'username'=>'amasangkay',
            'password'=>'1234',
            'confirm_password'=>'1234',
            'municipality'  =>  'Tomas Oppus',
        ]);
 
        $response->assertRedirect(route('admin.create'));
        $response->assertSessionHasErrors(['username']);
        $this->assertDatabaseCount('admins',0);
    }

    public function test_add_admin_user_with_valid_information()
    {
        $response = $this->post(route('admin.store'),[
            'first_name'=>'JV',
            'last_name'=>'Cadz',
            'username'=>'jvcadz',
            'password'=>'1234',
            'confirm_password'=>'1234',
            'municipality'  =>  'Tomas Oppus',
        ]);
     
        $response->assertRedirect(route('admin.create'));
        $response->assertSessionHas([
            'created'=>true,
            'message'=>'New Admin user added'
        ]);

        $this->assertDatabaseHas('admins',[
            'username'=>'jvcadz'
        ]);

        $this->assertDatabaseCount('admins',1);
        
    }

    public function test_fail_when_passwords_provided_does_not_match()
    {
        $response = $this->post(route('admin.store'),[
            'first_name'=>'JV',
            'last_name'=>'Cadz',
            'username'=>'jvcadz',
            'password'=>'12345',
            'confirm_password'=>'1234',
            'municipality'  =>  'Tomas Oppus',
        ]);
        $response->assertRedirect(route('admin.create'));
        $response->assertSessionHasErrors([
            'password'
        ]);
        $this->assertDatabaseCount('admins',0);
    }

    public function test_should_fail_if_password_is_less_than_4_digit()
    {
        $response = $this->post(route('admin.store'),[
            'first_name'=>'JV',
            'last_name'=>'Cadz',
            'username'=>'jvcadz',
            'password'=>'123',
            'confirm_password'=>'123',
            'municipality'  =>  'Tomas Oppus',
        ]);
        $response->assertRedirect(route('admin.create'));
        $response->assertSessionHasErrors([
            'password'
        ]);
        $this->assertDatabaseCount('admins',0);

    }
    
    public function test_fail_when_all_required_info_was_not_supplied()
    {
        $response = $this->post(route('admin.store'),[
            'first_name'=>'',
            'last_name'=>'',
            'username'=>'',
            'password'=>'',
            'confirm_password'=>'',
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
