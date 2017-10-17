<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyPDF128
 *
 * @author MIRADO
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require 'code128/PDF_Code128.php';
class MyPDF128 extends PDF_Code128{
    //put your code here
    private $titre;
    
    function __construct() {
        parent::__construct();
        $CI = & get_instance();
    }
    
    function getTitre() {
        return $this->titre;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }
}
