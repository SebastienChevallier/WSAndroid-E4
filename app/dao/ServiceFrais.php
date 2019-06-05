<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 23/01/2019
 * Time: 17:31
 */

namespace App\dao;
use App\Exceptions\MonException;
use App\metier\Visiteur;
use Illuminate\Database\QueryException;
use DB;
use App\metier\FicheFrais;
use App\metier\Etat;


class ServiceFrais
{



    //Sélection d'un frais sur son ID
    public function getUnFrais($id)
    {
        try {
            $response = DB::table('frais')
                ->where('id_frais', '=', $id)
                ->first();
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }


    /**
     * Liste des fiches frais d'un visiteur
     * @return string|\listeFicheFrais : collection de FicheFrais
     **/

    public static function getListeFicheFrais($visitorId)
    {
        try {
            $response = DB::table('frais')
                ->select('id_frais', 'anneemois', 'id_visiteur', 'nbjustificatifs',
                    'datemodification', 'montantvalide', 'etat.id_etat', 'lib_etat')
                ->join('etat', 'frais.id_etat', '=', 'etat.id_etat')
                ->where('id_visiteur', '=', $visitorId)
                ->orderBy('id_frais')
                ->get();
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }
    /**
     * Lecture de toutes les fiches de Frais
     * d'un visiteur dont l'id est passé en paramètre
     * @param type $id_visiteur id du visiteur
     * @return type Collection de Frais
     */
    // on affichera seulement la période
    public function getFrais($id_visiteur)
    {
        try {
            $response = DB::table('frais')
                ->select('id_frais', 'anneemois', 'id_visiteur', 'nbjustificatifs',
                    'datemodification', 'montantvalide', 'etat.id_etat', 'lib_etat')
                ->join('etat', 'frais.id_etat', '=', 'etat.id_etat')
                ->where('frais.id_visiteur', '=', $id_visiteur)
                ->orderBy('id_frais')
                ->get();

            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    /**
     * Mise à jour d'une fiche de Frais
     * @param type $id_frais : id de la fiche de Frais à modifier
     * @param type $anneemois : période de la fiche de Frais à modifier
     * @param type $nbjustificatifs : Nb justificatifs de la fiche de Frais à modifier
     */
    public function updateFrais($id_frais, $anneemois, $nbjustificatifs) {
        try{
            $dateJour = date("Y-m-d");
            DB::table('frais')->where('id_frais', '=', $id_frais)
                ->update(['anneemois' => $anneemois, 'nbjustificatifs' => $nbjustificatifs,
                    'datemodification' => $dateJour]);
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

    /**
     * Ajout d'une fiche de Frais
     * @param type $anneemois : période de la fiche de Frais à ajouter
     * @param type $nbjustificatifs : Nb justificatifs de la fiche de Frais à ajouter
     * @param type $id_visiteur : id du visiteur de la fiche de Frais à ajouter
     */
    public function insertFrais($anneemois, $nbjustificatifs, $id_visiteur){
        try{
            $dateJour = date("Y-m-d");
            DB::table('frais')->insert(
                ['id_etat' => 1, 'anneemois' => $anneemois,
                    'nbjustificatifs' => $nbjustificatifs,
                    'datemodification' => $dateJour, 'id_visiteur'=> $id_visiteur,
                    'montantvalide'=> 0]
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

    /**
     * Suppression d'une fiche de Frais
     * @param type $id_frais : Id de la fiche de frais à supprimer
     */
    public function deleteFrais($id_frais){
        try{
            DB::table('frais')->where('id_frais', '=', $id_frais)->delete();
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


