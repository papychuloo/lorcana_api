<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\User;

class CardController extends Controller
{
    public function getCards(Request $request)
    {
        $cards = $request->user()->cards;
        return response()->json($cards);
    }

    public function updateCards(Request $request, $id)
    {
        $request->validate([
            'owned' => 'required|boolean'
        ]);

        $card = Card::findOrFail($id);
        $user = $request->user();

        if ($request->owned) {
            $user->cards()->attach($card);
        } else {
            $user->cards()->detach($card);
        }

        return response()->json(['message' => 'Card ownership updated']);
    }
}
