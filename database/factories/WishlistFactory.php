<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Wishlist;
use App\Models\User;
use App\Models\Card;

class WishlistFactory extends Factory
{
    protected $model = Wishlist::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'card_id' => Card::factory(),
        ];
    }
}
