<?php

namespace Database\Seeders;

use App\Classes\Facades\User as FacadesUser;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //create admin
        Admin::factory()->create();

        //create superadmin
        Admin::factory()->create([
            'role'=>FacadesUser::SUPER_ADMIN,
            'username'=>'superadmin'
        ]);

        //create encoder
        Admin::factory()->create([
            'role'=>FacadesUser::ENCODER,
            'username'=>'encoder'
        ]);

    }
}
