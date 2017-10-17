<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InventaireFluxDao
 *
 * @author MIRADO
 */
class InventaireFluxDao extends BaseService{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('modele/InventaireFluxModele');
    }

    function inventaire($date, $idFamille, $groupby){
      $groupbyVal = '\'tous\'';
      $groupbyId = '\'\'';
      $tempcritere= '\'\'';
      
      if($groupby === 'Département'){
          $groupbyVal = 'dep.departement';
          $tempcritere = 'id_departement';
          $groupbyId = 'dep.id_departement';
      }
      if($groupby ==='Direction' ){
          $groupbyVal = 'dir.nom_direction';
          $tempcritere = 'id_direction';
          $groupbyId = 'dir.id_direction';
      }
      if($groupby ==='Service' ){
          $groupbyVal = 'serv.service';
          $tempcritere = 'id_service';
          $groupbyId = 'serv.id_service';
      }
      if($groupby ==='Porte' ){
          $groupbyVal = 'p.numero';
          $tempcritere = 'id_porte';
          $groupbyId = 'p.id_porte';
      }
      if($groupby ==='Détenteur' ){
          $groupbyVal = 'pers.matricule';
          $tempcritere = 'id_personnel';
          $groupbyId = 'pers.id_personnel';
      }      
      
      if($groupbyVal === '\'tous\''){
         $sqlgrpp= " GROUP BY f.id_famille"; 
         $sqlgrppdt = $sqlgrpp;
         $groupbydt = " GROUP BY dt.id_detail_transfert";
         $tempcritere= '\'tous\'';
         $dttempcritere = '\'tous\' critere';
         $dton = "prets.id_famille=appartenant.id_famille";
      }
      else{
        $sqlgrpp= " GROUP BY ".$groupbyId.", f.id_famille"; 
        $sqlgrppdt = " GROUP BY dt.".$tempcritere.", f.id_famille";
        $groupbydt = " GROUP BY ".$groupbyId.", dt.id_detail_transfert"; 
        $dttempcritere = "dt.".$tempcritere;
        $dton = "prets.". $tempcritere ."=appartenant.". $tempcritere ." AND prets.id_famille=appartenant.id_famille";
      }
      
      $sql2 = $groupbyId.","
              . "".$groupbyVal." critere";
      
      $sql1="SELECT 
	appartenant.*,
	CAST((COALESCE(prets.prets, '0')) AS INTEGER) prets
	
	FROM 
		(SELECT 
			".$sql2.",
			f.id_famille,
			f.famille,
			SUM(quantite) appartenant
			
			FROM sortie_usage_interne sortie 
				LEFT JOIN mvt_stock mvtstk 
                                        ON sortie.id_mvt_stock = mvtstk.id_mvt_stock
                                LEFT JOIN sous_mvt_de_stock sous_mvt 
                                        ON sous_mvt.id_mvt_stock = mvtstk.id_mvt_stock
                                LEFT JOIN materiel m
                                        ON m.id_materiel = sous_mvt.id_materiel
                                LEFT JOIN famille f
                                        ON m.id_famille = f.id_famille
                                LEFT JOIN porte p 
                                        ON sortie.id_porte = p.id_porte 
                                LEFT JOIN direction dir
                                        ON p.id_direction = dir.id_direction
                                LEFT JOIN departement dep
                                        ON dir.id_departement = dep.id_departement
                                LEFT JOIN sortie_detenteurs sdet
                                        ON sortie.id_sortie_interne = sdet.id_sortie_interne
                                LEFT JOIN personnel pers
                                        ON pers.id_personnel = sdet.id_personnel
                                LEFT JOIN services serv
                                        ON serv.id_service = pers.id_service
			WHERE mvtstk.date_mvt <= '" .$date. "' AND f.id_famille = ".$idFamille."
			".$sqlgrpp.") appartenant

				LEFT JOIN 
						(";
      
                                    $sql1 .="SELECT 
                                                  ".$dttempcritere.",
                                                  f.id_famille,
                                                  f.famille,

                                                  SUM(dt.qte_restant) prets

                                                  FROM
                                                          (SELECT 
                                                                  dt.id_detail_transfert,
                                                                  dt.id_transfert,
                                                                  dt.id_materiel, 
                                                                  t.transfert, 
                                                                  t.type, 
                                                                  t.date_recuperation,
                                                                  t.porte_source, 
                                                                  t.porte_dest,
                                                                  ".$groupbyId.",
                                                                  (dt.quantite - SUM(CAST((COALESCE(sr.quantite, '0')) AS INTEGER))) qte_restant

                                                                  FROM sous_retour sr 

                                                                  RIGHT JOIN detail_transfert dt 
                                                                          ON sr.id_detail_transfert = dt.id_detail_transfert 
                                                                  LEFT JOIN transfert t 
                                                                          ON t.id_transfert = dt.id_transfert
                                                                  LEFT JOIN personnel pers
                                                                          ON pers.id_personnel = t.id_personnel
                                                                  LEFT JOIN services serv
                                                                          ON serv.id_service = pers.id_service
                                                                  LEFT JOIN porte p 
                                                                      ON p.id_porte = t.porte_source
                                                                  LEFT JOIN departement dep
                                                                          ON dep.id_departement = serv.id_departement
                                                                  LEFT JOIN direction dir
                                                                          ON dir.id_departement = dep.id_departement
                                                                  WHERE ((type = 'prets' OR type = 'envoie') AND t.date_transfert <='" .$date. "')
                                                                  ".$groupbydt." ,t.id_transfert) dt

                                                          LEFT JOIN materiel m
                                                                  ON dt.id_materiel = m.id_materiel
                                                          LEFT JOIN famille f
                                                                  ON f.id_famille = m.id_famille

                                                          ".$sqlgrppdt.") prets
                                                                  ON (" . $dton . ")";
      
        $rets = [];
        
//        echo $sql1;
        
        foreach ($this->db->query($sql1)->result() as $ligne) {
            
            $ret = new InventaireFluxModele(); 
                $ret->setCritere($ligne->critere);
                $ret->setTypeMateriel($ligne->famille);
                $ret->setAppartenant($ligne->appartenant);
                $ret->setPrets($ligne->prets);
            array_push($rets, $ret);
        }
        return $rets;  
    }
}
