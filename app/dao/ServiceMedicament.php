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

    public function insertMedicament($id_famille, $nom_commercial, $prix){
        try{
            DB::table('medicament')->insert(
                [ 'id_famille' => $id_famille,
                    'nom_commercial' => $nom_commercial,
                    'prix_echantillon' => $prix]
            );
            $response = array(
                'status' => 200,
                'status_message' => 'Insertion réalisée'
            );
            return $response;
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }

    public function updateFrais($id_medicament, $nom_commercial, $prix_echantillon) {
        try{
            DB::table('medicament')->where('id_medicament', '=', $id_medicament)
                ->update(['nom_commercial' => $nom_commercial, 'prix_echantillon' => $prix_echantillon]);
            $response = array(
                'status' => 200,
                'status_message' => 'Modification réalisée'
            );
            return $response;
        }
        catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }

    public function deleteFrais($id_medicament){
        try{
            DB::table('medicament')->where('id_medicament', '=', $id_medicament)->delete();
            $response = array(
                'status' => 200,
                'status_message' => 'Suppression réalisée'
            );
            return $response;
        }
        catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }
}