<?php
/**
 * Created by PhpStorm.
 * User: Seb
 * Date: 30/05/2019
 * Time: 17:14
 */

namespace App\Http\Controllers;


use App\dao\ServiceMedicament;
use App\metier\MedicamentT;
use App\Exceptions\MonException;
use Illuminate\Http\Request;

class ControllerMedicament extends controller
{
    public function getListeMedic()
    {
        $listeMedic = array();
        try
        {
            $unService= new ServiceMedicament();
            $response=$unService->getMedicaments();
            if ($response) {
                foreach ($response as $value) {
                    $medic = new MedicamentT();
                    $medic->setId_medicament($value->id_medicament);
                    $medic->setId_famille ($value->id_famille);
                    //$medic->setDepot_legal( (string)$value->depot_legal);
                    $medic->setNom_commercial( $value->nom_commercial);
                    //$medic->setEffets( (string)$value->effets);
                    //$medic->setContre_indication( (string)$value->contre_indication);
                    $medic->setPrix_echantillon($value->prix_echantillon);
                    $listeMedic[] = $medic;
                }
            }
            return json_encode($listeMedic);
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 204);
        }
    }

    public function getUnMedic($id)
    {
        try
        {
            $unService= new ServiceMedicament();
            $response=$unService->getUnMedic($id);
            return response()->json($response);
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 204);
        }
    }


    public function insertionMedcament(Request $req)
    {
        try
        {
            $unService= new ServiceMedicament();
            $id_famille = $req->input('id_famille');
            $nom_commercial = $req->input('nom_commercial');
            $prix = $req->input('prix_echantillon');
            $uneReponse= $unService->insertMedicament($id_famille,$nom_commercial,$prix );
            return response()->json($uneReponse);
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 201);
        }
    }

    public function validationFrais(Request $req)
    {
        try
        {
            $unService= new ServiceMedicament();
            $id_medicament = $req->input('id_frais');
            $anneemois = $req->input('anneemois');
            $nbjustificatifs = $req->input('nbjustificatifs');
            $uneReponse= $unService->updateMedic();
            return response()->json($uneReponse);
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 201);
        }
    }

    public function suppressionFrais(Request $req)
    {
        try
        {
            $unService= new ServiceMedicament();
            $id_medicament = $req->input('id_medicament');
            $uneReponse= $unService->deleteMedic($id_medicament);
            return response()->json($uneReponse);
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 201);
        }
    }
}