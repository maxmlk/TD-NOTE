<?php

use App\Http\Controllers\{Auth\LoginController, Auth\LogoutController, BuildingsController, HomeController};
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::get("/login", [LoginController::class, "index"])->name("auth.login");
    Route::post("/login", [LoginController::class, "store"]);
});

Route::middleware("auth")->group(function () {
    Route::get("/", HomeController::class)->name("index");
    Route::get("/logout", LogoutController::class)->name("auth.logout");
    Route::get("/reservation", [HomeController::class, "create"]);
    Route::post("/reservation", [HomeController::class, "create_post"]);
    Route::get("/reservation_index", [HomeController::class, "index"]);
    Route::get("reservation/{reservation}/delete ", [HomeController::class, "reservation_delete"]);
    // Début des routes pour la gestion des bâtiments -----
    Route::prefix("buildings")->name("buildings.")->group(function () {
        Route::get("/", [BuildingsController::class, "index"]);
        Route::get("/create", [BuildingsController::class, "create"]);
        Route::post("/create", [BuildingsController::class, "create_post"]);
        Route::get("/{building} ", [BuildingsController::class, "buildings_edit"]);
        Route::post("/{building} ", [BuildingsController::class, "buildings_post"]);
        Route::get("/{building}/delete ", [BuildingsController::class, "buildings_delete"]);
        



                /*
                - GET /buildings/:building :        Formulaire de modification d'un bâtiment  
                - POST /buildings/:building :       Traitement du formulaire de modification
                - GET /buildings/:building/delete : Suppression d'un bâtiment*/
    });
    
    // Fin des routes pour la gestion des bâtiments -------
});
