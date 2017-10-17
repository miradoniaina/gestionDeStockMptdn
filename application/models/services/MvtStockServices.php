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
class MvtStockServices extends BaseService {

    function __construct() {
        parent::__construct();
        $this->load->model("dao/SousMvtStockDao");
        $this->load->model("dao/MvtStockDao");
        $this->load->model("dao/CodeBarreDao");
        $this->load->model("dao/SortieDetenteurDao");
        $this->load->model("dao/SortieUsageInterneDao");

        $this->load->model("dao/EtatDesMouvementsStocksDao");
        $this->load->model("dao/ReferenceSortieDao");
        $this->load->model("dao/InventaireDao");

        $this->load->model("modele/MvtStockModele");
    }

//    enregistrerEntree
    function enregistrerCodeBarre($entree) {
        for ($i = 0; $i < $entree->getQuantite(); $i++) {
            $this->CodeBarreDao->insertCodeBarre($entree);
        }
    }

    function genererPdfCodeBarres($to_print, $dateMvt) {
        $this->load->library('code128/PDF_Code128');

        define('FPDF_FONTPATH', $this->config->item('fonts_path'));

        $pdf = new PDF_Code128();
        $pdf->AddPage();

        $pdf->SetFont('Times', 'B', 20);
        $pdf->Cell(180, 10, "Code-Barres des entrees du " . $dateMvt, 0, 2, 'C');

        $y = 50;

        for ($i = 0; $i < count($to_print); $i++) {

            $pdf->SetFont('Times', '', 18);

            $pdf->SetXY(30, $y - 10);
            $pdf->Write(5, $to_print[$i]->getQuantite() . '  ' . $to_print[$i]->getMateriel());

            $pdf->SetFont('Times', '', 10);

            for ($j = 0; $j < count($to_print[$i]->getCodebarres()); $j++) {

                $code = $to_print[$i]->getCodebarres()[$j]->ref_code_barre;

                $pdf->Code128(50, $y, $code, 125, 20);
                $pdf->SetXY(49, $y + 20);
                $pdf->Write(5, '' . $code . '');
                $y+=35;

                if ($y >= 250) {
                    $pdf->AddPage();
                    $y = 50;
                }
            }
            if ($y != 50) {
                $y+=25;
            }
        }

        $pdf->Output('F', false);
    }

    function enregistrerListeEntree($entrees, $dateMvt, $commentaire, $idPersonnel) {
        $this->db->trans_start(FALSE);
        $mvtStock = new MvtStockModele();
        $mvtStock->setDateMvt($dateMvt);
        $mvtStock->setCommentaire($commentaire);
        $mvtStock->setIdPersonnel($idPersonnel);
        $mvtStock->setType("entrée");

        $this->MvtStockDao->insert($mvtStock);

        for ($i = 0; $i < count($entrees); $i++) {
            $this->SousMvtStockDao->insertMvt($entrees[$i]);
            $this->enregistrerCodeBarre($entrees[$i]);
        }
        $this->db->trans_complete();
    }

    function enregistrerEntree($entrees) {
        $this->enregistrerListeEntree($entrees);
    }

//    enregistrerEntree
//    enregistrerSortie

    function enregistrerListeSorties($sorties, $dateMvt, $commentaire, $idPersonnel) {
        try {
            $this->db->trans_start(FALSE);

            $mvtStock = new MvtStockModele();
            $mvtStock->setIdPersonnel($idPersonnel);
            $mvtStock->setDateMvt($dateMvt);
            $mvtStock->setCommentaire($commentaire);
            $mvtStock->setType("sortie");

            $this->MvtStockDao->insert($mvtStock);

            for ($i = 0; $i < count($sorties); $i++) {
                $this->checkStockEpuise($sorties[$i]);
                $this->SousMvtStockDao->insertMvt($sorties[$i]);
            }
            $this->db->trans_complete();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function checkStockEpuise($sortie) {
        error_reporting(1);
        try {
            $inventaire = $this->InventaireDao->findAllInventaireByIdMateriel(new DateTime(), $sortie->getIdMateriel())[0];
            if (($inventaire == null) || ($sortie->getQuantite() > $inventaire->getQuantiteStock())) {
                throw new Exception("La quantité en stock du matériel " . $sortie->getMateriel() . " n'est pas assez!");
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function saveReferences($sortie) {

        $references = $sortie->getListeReference();

        for ($i = 0; $i < count($references); $i++) {
            $this->ReferenceSortieDao->saveReferenceSortie($references[$i]);
        }
    }

    function enregistrerListeSortiesInterne($sorties, $dateMvt, $numero_porte, $id_detenteurs, $commentaire, $idPersonnel) {

        try {
            $this->db->trans_start(FALSE);

            $conditionsPorte = array(
                'numero' => $numero_porte
            );

            $porte = $this->BaseService->findWhereAndEquals('porte', $conditionsPorte);

            if (count($porte) == 0) {
                throw new Exception("Veuiller insérée une porte valide");
            }

            $mvtStock = new MvtStockModele();

            $mvtStock->setType("sortie");
            $mvtStock->setIdPersonnel($idPersonnel);
            $mvtStock->setCommentaire($commentaire);
            $mvtStock->setDateMvt($dateMvt);

            $this->MvtStockDao->insert($mvtStock);

            if (count($porte) != 0) {
                $this->SortieUsageInterneDao->insertUsageInterne($porte[0]->id_porte);
            }


                for ($i = 0; $i < count($sorties); $i++) {

                    $this->checkStockEpuise($sorties[$i]);

                    $this->SousMvtStockDao->insertMvt($sorties[$i]);

                    $this->saveReferences($sorties[$i]);
                }

            $this->SortieDetenteurDao->insertDetenteurs($id_detenteurs);

            $this->db->trans_complete();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

//    function enregistrerSortieInterne($sorties ,$dateMvt, $commentaire) {
//        $this->db->trans_start(FALSE);
//        
//        for ($i = 0; $i < count($sorties); $i++) {
//            $idDetenteurs = explode(";", $sorties[$i]->getIdDetenteurs());
//            
//            for($j = 0 ; count($idDetenteurs) ; $j++){
//                
//                
//                
//                
//                //insertion detenteurs
//                $col = array(
//                    ''
//                    
//                );
//                
//                $this->save($nomTable, $array);
//            }
//        }
//        $this->db->trans_complete();
//    }


    function etatDesMouvementsStocks($date1, $date2) {
        return $this->EtatDesMouvementsStocksDao->findEtatDesMouvementsStocks($date1, $date2);
    }

    function enregistrerSortieInterne($sortie) {
        
    }

//    enregistrerSortie


    function listeCodeBarreParMvt($entrees) {
        $ret = [];
        return $ret;
    }

}
