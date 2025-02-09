<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Set;

class SetController extends Controller
{
    // Liste tous les chapitres
    public function listChapters()
    {
        return response()->json(Set::all());
    }

    // Détails d'un chapitre spécifique
    public function getChapterDetails($id)
    {
        $set = Set::findOrFail($id);
        return response()->json($set);
    }

    // Liste des cartes d'un chapitre
    public function getCardsByChapter($id)
    {
        $set = Set::findOrFail($id);
        return response()->json($set->cards);
    }
}
