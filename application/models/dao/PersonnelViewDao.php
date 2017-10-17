<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersonnelViewDao
 *
 * @author MIRADO
 */
class PersonnelViewDao extends BaseService {

    function __construct() {
        $this->load->model('modele/PersonnelModele');
    }

    //put your code here
    public function findPersonnelViewDao($idPersonnel) {
        try {
            $sql = "SELECT 
 pers.id_personnel,
 pers.nom, 
 pers.prenom, 
 po.id_porte, 
 po.id_direction porte_id_direction, 
 po.numero , 
 serv.id_service, 
 serv.id_direction, 
 serv.service, 
 dep.departement departement_service, 
 dir.*,
 dep1.departement departement_direction 
FROM 
(SELECT p.id_personnel,p.nom, p.prenom, p.id_service,p.id_porte 
	FROM personnel p 
	WHERE id_personnel = ?) pers 
LEFT JOIN porte po ON pers.id_porte = po.id_porte 
LEFT JOIN services serv ON serv.id_service = pers.id_service
LEFT JOIN departement dep ON dep.id_departement = serv.id_departement 
LEFT JOIN direction dir ON dir.id_direction = serv.id_direction
LEFT JOIN departement dep1 ON dep1.id_departement = dir.id_departement";

            $query = $this->db->query($sql, array($idPersonnel));

            $ret = null;
            
            foreach ($query->result() as $row) {
                $ret = new PersonnelModele();
                $ret->setNom($row->nom);
                $ret->setPrenom($row->prenom);
                $ret->setNumeroPorte($row->numero);
                $ret->setService($row->service);
                $ret->setDirection($row->nom_direction);
                $ret->setDepartement($row->departement_service, $row->departement_direction);
                $ret->setService($row->service);
            }
            return $ret;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
