<?php
    include ('Connection_BDD.php');

    
    session_start();
    
    $mail= $_SESSION["login"];
    $peagesFrais = $_POST["peagesFrais"];
    $repasFrais = $_POST["repasFrais"];
    $hebergementFrais = $_POST["hebergementFrais"];
    $KmsParcouru = $_POST["KmsParcourunumero"];
    $dateFrais = $_POST["dateFrais"];
    $motifFrais = $_POST["motifFrais"];
    $trajetFrais = $_POST["trajetFrais"];
    $coutFrais = $_POST["coutFrais"];
    $totalFrais = $_POST["totalFrais"];
    
   $SQL2 = "INSERT INTO bordereau (mail, Date, Motif, Trajet, KmsParcourus, Cout, Peages, Repas, Hebergement, Total) VALUES('".$mail."', '".$dateFrais."', '".$motifFrais."', '".$trajetFrais."', '".$KmsParcouru."', '".$coutFrais."', '".$peagesFrais."', '".$repasFrais."', '".$hebergementFrais."', '".$totalFrais."')";
   $rs2=$cnx->query($SQL2);
   echo 'ok';
?>