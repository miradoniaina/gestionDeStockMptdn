<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of etatStockGraphSplineService
 *
 * @author MIRADO
 */
class EtatStockGraphSplineService extends BaseService {

    //put your code here

    function __construct() {
        parent::__construct();
        $this->load->model('modele/EtatStockFamilleMois');
        $this->load->model('modele/EtatStockFamilleAnnuel');
        $this->load->model('dao/InventaireDao');
    }

    function etatAnneEnCour($annee) {
        $mois = "";
        $anneeTemp = "";
        $etatStatParMois = [];
        $anneeNow = (new DateTime())->format('Y');
                
        if (($annee === "") || ($annee===$anneeNow)) {
            $mois = (new DateTime())->format('m');
            $anneeTemp = $anneeNow;
        }else{
            $anneeTemp = $annee;
            $mois = 12 ;
        }

        for ($i = 0; $i < $mois; $i++) {
            $etatStatParMois[$i] = $this->InventaireDao->findAllInventaireByMonthYear($i, $anneeTemp);
        }

        return $etatStatParMois;
    }

}
