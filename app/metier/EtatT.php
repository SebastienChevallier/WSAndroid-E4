<?php
namespace App\metier;
class EtatT implements \JsonSerializable
{
    private $id;
    private $libEtat;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getLibEtat() {
        return $this->libEtat;
    }

    public function setLibEtat($libEtat) {
        $this->libEtat = $libEtat;
    }


    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}