<?php
    require_once('fpdf/fpdf.php');
    require_once('fpdi/fpdi.php');

    if(isset($_POST["nom"])){
        $nom = $_POST["nom"];
        $adresse = $_POST["adresse"];
        $signature = $_POST["signature"];
        $lieu = $_POST["lieu"];
        $date = $_POST["date"];
        $total = $_POST["total"];
        $enfants = $_POST["enfants"];
        $annee = $_POST["anneeCivile"];
		
        $pdf =new FPDI();
        $pdf->AddPage();
        
        $nbPages = sizeof($_POST["totalFrais"]);
        
        if($nbPages <= 3){
            //Set the source PDF file
            $pagecount = $pdf->setSourceFile("Bordereau_vide.pdf");
        } else if(($nbPages >3) && ($nbPages <= 6)) {
            $pagecount = $pdf->setSourceFile("Bordereau_vide2.pdf");
        } else if(($nbPages >6) && ($nbPages <= 9)) {
            $pagecount = $pdf->setSourceFile("Bordereau_vide3.pdf");
        }
        
        //Import the first page of the file
        $tpl = $pdf->importPage(1);
        //Use this page as template
        $pdf->useTemplate($tpl);

        #Print Hello World at the bottom of the page

        //Select Arial italic 8
        $pdf->SetFont('Arial','I',13);
        $pdf->Text(167, 53, $annee);
        $pdf->Text(12, 69, $nom);
        $pdf->Text(12, 84, $adresse);
        $pdf->Text(115, 217, $signature);
        $pdf->Text(12, 167, $enfants);

        $pdf->SetFont('Arial','I',8);
        $pdf->Text(65, 184, $total);
        $pdf->Text(91, 204, $lieu);
        $pdf->Text(127, 204, $date);
        
        $hauteur = 128;
        
        for($i=0; $i<sizeof($_POST["totalFrais"]); $i++){
                $dateFrais[] = $_POST["dateFrais"][$i];
                $motifFrais[] = $_POST["motifFrais"][$i];
                $trajetFrais[] = $_POST["trajetFrais"][$i];
                $kmFrais[] = $_POST["kmFrais"][$i];
                $coutFrais[] = $_POST["coutFrais"][$i];
                $peagesFrais[] = $_POST["peagesFrais"][$i];
                $repasFrais[] = $_POST["repasFrais"][$i];
                $hebergementFrais[] = $_POST["hebergementFrais"][$i];
                $totalFrais[] = $_POST["totalFrais"][$i];
                
                $pdf->SetFont('Arial','I',7);
                $pdf->Text(12,$hauteur,$dateFrais[$i]);
                $pdf->Text(29,$hauteur,$motifFrais[$i]);
                $pdf->Text(61,$hauteur,$trajetFrais[$i]);
                $pdf->Text(91,$hauteur,$kmFrais[$i]);
                $pdf->Text(109,$hauteur,$coutFrais[$i]);
                $pdf->Text(127,$hauteur,$peagesFrais[$i]);
                $pdf->Text(145,$hauteur,$repasFrais[$i]);
                $pdf->Text(163,$hauteur,$hebergementFrais[$i]);
                $pdf->Text(181,$hauteur,$totalFrais[$i]);
                
                $hauteur = $hauteur + 7;
        }

        $pdf->Output();
    } else {
        header('location: bordereau.php');
    } 
?>