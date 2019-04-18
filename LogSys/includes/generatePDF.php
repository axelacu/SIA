<?php
/**
 * Created by PhpStorm.
 * User: shirelmatti
 * Date: 2019-04-17
 * Time: 23:49
 */

require('../../fpdf181/fpdf.php');


class PDF extends FPDF
{
// En-tête
    function Header()
    {
        // Logo
        $this->Image('../images/airblio2.png',10,6,70);
        // Police Arial gras 15
        $this->SetFont('Arial','B',15);
        // Décalage à droite
        $this->Cell(80);
        // Titre
        $this->Cell(100,10,'Votre Devis',1,0,'C');
        // Saut de ligne
        $this->Ln(30);
        $this->SetFont('Arial','',13);

        $this->Text(10,35,' 2 Place du marechal de Lattre de Tassigny');
        $this->Text(10,40,' 75116 Paris');
        $this->Text(10,45,' 01.42.40.68.68');
        $this->Text(10,50,' ServiceClientele@airblio.com');

        $this->Text(140,60,' Olivier Gely');
        $this->Text(140,65,' 36 rue de la liberte');
        $this->Text(140,70,' 75019 Paris');
        $this->Text(140,75,' 01.42.40.68.68');
        $this->Text(140,80,' Gely@hotmail.com');

        $this->SetFont('Arial','B',13);
        $this->Text(10,95,'Preneur en charge: M.'.$_GET['NomCom']);
        $this->Text(10,100,'Date : '.$_GET['Date']);


    }

// Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-30);
        // Police Arial italique 8
        // Numéro de page
        $this->SetFont('Arial','I',10);
        $this->SetTextColor(197, 182, 179);


        $this->write(5, 'Validite du devis: 3 mois '."\n");
        $this->write(5, 'Condition de reglement: la totalite a la commande'. "\n");
        $this->write(5, 'La non-satisfaction des clients de AIRBLIO entraineront un remboursement de tout ou partie de la somme de leurs commandes. ');


        $this->SetFont('Arial','I',8);

        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    // Chargement des données
    function LoadData($file)
    {
        // Lecture des lignes du fichier
        $lines = file($file);
        $data = array();
        foreach($lines as $line)
            $data[] = explode(';',trim($line));
        return $data;
    }
// Tableau coloré
    function FancyTable($header, $data)
    {
        // Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(0,0,255);
        $this->SetTextColor(255);
        $this->SetDrawColor(0,0,255);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // En-tête
        $w = array(20, 30, 30, 35,35,20);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();
        // Restauration des couleurs et de la police
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Données
        $fill = false;
        foreach($data as $row)
        {
            $this->Cell($w[0],20,$row[0],'LR',0,'R',$fill);
            $this->Cell($w[1],20,$row[1],'LR',0,'R',$fill);
            $this->Cell($w[2],20,$row[2],'LR',0,'R',$fill);
            $this->Cell($w[3],20,$row[3],'LR',0,'R',$fill);
            $this->Cell($w[4],20,$row[4],'LR',0,'R',$fill);
            $this->Cell($w[5],20,$row[5],'LR',0,'R',$fill);

            $this->Ln();
            $fill = !$fill;
        }
        // Trait de terminaison
        $this->Cell(array_sum($w),0,'','T');
    }
}



// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$header = array('Quantite', 'Produit', 'Prix Unitaire', 'Date de debut','Date de fin','Prix HT');
// Chargement des données
$data = $pdf->LoadData('devis.txt');
$pdf->SetFont('Arial','',14);
$pdf->setY(110);
$pdf->FancyTable($header,$data);
$pdf->setX(136);
$pdf->write(20, 'TOTAL HT:');
$pdf->setX(136);

$pdf->write(40,'TVA 20%:');
$pdf->SetFont('Arial','B',13);
$pdf->setX(116);
$pdf->write(60,'TOTAL TTC en euros:');


$pdf->Output();

?>