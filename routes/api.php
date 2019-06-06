<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/* Authentification */

/*Route::post('/login', [
   'as' => 'signIn',
   'uses' => 'ControllerLogin@signIn'
]);*/

Route::post('/getConnexion', 'ControllerLogin@signIn');

Route::prefix('frais')->group(function () {
    Route::get('listeFrais/{id}', 'ControllerFrais@getListeFicheFrais');
    Route::get('listeFraisPeriode/{id}', 'ControllerFrais@getListeFraisPeriode');
    Route::get('getUnFrais/{id}', 'ControllerFrais@getUnFrais');
    Route::post('validate', 'ControllerFrais@validationFrais');
    Route::post('insertion', 'ControllerFrais@insertionFrais');
    Route::post('suppression', 'ControllerFrais@suppressionFrais');
});

Route::prefix('medicament')->group(function(){
    Route::get('listeMedic', 'ControllerMedicament@getListeMedic');
    Route::post('insertion','ControllerMedcament@insertionMedicament');
    Route::post('validate','ControllerMedcament@validationMedicament');
    Route::post('suppression','ControllerMedcament@suppressionMedicament');
});

Route::prefix('visiteur')->group(function () {
    Route::get('liste', 'ControllerVisiteur@getTousLesVisiteurs');
    Route::get('recherche/{id}', 'ControllerVisiteur@affiche');
    Route::post('ajout', 'ControllerVisiteur@ajout');
    Route::put('update/{id}', 'ControllerVisiteur@update');
    Route::delete('supprime/{id}', 'ControllerVisiteur@delete');
});