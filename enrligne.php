<?php
    include ('Connection_BDD.php');

    
    session_start();
    
    $mail= $_SESSION["login"];
    $peagesFrais = $_POST["peagesFrais"];
    $repasFrais = $_POST["repasFrais"];
    $hebergementFrais = $_POST["hebergementFrais"];
    $KmsParcouru = $_POST["KmsParcouru"];
    $dateFrais = $_POST["dateFrais"];
    $motifFrais = $_POST["motifFrais"];
    $trajetFrais = $_POST["trajetFrais"];
    $coutFrais = $_POST["coutFrais"];
    $totalFrais = $_POST["totalFrais"];
    
    $SQL = "DELETE FROM bordereau WHERE mail='".$mail."' ";
    $rs=$cnx->query($SQL);
    
    for($i=0;$i<sizeof($peagesFrais); $i++){
        $SQL2 = "INSERT INTO bordereau (mail, Date, Motif, Trajet, KmsParcourus, Cout, Peages, Repas, Hebergement, Total) VALUES('".$mail."', '".$dateFrais[$i]."', '".$motifFrais[$i]."', '".$trajetFrais[$i]."', '".$KmsParcouru[$i]."', '".$coutFrais[$i]."', '".$peagesFrais[$i]."', '".$repasFrais[$i]."', '".$hebergementFrais[$i]."', '".$totalFrais[$i]."')";
        $rs2=$cnx->query($SQL2);
    }
   
    
    if($rs2){
        echo 'ok';
    } else {
        echo $SQL2;
    }
?>