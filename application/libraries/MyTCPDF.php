<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyTCPDF
 *
 * @author MIRADO
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require('tcpdf/tcpdf.php');

class MyTCPDF extends TCPDF{
    //put your code here
    function __construct() {
        parent::__construct();
        $CI = & get_instance();
    }
}
