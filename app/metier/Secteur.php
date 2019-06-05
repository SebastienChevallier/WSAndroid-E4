<?php

namespace App\metier;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;

class Secteur extends Model {

//On déclare la table Sejour
    protected $table = 'Secteur';
    protected $fillable = [
        'id_secteur',
        'lib_secteur'
        ];
    // On peut ajouter ou modifier des données
    public $timetamps = true;
}