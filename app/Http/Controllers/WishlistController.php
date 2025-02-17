<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Ajouter une carte à la wishlist
    public function add(Request $request)
    {
        $request->validate([
            'card_id' => 'required|exists:cards,id',
        ]);

        $user = Auth::user(); // Récupère l'utilisateur authentifié

        // Vérifie si la carte existe et si elle n'est pas déjà dans la wishlist
        $card = Card::findOrFail($request->card_id);

        $wishlist = Wishlist::firstOrCreate([
            'user_id' => $user->id,
            'card_id' => $card->id,
        ]);

        return response()->json([
            'message' => 'Carte ajoutée à la wishlist avec succès',
            'wishlist_item' => $wishlist,
        ]);
    }

    // Retirer une carte de la wishlist
    public function remove(Request $request, $id)
    {
        $user = Auth::user(); // Récupère l'utilisateur authentifié

        // Vérifie si l'élément de la wishlist existe pour cet utilisateur
        $wishlistItem = Wishlist::where('user_id', $user->id)
                                ->where('card_id', $id)
                                ->first();

        // Si l'élément n'existe pas dans la wishlist
        if (!$wishlistItem) {
            return response()->json(['error' => 'Carte non trouvée dans la wishlist'], 404);
        }

        // Supprime l'élément de la wishlist
        $wishlistItem->delete();

        return response()->json([
            'message' => 'Carte retirée de la wishlist avec succès',
        ]);
    }

    public function list(Request $request)
{
    $user = Auth::user(); // Récupère l'utilisateur authentifié

    // Récupère les éléments de la wishlist pour cet utilisateur
    $wishlistItems = Wishlist::where('user_id', $user->id)->get();

    return response()->json([
        'wishlist' => $wishlistItems,
    ]);
}

}
