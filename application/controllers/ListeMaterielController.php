<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NouveauMaterielController
 *
 * @author MIRADO
 */
class ListeMaterielController extends My_Controller {
    private $sizeTable = 3;
    private $sizePagination = 4;
    
    //put your code here
    function __construct() {
        parent::__construct();
        $this->checkLogIn();
        $this->load->model('dao/MaterielDao');
    }

    function index() {
        $data = array(
            'exception' => '',
            'page' => 1,
            'materiels' => $this->MaterielDao->findAllMaterielPage($this->sizeTable,1),
            'pagination' => $this->MaterielDao->getPaginationMateriel($this->sizePagination, $this->sizeTable, 1)
        );

//        var_dump($data['pagination']);
        
        $this->load->view("crud/liste_materiel", $data);
    }

    function page($page){
        $data = array(
            'exception' => '',
            'pagination' => $this->MaterielDao->getPaginationMateriel($this->sizePagination, $this->sizeTable, intval($page)),
            'page' => intval($page),
            'materiels' => $this->MaterielDao->findAllMaterielPage($this->sizeTable,$page)
        );
        $this->load->view("crud/liste_materiel", $data);
    }
    
    function nextPage($last){
        $data = array(
            'exception' => '',
            'pagination' => $this->MaterielDao->getPaginationMateriel($this->sizePagination, $this->sizeTable, intval($last)),
            'page' => intval($last),
            'materiels' => $this->MaterielDao->findAllMaterielPage($this->sizeTable,$last)
        );

        $this->load->view("crud/liste_materiel", $data);
    }
    
    function previousPage($first){
        $pagination = $this->MaterielDao->getPaginationMateriel($this->sizePagination, $this->sizeTable, intval($first) - $this->sizePagination );
        
        $data = array(
            'exception' => '',
            'pagination' => $pagination,
            'page' => $first - 1,
            'materiels' => $this->MaterielDao->findAllMaterielPage($this->sizeTable,intval($first - 1))
        );
        $this->load->view("crud/liste_materiel", $data);
    }
    
    function ficheMateriel($indice) {
        $data = array(
            'exception' => '',
            'materiel' => $this->MaterielDao->findByIdMateriel($indice)
        );


        $this->load->view('crud/fiche_materiel', $data);
    }
    
    public function supprimer($idmateriel) {
        try {

            $this->BaseService->delete('materiel', $idmateriel);
            
            $data = array(
                'exception' => '',
                'materiels' => $this->MaterielDao->findAllMateriel()
            );
            $this->load->view("crud/liste_materiel", $data);
        } catch (Exception $ex) {

            $data = array(
                'exception' => $ex->getMessage(),
                'materiels' => $this->MaterielDao->findAllMateriel()
            );

            $this->load->view("crud/liste_materiel", $data);
        }
    }
}
