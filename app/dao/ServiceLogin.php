<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 29/01/2019
 * Time: 14:23
 */

namespace App\dao;

use App\Exceptions\MonException;
use App\metier\Visiteur;
use Illuminate\Database\QueryException;
use DB;
use App\metier\FicheFrais;
use App\metier\Etat;

class ServiceLogin
{
    /**
     * Vérifie le login et mdp visiteur
     * @param type $json
     * @return \Visitor
     * @throws Exception
     */
    public function getConnexion($login_visiteur, $pwd_visiteur)
    {
        $visiteur=null;
        if ($login_visiteur != null) {
            try {
                $visiteur = DB::table('visiteur')
                    ->where('login_visiteur', '=', $login_visiteur)
                    ->first();
                if ($visiteur != null) {
                    if ($pwd_visiteur != $visiteur->pwd_visiteur) {
                        $response =null;
                    } else
                        $response =  $visiteur;
                } else
                    $response = null;

            } catch (QueryException $e) {
                throw new MonException($e->getMessage());
            }
        }
        return $response;
    }


    //SELECT BY ID d'un visiteur
    public function getById($id)
    {
        try {
            $visiteur = DB::table('visiteur')
                ->where('id_visiteur', '=', $id)
                ->first();
            $response = array(
                'status' => 1,
                'status_message' => "Identification correcte ",
                'data' => $visiteur
            );
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

}