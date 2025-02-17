<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\SetController;
use App\Http\Controllers\WishlistController;

//route Api pour les utilisateurs
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});
//route pour les cartes
Route::get('/sets', [SetController::class, 'listChapters']);
Route::get('/sets/{id}', [SetController::class, 'getChapterDetails']);
Route::get('/sets/{id}/cards', [SetController::class, 'getCardsByChapter']);

// Gestion des cartes utilisateurs
Route::get('/me/cards', [CardController::class, 'getCards']);
Route::post('/me/{id}/update-owned', [CardController::class, 'updateCards']);

//route api pour la wishlist
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/wishlist/add', [WishlistController::class, 'add']);  // Ajoute une carte à la wishlist
    Route::post('/wishlist/remove/{id}', [WishlistController::class, 'remove']);  // Retirer une carte de la wishlist
    Route::get('/wishlist', [WishlistController::class, 'list']);  // Liste des éléments de la wishlist
});



