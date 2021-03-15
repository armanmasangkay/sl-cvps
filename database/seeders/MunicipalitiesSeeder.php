<?php

namespace Database\Seeders;

use App\Models\Municipality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private const MUNICIPALITIES_NAMES = [
        'Anahawan',
        'Bontoc',
        'Hinunangan',
        'Libagon',
        'Liloan',
        'Limasawa',
        'Maasin City',
        'Macrohon',
        'Malitbog',
        'Padre Burgos',
        'Pintuyan',
        'Saint Bernard',
        'San Francisco',
        'San Juan',
        'San Ricardo',
        'Silago',
        'Sogod',
        'Tomas Oppus'
    ];

    public function run()
    {
        foreach (self::MUNICIPALITIES_NAMES as $municipality) {
            Municipality::create([
                'municipality_name' => $municipality
            ]);
        }
    }
}
