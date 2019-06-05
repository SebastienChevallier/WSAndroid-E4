<?php

namespace App\metier;

class FicheFraisT implements \JsonSerializable {

    private $id;
    private $anneeMois;
    private $dateModification;
    private $montantValide;
    private $nbJustificatifs;
    private $visitorId;
    private $etat;

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
