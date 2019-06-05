<?php

namespace App\metier;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;

class Laboratoire extends Model {

//On déclare la table Sejour
    protected $table = 'Laboratoire';
    protected $fillble = [
   'id_laboratoire',
    'nom_laboratoire',
    'chef_vente'
    ];
    // On peut ajouter ou modifier des données
    public $timetamps = true;
}