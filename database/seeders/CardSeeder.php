<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Card;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Card::insert([
            [
                'set_id' => 1,  // Assure-toi d'avoir un set avec cet ID
                'name' => 'Mickey Mouse',
                'type' => 'Character',
                'rarity' => 'Rare',
                'description' => 'A brave and adventurous hero.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'set_id' => 1,
                'name' => 'Elsa, Ice Queen',
                'type' => 'Character',
                'rarity' => 'Legendary',
                'description' => 'Controls ice and snow.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
