<?php

namespace Tests\Feature;

use App\Classes\Facades\User as FacadesUser;
use App\Models\Municipality;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ResetAdminPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_be_accessed_only_by_super_admin()
    {
        Municipality::factory()->create();
        $admin=User::factory()->create([
            'role'=>FacadesUser::ADMIN
        ]);
        $encoder=User::factory()->create([
            'role'=>FacadesUser::ENCODER
        ]);
        $super=User::factory()->create([
            'role'=>FacadesUser::SUPER_ADMIN
        ]);

        $response=$this->actingAs($admin)->post(route('reset.admin',$admin));
        $response2=$this->actingAs($encoder)->post(route('reset.admin',$admin));
        $response3=$this->actingAs($super)->post(route('reset.admin',$admin));
        $response->assertStatus(403);
        $response2->assertStatus(403);
        $response3->assertRedirect(route('admin.index'));
    }

    public function test_reset_successfully()
    {
        Municipality::factory()->create();
        $super=User::factory()->create([
            'role'=>FacadesUser::SUPER_ADMIN
        ]);
        $admin=User::factory()->create([
            'role'=>FacadesUser::ADMIN,
            'password'=>Hash::make('changeme')
        ]);

        $response=$this->actingAs($super)->post(route('reset.admin',$admin));
        
        $this->assertDatabaseMissing('users',[
            'password'=>$admin->password
        ]);
        $response->assertSessionHasAll([
            'success'=>true,
            'message'=>'Reset password succesful!'
        ]);

    }


}
