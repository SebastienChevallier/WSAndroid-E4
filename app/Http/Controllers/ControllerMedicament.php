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
                    $medic->setId_medicament( (string)$value->id_medicament);
                    $medic->setId_famille( (string)$value->id_famille);
                    //$medic->setDepot_legal( (string)$value->depot_legal);
                    $medic->setNom_commercial( (string)$value->nom_commercial);
                    //$medic->setEffets( (string)$value->effets);
                    //$medic->setContre_indication( (string)$value->contre_indication);
                    $medic->setPrix_echantillon( (string)$value->prix_echantillon);
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
}