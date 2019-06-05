<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 24/01/2019
 * Time: 15:23
 */


namespace App\Http\Controllers;
use App\dao\ServiceLogin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\metier\Visiteur;
use App\Exceptions\MonException;
use App\metier\VisiteuT;
use Illuminate\Http\Request;

class ControllerLogin extends Controller
{

    public function signIn()
    {
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $visiteurJson = json_decode($json);
            if ($visiteurJson != null) {
                $login_visiteur=$visiteurJson->login_visiteur;
                $pwd_visiteur=$visiteurJson->pwd_visiteur;
                $unService = new ServiceLogin();
                $uneReponse = $unService->getConnexion($login_visiteur, $pwd_visiteur);
                $visiteur = new VisiteuT();
                $visiteur->setId_visiteur($uneReponse->id_visiteur);
                $visiteur->setNom_visiteur($uneReponse->nom_visiteur);
                $visiteur->setPrenom_visiteur($uneReponse->prenom_visiteur);
                return json_encode($visiteur);
            }
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur);
        }
    }
}