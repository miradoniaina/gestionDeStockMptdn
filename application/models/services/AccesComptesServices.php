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
class AccesComptesServices extends BaseService {

    function __construct() {
        parent::__construct();
    }

    //put your code here
    public function confirmerCompte($idCrypte) {
        $this->load->model('UtilisateurDao');
        $this->load->helper('array');
        $this->load->library('encrypt');

        $id = $this->encrypt->decode(str_replace(" ", "+", $idCrypte));

        $userEnAttente = $this->UtilisateurDao->findByIdUserEnAttenteAConfirme($id);

        if ($userEnAttente == null) {
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

    function login($email, $pasw) {
        try {
            $options = [
                'cost' => 10,
                'salt' => $this->getSalt($email)
            ];

            $hash = password_hash($pasw, PASSWORD_BCRYPT, $options);

            $sql = "SELECT *,count(*) FROM personnel WHERE email='" . $email . "' AND mdp='" . $hash . "' GROUP BY id_personnel";

            $query = $this->db->query($sql);

            foreach ($query->result() as $row) {
                return $row;
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function getSalt($email) {
        try {
            $sql = "SELECT salt FROM personnel WHERE email='" . $email . "'";
            $query = $this->db->query($sql);

            if (count($query->result()) != 0) {
                return $query->result()[0]->salt;
            } else {
                throw new Exception("email et mot de passe non valide...");
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function loginManager($email, $pasw) {

        $sql = "SELECT count(*),* FROM manager WHERE email='" . $email . "' AND mdp='" . $pasw . "' GROUP BY id_manager";

        $query = $this->db->query($sql);

        foreach ($query->result() as $row) {
            return $row;
        }
    }

    function inscription($email, $nom, $prenom, $matricule, $idService, $porte, $telephone, $profil, $mdp, $poste) {
        try {
            $conditionsPorte = array(
                'numero' => $porte
            );
            
            $idPorte = 0;

            if (count($this->BaseService->findWhereAndEquals('porte', $conditionsPorte)) == 0) {
                throw new Exception("la porte insérée n'éxiste pas");
            } else {
                $idPorte = $this->BaseService->findWhereAndEquals('porte', $conditionsPorte)[0]->id_porte;
            }

            $arrayConditionInscription = array(
                'id_service' => $idService,
                'id_role_personnel' => 3,
                'id_porte' => $idPorte,
                'matricule' => $matricule,
                'nom' => $nom,
                'prenom' => $prenom,
                'contact' => $telephone,
                'email' => $email,
                'mdp' => $mdp,
                'poste' => $poste,
                'salt' => 'salt',
                'profil' => $profil
            );

            $this->save('personnel', $arrayConditionInscription);
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
