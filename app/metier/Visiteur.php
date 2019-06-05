<?php

namespace App\metier;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;


class Visiteur extends Model {

//On déclare la table Sejour
    protected $table = 'Visiteur';
    protected $fillable = [
       'id_visiteur',
        'id_laboratoire',
        'id_secteur',
        'nom_visiteur',
         'prenom_visiteur',
         'adresse_visiteur',
         'cp_visiteur',
         'ville_visiteur',
         'date_embauche',
         'login_visiteur',
         'pwd_visiteur',
         'type_visiteur'
   ];

    // On peut ajouter ou modifier des données
    public $timetamps = true;



}