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
        $view = $this->get(route('admin.index'));
        $view->assertViewIs('add-admin');
    }
}
