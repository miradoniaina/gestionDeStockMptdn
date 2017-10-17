<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TransfertMaterielService
 *
 * @author MIRADO
 */
class TransfertMaterielService extends BaseService {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model("dao/TransfertDao");
        $this->load->model("dao/RetourDao");
        $this->load->model("dao/DetailTransfertDao");
        $this->load->model("dao/ListeReferenceDao");
        $this->load->model("dao/ListeReferenceRetourDao");
        $this->load->model("dao/SousRetoursDao");
        $this->load->model("dao/ReferenceSortieDao");
    }

    function insertListeReferences($listeReferences) {
        for ($j = 0; $j < count($listeReferences); $j++) {
            $this->ListeReferenceDao->insertReference($listeReferences[$j]);
        }
    }

    function controlleReferenceInsidePorte($idPorte, $references) {
        try {
            for ($i = 0; $i < count($references); $i++) {
                if ($this->ReferenceSortieDao->compareReferenceByIdPorte($idPorte, $references[$i]->getReference()) === 0) {
                    throw new Exception("la reference " . $references[$i]->getReference() . " n'appartient pas à la porte désigné");
                }
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function enregistrerTransferts($detailtransferts, $transfert, $type, $recuperation, $porteSource, $porteDest, $date, $commentaire) {

        try {
            $this->db->trans_start(FALSE);

            $mytransfert = new TransfertModele();
            $mytransfert->setTransfert($transfert);
            $mytransfert->setType($type);
            $mytransfert->setDateRecuperation($recuperation);

            if ($porteSource != "null") {
                $conditionsPorteSource = array(
                    'numero' => $porteSource
                );

                $porteSource = $this->findWhereAndEquals('porte', $conditionsPorteSource);


                if (count($porteSource) != 0) {
                    $mytransfert->setIdPorteSource($porteSource[0]->id_porte);
                    for($i = 0; $i < count($detailtransferts); $i++){
                    $listeReferences = $detailtransferts[$i]->getListeReference();

                    $this->controlleReferenceInsidePorte($porteSource[0]->id_porte, $listeReferences);
                }
                } else {
                    throw new Exception("la porte source insérée n'éxiste pas");
                }
                
                
            }

            if ($porteDest != "null") {
                $conditionsPorteDest = array(
                    'numero' => $porteDest
                );

                $porteDest = $this->findWhereAndEquals('porte', $conditionsPorteDest);

                if (count($porteDest) != 0) {
                    $mytransfert->setIdPorteDest($porteDest[0]->id_porte);
                } else {
                    throw new Exception("la porte destinataire insérée n'éxiste pas");
                }
            }

            $mytransfert->setDateTransfert($date);
            $mytransfert->setCommentaire($commentaire);
            $mytransfert->setIdPersonnel($this->session->userdata("id_personnel"));

            $this->TransfertDao->saveTransfert($mytransfert);

            for ($i = 0; $i < count($detailtransferts); $i++) {
                $listeReferences = $detailtransferts[$i]->getListeReference();
                $this->DetailTransfertDao->saveDetailTransfert($detailtransferts[$i]);

                $this->insertListeReferences($listeReferences);
            }

            $this->db->trans_complete();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function getIdDetailTransfert($reference) {
        try {
            $sql = "INSERT INTO sous_retour(
            id_sous_retour, id_retour_materiel, id_detail_transfert, quantite)
    VALUES (nextval('sous_retour_id_sous_retour_seq'), currval('retour_materiel_id_retour_materiel_seq'), ?, ?)";


            $this->db->query($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function insertListeReferencesRetour($listeReferences) {
        for ($j = 0; $j < count($listeReferences); $j++) {
            $this->ListeReferenceRetourDao->saveReferenceRetour($listeReferences[$j]);
        }
    }

    function enregistrerRetoursMatériels($sousRetours, $date, $commentaire, $idPersonnel) {

        try {
            $this->db->trans_start(FALSE);
            $transfert = new TransfertModele();
            $transfert->setDateTransfert($date);
            $transfert->setCommentaire($commentaire);
            $transfert->setIdPersonnel($idPersonnel);

            $this->RetourDao->saveRetour($transfert);

            for ($i = 0; $i < count($sousRetours); $i++) {
                $this->SousRetoursDao->saveSousRetour($sousRetours[$i]);
                $listeReferences = $sousRetours[$i]->getListeReference();
                $this->insertListeReferencesRetour($listeReferences);
            }

            $this->db->trans_complete();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
