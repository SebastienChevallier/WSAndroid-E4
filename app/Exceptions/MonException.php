<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Exceptions;

use Exception;

class MonException extends Exception 
{
    protected $message = 'Unknown exception';     // Message d'erreur
    private   $string;                            // inconnu
    protected $code    = 0;                       // Code d'erreur de l'utilisateur
    protected $file;                              // fichier source
    protected $line;                              // ligne de l'erreur
    private   $trace;                             // inconnu

   public function __construct($message, $code = 0, Exception $previous = null)
    {
        if (!$message) {
            throw new $this('Unknown '. get_class($this));
        }
        parent::__construct($message, $code);
    }
   
    public function __toString()
    {
        return get_class($this) . " '{$this->message}' in {$this->file}({$this->line})\n"
                                . "{$this->getTraceAsString()}";
    }
}