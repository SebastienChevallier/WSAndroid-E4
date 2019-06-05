<?php
/**
 * Created by PhpStorm.
 * User: Seb
 * Date: 30/05/2019
 * Time: 17:15
 */

namespace App\dao;
use App\Exceptions\MonException;
use App\metier\Visiteur;
use Illuminate\Database\QueryException;
use DB;

class ServiceMedicament
{
    public function getMedicaments(){
        $lesMedicaments = DB::table('medicament')
            ->Select('id_medicament','id_famille','nom_commercial','prix_echantillon')
            ->get();
        return $lesMedicaments;
    }
}