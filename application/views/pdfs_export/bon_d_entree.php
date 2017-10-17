<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDF
 *
 * @author MIRADO
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class BonDEentree extends MyPDF128 {

    // En-tête
    function Header() {
//        global $titre;
        // Logo
        $this->Image(base_url('assets/images/logo-repoblika-o.jpg'), 10, 6, 40);
        $this->Image(base_url('assets/images/logo-o.jpg'), 160, 6, 40);
        // Police Arial gras 15
        $this->SetFont('Arial', 'B', 15);
        // Calcul de la largeur du titre et positionnement
        $w = $this->GetStringWidth($this->getTitre()) + 6;
        $this->SetX((210 - $w) / 2);
        // Couleurs du cadre, du fond et du texte
        $this->SetDrawColor(73, 138, 62);
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(216, 7, 13);
        // Epaisseur du cadre (1 mm)
        $this->SetLineWidth(1);
        // Décalage à droite
//        $this->Cell(80);
        // Titre
        $this->Cell($w, 9, $this->getTitre(), 1, 1, 'C', true);
        // Saut de ligne
        $this->Ln(10);
    }

//
//// Pied de page
    function Footer() {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial', 'I', 8);
        // Numéro de page
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function MultiCellBltArray($w, $h, $blt_array, $border = 0, $align = 'J', $fill = false) {
        if (!is_array($blt_array)) {
            die('MultiCellBltArray requires an array with the following keys: bullet,margin,text,indent,spacer');
            exit;
        }

        //Save x
        $bak_x = $this->x;

        for ($i = 0; $i < sizeof($blt_array['text']); $i++) {
            //Get bullet width including margin
            $blt_width = $this->GetStringWidth($blt_array['bullet'] . $blt_array['margin']) + $this->cMargin * 2;

            // SetX
            $this->SetX($bak_x);

            //Output indent
            if ($blt_array['indent'] > 0)
                $this->Cell($blt_array['indent']);

            //Output bullet
            $this->Cell($blt_width, $h, $blt_array['bullet'] . $blt_array['margin'], 0, '', $fill);

            //Output text
            $this->MultiCell($w - $blt_width, $h, $blt_array['text'][$i], $border, $align, $fill);

            //Insert a spacer between items if not the last item
            if ($i != sizeof($blt_array['text']) - 1)
                $this->Ln($blt_array['spacer']);

            //Increment bullet if it's a number
            if (is_numeric($blt_array['bullet']))
                $blt_array['bullet'] ++;
        }

        //Restore x
        $this->x = $bak_x;
    }
    
    function titreMateriel($quantite , $materiel)
    {
            // Titre
            $this->SetFont('Arial','',12);
            $this->SetFillColor(200,220,255);
            $this->Cell(0,6,$quantite. ":" .$materiel,0,1,'L',true);
            $this->Ln(4);
            // Sauvegarde de l'ordonn�e
            $this->y0 = $this->GetY();
            
            $this->SetFillColor(21, 19, 26);
    }

    function FancyTable1($header, $data) {
        // Couleurs, �paisseur du trait et police grasse
        $this->SetFillColor(21, 19, 26);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // En-t�te
        $w = array(150, 35);
//		for($i=0;$i<count($header);$i++)
        $this->Cell($w[0], 7, $header[0], 1, 0, 'C', true);
        $this->Cell($w[1], 7, $header[1], 1, 0, 'R', true);

        $this->Ln();
        // Restauration des couleurs et de la police
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Donn�es
        $fill = false;

        foreach ($data as $row) {
            $this->Cell($w[0], 6, utf8_decode($row[0]), 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, utf8_decode($row[1]), 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Trait de terminaison
        $this->Cell(array_sum($w), 0, '', 'T');
        
        
        $this->SetFillColor(21, 19, 26);
    }

}
define('FPDF_FONTPATH', $this->config->item('fonts_path'));
$pdf = new BonDEentree();
$titre = 'Bon d\'entree le ' . $mvtStock->getDateMvtFormatted();
$pdf->setTitre($titre);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 8);
//
$pdf->Cell(0, 4, utf8_decode($personnel->getDepartement()), 0, 1, 'C');
$pdf->Cell(0, 4, '-------------------', 0, 1, 'C');
$pdf->Cell(0, 4, utf8_decode($personnel->getDirection()), 0, 1, 'C');
$pdf->Cell(0, 4, '-------------------', 0, 1, 'C');
$pdf->Cell(0, 4, utf8_decode($personnel->getService()), 0, 1, 'C');
$pdf->Cell(0, 4, '-------------------', 0, 1, 'C');
$pdf->Cell(0, 4, utf8_decode('Porte ' . $personnel->getNumeroPorte()), 0, 1, 'C');
$pdf->Cell(0, 4, '-------------------', 0, 1, 'C');
$pdf->Ln(10);
////
$w = 230;
$column_width = $w - 30;
//
////$pdf->SetFont('Times', 'B', 12);

$pdf->SetFont('Times', '', 12);

    $pdf->Cell(0, 10, utf8_decode($mvtStock->getCommentaire()), 1, 1, 'C');
    $pdf->Ln(10);

$header = ['materiels', 'quantite(s)'];

$data = [];

for ($i = 0; $i < count($sousMvtStocks); $i++) {
    $array = [];
    $array[0] = $sousMvtStocks[$i]->getMateriel();
    $array[1] = $sousMvtStocks[$i]->getQuantite();
    array_push($data, $array);
}

$pdf->FancyTable1($header, $data);

$pdf->Ln(25);

$beneficiaire = "Le Bénéficiaire";

$w = $pdf->GetStringWidth($beneficiaire) - 9;

$pdf->Cell($w, 10, utf8_decode($beneficiaire), 'B', 0, 'C');





$titre = utf8_decode('Code-Barres des entrees du ' . $mvtStock->getDateMvtFormatted());
$pdf->setTitre($titre);
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Times', 'B', 8);
$pdf->Ln(10);

$y = 50;

for ($i = 0; $i < count($sousMvtStocks); $i++) {
    $pdf->SetFont('Times', '', 18);

    $pdf->SetXY(30, $y - 10);
//    $pdf->Write(12, $sousMvtStocks[$i]->getQuantite() . '  ' . utf8_decode($sousMvtStocks[$i]->getMateriel()));
//    $pdf->MultiCell(60,5, $sousMvtStocks[$i]->getQuantite() . '  ' . utf8_decode($sousMvtStocks[$i]->getMateriel()));
    $pdf->titreMateriel($sousMvtStocks[$i]->getQuantite(), utf8_decode($sousMvtStocks[$i]->getMateriel()));
    $pdf->SetFont('Times', '', 10);
    
    $y += 12;
    
    for ($j = 0; $j < count($sousMvtStocks[$i]->getCodebarres()); $j++) {

        $code = $sousMvtStocks[$i]->getCodebarres()[$j]->ref_code_barre;

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

$pdf->Output('D', 'Bon_d_entree.pdf');






