<?php

namespace App\Modele;

class User
{
    protected $table = 'users';
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = array('login', 'email', 'password', 'fiche_id', 'fiche_type');
    protected $visible = array('login', 'email', 'fiche_type');
    protected $hidden = array('password', 'rememberToken');


}