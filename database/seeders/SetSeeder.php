<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Set;

class SetSeeder extends Seeder
{
    public function run()
    {
        Set::create([
            'api_id' => 1,
            'name' => 'Chapitre 1',
            'code' => 'CH1',
            'release_date' => '2024-01-01',
        ]);

        Set::create([
            'api_id' => 2,
            'name' => 'Chapitre 2',
            'code' => 'CH2',
            'release_date' => '2024-02-01',
        ]);
    }
}

