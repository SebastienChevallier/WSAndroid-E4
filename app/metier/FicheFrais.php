<?php

namespace App\metier;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;

class FicheFrais extends Model implements \JsonSerializable {

//On déclare la table Fichefrais
    protected $table = 'FicheFrais';
    protected $fillable = [
    'id',
    'anneeMois',
    'dateModification',
    'montantValide',
    'nbJustificatifs',
    'visitorId',
    'etat'
    ];
// On peut ajouter ou modifier des données
    public $timetamps = true;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getAnneeMois() {
        return $this->anneeMois;
    }

    public function setAnneeMois($anneeMois) {
        $this->anneeMois = $anneeMois;
    }

    public function getNbJustificatifs() {
        return $this->nbJustificatifs;
    }

    public function setNbJustificatifs($nbJustificatifs) {
        $this->nbJustificatifs = $nbJustificatifs;
    }

    public function getDateModification() {
        return $this->dateModification;
    }

    public function setDateModification($dateModification) {
        $this->dateModification = $dateModification;
    }

    public function getMontantValide() {
        return $this->montantValide;
    }

    public function setMontantValide($montantValide) {
        $this->montantValide = $montantValide;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
    }

    public function getVisitorId() {
        return $this->visitorId;
    }

    public function setVisitorId($visitorId) {
        $this->visitorId = $visitorId;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
