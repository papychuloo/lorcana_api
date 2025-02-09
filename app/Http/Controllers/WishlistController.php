<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\User;

class WishlistController extends Controller
{
    public function getWishlist(Request $request)
    {
        return response()->json($request->user()->wishlist);
    }

    public function addToWishlist(Request $request)
    {
        $request->validate([
            'card_id' => 'required|exists:cards,id'
        ]);

        $card = Card::findOrFail($request->card_id);
        $request->user()->wishlist()->attach($card);

        return response()->json(['message' => 'Card added to wishlist']);
    }

    public function removeFromWishlist(Request $request)
    {
        $request->validate([
            'card_id' => 'required|exists:cards,id'
        ]);

        $card = Card::findOrFail($request->card_id);
        $request->user()->wishlist()->detach($card);

        return response()->json(['message' => 'Card removed from wishlist']);
    }
}
