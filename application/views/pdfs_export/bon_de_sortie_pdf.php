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

class BonDeSortiePdf extends MyFPDF {

    // En-tête
    function Header() {
//        global $titre;
        // Logo
        $this->Image(base_url('assets/images/logo-repoblika.jpg'), 10, 6, 40);
        $this->Image(base_url('assets/images/logo.jpg'), 160, 6, 40);
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

//    // Chargement des donn�es
//    function LoadData($file) {
//        // Lecture des lignes du fichier
//        $lines = file($file);
//        $data = array();
//        foreach ($lines as $line)
//            $data[] = explode(';', trim($line));
//        return $data;
//    }
//    // Tableau simple
//
//    function BasicTable($header, $data) {
//        // En-t�te
//        foreach ($header as $col)
//            $this->Cell(30, 7, $col, 1);
//        $this->Ln();
//        // Donn�es
//        foreach ($data as $row) {
//            foreach ($row as $col)
//                $this->Cell(30, 6, $col, 1);
//            $this->Ln();
//        }
//    }
//
//    // Tableau am�lior�
//    function ImprovedTable($header, $data) {
//        // Largeurs des colonnes
//        $w = array(40, 35, 45, 40);
//        // En-t�te
//        for ($i = 0; $i < count($header); $i++)
//            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
//        $this->Ln();
//        // Donn�es
//        foreach ($data as $row) {
//            $this->Cell($w[0], 6, $row[0], 'LR');
//            $this->Cell($w[1], 6, $row[1], 'LR');
//            $this->Cell($w[2], 6, number_format($row[2], 0, ',', ' '), 'LR', 0, 'R');
//            $this->Cell($w[3], 6, number_format($row[3], 0, ',', ' '), 'LR', 0, 'R');
//            $this->Ln();
//        }
//        // Trait de terminaison
//        $this->Cell(array_sum($w), 0, '', 'T');
//    }
//
//    // Tableau color�
//    function FancyTable($header, $data) {
//        // Couleurs, �paisseur du trait et police grasse
//        $this->SetFillColor(0, 0, 0);
//        $this->SetTextColor(255);
//        $this->SetDrawColor(0, 0, 0);
//        $this->SetLineWidth(.3);
//        $this->SetFont('', 'B');
//        // En-t�te
//        $w = array(5, 35, 45, 25, 25, 20);
//        for ($i = 0; $i < count($header); $i++)
//            $this->Cell($w[$i], 6, $header[$i], 1, 0, 'R', true);
//        $this->Ln();
//        // Restauration des couleurs et de la police
//        $this->SetFillColor(224, 235, 255);
//        $this->SetTextColor(0);
////		$this->SetFont('');
//        $this->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
//        $this->SetFont('DejaVu', '', 6);
//        // Donn�es
//        $fill = false;
//        foreach ($data as $row) {
//            $this->Cell($w[0], 6, number_format($row[0], 0, ',', ' '), 'LR', 0, 'R', $fill);
//            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'R', $fill);
//            $this->Cell($w[2], 6, $row[2], 'LR', 0, 'R', $fill);
//            $this->Cell($w[3], 6, $row[3], 'LR', 0, 'R', $fill);
//            $this->Cell($w[4], 6, $row[4], 'LR', 0, 'R', $fill);
//            $this->Cell($w[5], 6, $row[5], 'LR', 0, 'R', $fill);
//            $this->Ln();
//            $fill = !$fill;
//        }
//        // Trait de terminaison
//        $this->Cell(array_sum($w), 0, '', 'T');
//    }

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
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Trait de terminaison
        $this->Cell(array_sum($w), 0, '', 'T');
    }

}

$this->myfpdf = new BonDeSortiePdf();
$titre = 'Bon de Sortie le ' . $mvtStock->getDateMvtFormatted();
$this->myfpdf->setTitre($titre);
$this->myfpdf->AliasNbPages();
$this->myfpdf->AddPage();
$this->myfpdf->SetFont('Times', 'B', 8);

$this->myfpdf->Cell(0, 4, utf8_decode($personnel->getDepartement()), 0, 1, 'C');
$this->myfpdf->Cell(0, 4, '-------------------', 0, 1, 'C');
$this->myfpdf->Cell(0, 4, utf8_decode($personnel->getDirection()), 0, 1, 'C');
$this->myfpdf->Cell(0, 4, '-------------------', 0, 1, 'C');
$this->myfpdf->Cell(0, 4, utf8_decode($personnel->getService()), 0, 1, 'C');
$this->myfpdf->Cell(0, 4, '-------------------', 0, 1, 'C');
$this->myfpdf->Cell(0, 4, utf8_decode('Porte ' . $personnel->getNumeroPorte()), 0, 1, 'C');
$this->myfpdf->Cell(0, 4, '-------------------', 0, 1, 'C');
$this->myfpdf->Ln(10);
//
$w = 230;
$column_width = $w - 30;

$this->myfpdf->SetFont('Times', 'B', 12);


if (!empty($porte)) {
    //Test1
    $test1 = array();
    $test1['bullet'] = chr(149);
    $test1['margin'] = ' ';
    $test1['indent'] = 80;
    $test1['spacer'] = 0;
    $test1['text'] = array();

    $test1['text'][0] = 'Pour ' . $pour;

    array_push($test1['text'], 'Pour Porte ' . $porte);


    $this->myfpdf->SetX(10);
    $this->myfpdf->MultiCellBltArray($column_width - 10, 6, $test1);
}
//
$this->myfpdf->SetFont('Times', '', 12);
////détenteurs
//
if (count($detenteurs) != 0) {
    $test1 = array();
    $test1['bullet'] = chr(149);
    $test1['margin'] = ' ';
    $test1['indent'] = 80;
    $test1['spacer'] = 0;
    $test1['text'] = array();

    $test1['text'][0] = utf8_decode('Détenteur(s) ');
    
    $this->myfpdf->SetFont('Times', 'B', 12);
    
    $this->myfpdf->SetX(10);
    $this->myfpdf->MultiCellBltArray($column_width - 10, 6, $test1);
    
    $this->myfpdf->SetFont('Times', '', 12);
    
    $test2 = array();
    $test2['bullet'] = 1;
    $test2['margin'] = ')   ';
    $test2['indent'] = 90;
    $test2['spacer'] = 0;
    $test2['text'] = array();

    for ($i = 0; $i < count($detenteurs); $i++) {
        array_push($test2['text'], $detenteurs[$i]->nom . " " .$detenteurs[$i]->prenom);
    }

    $this->myfpdf->SetX(10);
    $this->myfpdf->MultiCellBltArray($column_width - 10, 6, $test2);
    $this->myfpdf->Ln(10);
}

$this->myfpdf->SetFont('Times', '', 12);

    $this->myfpdf->Cell(0, 10, utf8_decode($mvtStock->getCommentaire()), 1, 1, 'C');

    $this->myfpdf->Ln(10);

$header = ['materiels', 'quantite(s)'];

$data = [];
for ($i = 0; $i < count($sousMvtStocks); $i++) {
    $array = [];
    $array[0] = utf8_decode($sousMvtStocks[$i]->getMateriel());
    $array[1] = $sousMvtStocks[$i]->getQuantite();
    array_push($data, $array);
}

$this->myfpdf->FancyTable1($header, $data);

$this->myfpdf->Ln(25);

$beneficiaire = "Le Bénéficiaire";

$w = $this->myfpdf->GetStringWidth($beneficiaire) - 9;

$this->myfpdf->Cell($w, 10, utf8_decode($beneficiaire), 'B', 0, 'C');

$this->myfpdf->Output('D', 'Bon_de_sortie.pdf');




