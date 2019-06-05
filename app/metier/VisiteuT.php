<?php
namespace App\metier;

class VisiteuT implements \JsonSerializable
{

       private $id_visiteur;
        private $id_laboratoire;
        private $id_secteur;
        private $nom_visiteur;
         private $prenom_visiteur;
         private $adresse_visiteur;
         private $cp_visiteur;
         private $ville_visiteur;
         private $date_embauche;
         private $login_visiteur;
         private $pwd_visiteur;
         private $type_visiteur;


    public function getId_visiteur() {
        return $this->id_visiteur;
    }

    public function setId_visiteur($id) {
        $this->id_visiteur = $id;
    }
    public function setNom_visiteur($nom_visiteur)
    {
        $this->nom_visiteur = $nom_visiteur;
    }
    public function getNom_visiteur()
    {
        return $this->nom_visiteur;
    }
    public function setPrenom_visiteur($prenom_visiteur)
    {
        $this->prenom_visiteur = $prenom_visiteur;
    }
    public function getPrenom_visiteur()
    {
        return $this->prenom_visiteur;
    }
    public function setAdresse_visiteur($adresse_visiteur)
    {
        $this->adresse_visiteur= $adresse_visiteur;
    }
    public function getAdresse_visiteur()
    {
        return $this->adresse_visiteur;
    }
    public function setCp_visiteur($cp_visiteur)
    {
        $this->cp_visiteur = $cp_visiteur;
    }
    public function getCp_visiteur()
    {
        return $this->cp_visiteur;
    }
    public function setVille_visiteur($ville_visiteur)
    {
        $this->ville_visiteur= $ville_visiteur;
    }
    public function getVille_visiteur()
    {
        return $this->ville_visiteur;
    }
    public function setDate_embauche($date_embauche)
    {
        $this->date_embauche = $date_embauche;
    }
    public function getDate_embauche()
    {
        return $this->date_embauche;
    }
    public function getLogin_visiteur() {
        return $this->login_visiteur;
    }
    public function setLogin_visiteur($login_visiteur) {
        $this->login_visiteur = $login_visiteur;
    }
    public function getPwd_visiteur() {
        return $this->pwd_visiteur;
    }
    public function setPwd_visiteur($pwd_visiteur) {
        $this->pwd_visiteur = $pwd_visiteur;
    }

    public function geType_visiteur()
    {
        return $this->type_visiteur;
    }
    public function setType_visiteur($type_visiteur) {
        $this->type_visiteur = $type_visiteur;
    }
    public function getId_secteur() {
         return $this->id_secteur;
    }
    public function setId_secteur($id_secteur) {
         $this->id_secteur = $id_secteur;
     }
    public function getId_laboratoire() {
         return $this->id_laboratoire;
     }
    public function setId_laboratoire($id_laboratoire) {
         $this->id_laboratoire = $id_laboratoire;
     }
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}