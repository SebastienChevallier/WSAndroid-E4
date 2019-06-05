<?php

namespace App\metier;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;
class Etat extends Model {

    protected $table = 'Etat';
    protected $fillable = [
        'id',
        'libEtat'
    ];
    // On peut ajouter ou modifier des données
    public $timetamps = true;

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


}