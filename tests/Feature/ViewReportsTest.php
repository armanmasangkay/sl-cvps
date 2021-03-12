<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewReportsTest extends TestCase
{
    public function test_view_reports_ui_can_be_rendered()
    {
        $response=$this->get(route('superadmin.reports'));
        $response->assertViewIs('pages.superadmin.reports');
    }

    


}
