<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'card_id',
    ];

    /**
     * Relation avec le modèle User (utilisateur qui a ajouté la carte)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec le modèle Card (carte ajoutée à la wishlist)
     */
    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
