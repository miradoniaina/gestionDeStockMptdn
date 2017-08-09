<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccesCompteServices
 *
 * @author MIRADO
 */
class AccesComptesServices extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }

    //put your code here
    public function confirmerCompte($idCrypte){
       $this->load->model('UtilisateurDao');
       $this->load->helper('array');
       $this->load->library('encrypt');
       
       $id = $this->encrypt->decode(str_replace(" ", "+", $idCrypte));
       
       $userEnAttente = $this->UtilisateurDao->findByIdUserEnAttenteAConfirme($id);
       
       if($userEnAttente==null){
           throw new Exception("La confirmation de votre compte est éxpiré! Veuillez vous inscrire à nouveau!");
       }
       
       $this->load->helper('array');
       
       $data = array(
            'id_utilisateur' => $id,
            'email' => $userEnAttente->getEmail(),
            'mdp' => $userEnAttente->getMdp(),
            'date_confirmation' => unix_to_human(now(), TRUE, 'eu')
        );
       
        $this->db->insert("utilisateur_confirme", $data);
    }
    
    
    function login($email,$pasw){
        $options = [
            'cost' => 10,
            'salt' => $this->getSalt($email)
        ];
        
        $hash = password_hash($pasw, PASSWORD_BCRYPT , $options);
        
        $sql="SELECT *,count(*) FROM personnel WHERE email='".$email."' AND mdp='".$hash."' GROUP BY id_personnel";
        
        $query = $this->db->query($sql);
      
        foreach ($query->result() as $row) {
             return $row;
        }
    }
    
    
    function getSalt($email){
        $sql="SELECT salt FROM personnel WHERE email='". $email ."'";
        
        $query = $this->db->query($sql);
        
        return $query->result()[0]->salt;
    }
    
    function loginManager($email,$pasw){
        
        $sql="SELECT count(*),* FROM manager WHERE email='".$email."' AND mdp='".$pasw."' GROUP BY id_manager";
        
        $query = $this->db->query($sql);
      
        foreach ($query->result() as $row) {
             return $row;
        }
    }
}