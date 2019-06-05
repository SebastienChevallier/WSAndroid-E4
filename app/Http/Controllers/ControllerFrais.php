<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 25/01/2019
 * Time: 14:10
 */

namespace App\Http\Controllers;

use App\dao\ServiceFrais;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\metier\FicheFraisT;
use App\metier\EtatT;
use App\Exceptions\MonException;
use Illuminate\Http\Request;


class ControllerFrais extends Controller
{

    // visualise les frais d'un visiteur
    public function getListeFicheFrais($id)
    {
        $listeFicheFrais = array();
        try
        {
            $unService= new ServiceFrais();
            $response=$unService->getListeFicheFrais($id);
            if ($response) {
                foreach ($response as $value) {
                   $ficheFrais = new FicheFraisT();
                    $ficheFrais->setId( (string)$value->id_frais);
                    $ficheFrais->setAnneeMois($value->anneemois);
                    $ficheFrais->setVisitorId( (string)$value->id_visiteur);
                    $ficheFrais->setNbJustificatifs( (string)$value->nbjustificatifs);
                    $ficheFrais->setDateModification($value->datemodification);
                    $ficheFrais->setMontantValide((string)$value->montantvalide);
                    $unEtat = new EtatT();
                    $unEtat->setId( (string)$value->id_etat);
                    $unEtat->setLibEtat($value->lib_etat);
                    $ficheFrais->setEtat($unEtat);
                    $listeFicheFrais[] = $ficheFrais;
                }
            }
            return json_encode($listeFicheFrais);
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 204);
        }
    }

    // visualise les frais d'une période d'un visiteur
    public function getListeFraisPeriode($id)
    {
        try
        {
            $unService= new ServiceFrais();
            $response=$unService->getFrais($id);
            return response()->json($response);
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 204);
        }
    }

// visualise les frais d'une période d'un visiteur
    public function getUnFrais($id)
    {
        try
        {
            $unService= new ServiceFrais();
            $response=$unService->getUnFrais($id);
            return response()->json($response);
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 204);
        }
    }



    /**
     * Enregistre le frais modifié
     * @param type $json
     * @return \
     * @throws Exception
     */
    public function validationFrais(Request $req)
    {
        try
        {
            $unService= new ServiceFrais();
            $id_frais = $req->input('id_frais');
            $anneemois = $req->input('anneemois');
            $nbjustificatifs = $req->input('nbjustificatifs');
            $uneReponse= $unService->updateFrais($id_frais,$anneemois,$nbjustificatifs );
            return response()->json($uneReponse);
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 201);
        }
    }

    /**
     * Enregistre un nouveau frais
     * @param type $json
     * @return \
     * @throws Exception
     */
    public function insertionFrais(Request $req)
    {
        try
        {
            $unService= new ServiceFrais();
            $anneemois = $req->input('anneemois');
            $nbjustificatifs = $req->input('nbjustificatifs');
            $id_visiteur = $req->input('id_visiteur');
            $uneReponse= $unService->insertFrais($anneemois,$nbjustificatifs,$id_visiteur );
            return response()->json($uneReponse);
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 201);
        }
    }


    /**
     * supprime un frais
     * @param type $json
     * @return \
     * @throws Exception
     */
    public function suppressionFrais(Request $req)
    {
        try
        {
            $unService= new ServiceFrais();
            $id_frais = $req->input('id_frais');
            $uneReponse= $unService->deleteFrais($id_frais );
            return response()->json($uneReponse);
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 201);
        }
    }

}