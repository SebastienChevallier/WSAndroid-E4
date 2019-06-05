<?php

namespace App\metier;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;

class FraisHorsForfait extends Model {

//On déclare la table Sejour
    protected $table = 'FraisHorsForfait';
    protected $fillable = [
   'id',
   'dateFraisHorsForfait',
   'montantFraisHorsForfait',
   'libFraisHorsForfait',
   'idFicheFrais',
  ];
    // On peut ajouter ou modifier des données
    public $timetamps = true;

}
