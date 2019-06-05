<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 23/01/2019
 * Time: 14:20
 */

namespace App\Http\Controllers;

use App\dao\Service;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\metier\Visiteur;
use App\Exceptions\MonException;


class ControllerVisiteur extends Controller
{
    // visualise tous les visiteurs
    public function getTousLesVisiteurs()
        {
            return Visiteur::all();
        }

        // visualise un visiteur sur son id
        public function affiche($id)
        {
            try
            {
                $unService= new Service();
                $unVisiteur=$unService->getById($id);
                return response()->json($unVisiteur, 200);
            }
            catch (MonException $e) {
                $erreur = $e->getMessage();
                return response()->json($erreur, 200);
            }
        }



        public function ajout(Request $request)
        {
            return Visiteur::create($request->all());
        }

        public function update(Request $request, $id)
        {
            $Visiteur = Visiteur::findOrFail($id);
            $Visiteur->update($request->all());

            return $Visiteur;
        }

        public function delete(Request $request, $id)
        {
            $Visiteur = Visiteur::findOrFail($id);
            $Visiteur->delete();

            return 204;
        }
}