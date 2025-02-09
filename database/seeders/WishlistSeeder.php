<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wishlist;

class WishlistSeeder extends Seeder
{
    public function run()
    {
        Wishlist::factory()->count(50)->create(); // Crée 50 entrées de wishlist
    }
}
