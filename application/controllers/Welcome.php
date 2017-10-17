<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->model('modele/DetailTransfertModele');
        $this->load->model('modele/MaterielModele');
        $this->load->model("dao/InventaireDao");
        $this->load->model("dao/PersonnelViewDao");
        $this->load->model("dao/InventaireFluxDao");
        $this->load->model("dao/ReferenceSortieDao");
        $this->load->model("services/BaseService");
        $this->load->model("services/EtatStockGraphSplineService");
    }

    public function index() {
        $this->load->view('welcome_message');
        $this->load->model("dao/InventaireDao");
        $this->load->model("dao/ListeReferenceDao");
    }

    public function test() {

//        mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);

        $options = [
            'cost' => 10,
            'salt' => 's1s2s3s5s4s8s6s5s3s2s6',
        ];

        var_dump($options);

        $hash = password_hash("itu", PASSWORD_BCRYPT, $options);

        echo $hash . "<br>";

        echo password_verify("itu", $hash) . "<br>";
    }

    public function test1() {
        try{
            $date = date_create("Mon Jan 30 2017 00:00:00");
            
            var_dump($date);
//            $ehh = new DateTime(date_format($date, "Y-m-d H:i"));
//            
//            var_dump($ehh);
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function affichage() {
        $conditionsPorteSource = array(
                    'numero' => '116'
        );

        $porteSource = $this->BaseService->findWhereAndEquals('porte', $conditionsPorteSource);

        var_dump($porteSource[0]->id_porte);
        
        var_dump($this->ReferenceSortieDao->compareReferenceByIdPorte(1, 'refmarqueur-89'));
    }

    function testform($annee = "") {
        echo json_encode($this->EtatStockGraphSplineService->etatAnneEnCour($annee));
    }

}
