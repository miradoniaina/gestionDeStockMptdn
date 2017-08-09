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
        $this->load->model("dao/MvtStockDao");
        $this->load->model("dao/CodeBarreDao");
        $this->load->model("dao/SortieDetenteurDao");
        $this->load->model("dao/SortieUsageInterneDao");

        $this->load->model("dao/EtatDesMouvementsStocksDao");
        $this->load->model("dao/ReferenceSortieDao");

        $this->load->library('code128/PDF_Code128');
    }

//    enregistrerEntree
    function enregistrerCodeBarre($entree) {
        for ($i = 0; $i < $entree->getQuantite(); $i++) {
            $this->CodeBarreDao->insertCodeBarre($entree);
        }
    }

    function genererPdfCodeBarres($to_print, $dateMvt) {
        define('FPDF_FONTPATH', $this->config->item('fonts_path'));

        $pdf = new PDF_Code128();
        $pdf->SetAutoPageBreak(true, 40);
        $pdf->AddPage();

        $pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
        $pdf->SetFont('DejaVu', '', 28);

        $pdf->Cell(180, 10, "Code-Barres entrées du " . $dateMvt, 0, 2, 'C');

        $y = 50;

        for ($i = 0; $i < count($to_print); $i++) {

            $pdf->SetFont('DejaVu', '', 18);

            $pdf->SetXY(30, $y - 10);
            $pdf->Write(5, $to_print[$i]->getQuantite() . ' * ' . $to_print[$i]->getMateriel());

            $pdf->SetFont('DejaVu', '', 10);

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
        $pdf->Output();
    }

    function enregistrerListeEntree($entrees, $dateMvt, $commentaire) {
        $idEntree = array();

        $this->db->trans_start(FALSE);

        for ($i = 0; $i < count($entrees); $i++) {
            $entrees[$i]->setDateMvt($dateMvt);
            $entrees[$i]->setCommentaire($commentaire);
            $this->MvtStockDao->insertMvt($entrees[$i]);

            array_push($idEntree, $this->db->insert_id());

            $this->enregistrerCodeBarre($entrees[$i]);
        }

        $to_print_pdf = array();

        for ($i = 0; $i < count($idEntree); $i++) {
            array_push($to_print_pdf, $this->MvtStockDao->findByIdWithCodeBarre($idEntree[$i]));
        }

        $dateEntree = $entrees[0]->getDateMvt()->format("d-m-Y");

        $this->genererPdfCodeBarres($to_print_pdf, $dateEntree);

        $this->db->trans_complete();
    }

    function enregistrerEntree($entrees) {
        $this->enregistrerListeEntree($entrees);
    }

//    enregistrerEntree
//    enregistrerSortie

    function enregistrerListeSorties($sorties, $dateMvt, $commentaire) {
        $this->db->trans_start(FALSE);

        for ($i = 0; $i < count($sorties); $i++) {
            $sorties[$i]->setDateMvt($dateMvt);

            $sorties[$i]->setCommentaire($commentaire);
            $this->MvtStockDao->insertMvt($sorties[$i]);
        }
        $this->db->trans_complete();
    }

    function checkStockEpuise($sortie) {

        error_reporting(1);
        try {
            $inventaire = $this->findByIdView('inventaire_view', 'id_materiel', 1);
            if (($inventaire == null) || ($sortie->getQuantite() > $inventaire->quantite_restant)) {
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

    function enregistrerListeSortiesInterne($sorties, $dateMvt, $numero_porte, $detenteurs, $id_detenteurs, $commentaire) {
        

        try {
            $this->db->trans_start(FALSE);
            
            $conditionsPorte = array(
                'numero' => $numero_porte
            );

            $porte = $this->BaseService->findWhereAndEquals('porte', $conditionsPorte);

            if (count($porte) == 0 && $this->input->post("porte") != "") {
                throw new Exception("La porte insérée n'éxiste pas");
            }

            for ($i = 0; $i < count($sorties); $i++) {
                $sorties[$i]->setDateMvt($dateMvt);

                $sorties[$i]->setCommentaire($commentaire);

                $sorties[$i]->setIdDetenteurs($id_detenteurs);

                $sorties[$i]->setDetenteurs($detenteurs);

                $sorties[$i]->setPorte($numero_porte);

                if (count($porte) != 0) {
                    $sorties[$i]->setIdPorte($porte[0]->id_porte);
                }

                $this->checkStockEpuise($sorties[$i]);

                var_dump($sorties[$i]);

                $this->MvtStockDao->insertMvt($sorties[$i]);

                $this->SortieUsageInterneDao->insertUsageInterne($sorties[$i]);
                
                $this->saveReferences($sorties[$i]);
                
                $this->SortieDetenteurDao->insertDetenteurs($sorties[$i]);
                
                $this->db->trans_complete();
            }
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
