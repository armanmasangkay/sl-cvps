<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_display_add_admin_form_rendered()
    {
        $view = $this->get(route('admin.create'));
        $view->assertViewIs('pages.admin.add-new');
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
        $this->assertDatabaseHas('admins',[
            'username'=>'jvcadz'
        ]);
        $response->assertRedirect(route('admin.create'));
        $response->assertSessionHas('message', 'New Admin user added');
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
            'confirm_password'
        ]);

    }
}
