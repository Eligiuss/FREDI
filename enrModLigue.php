<?php
    include ('Connection_BDD.php');

    
    session_start();
    
    $numero = $_POST["numero"];
    $nom = $_POST["nom"];
    $sigle = $_POST["sigle"];
    $president = $_POST["president"];
    
    $SQL = "SELECT numero FROM ligues";
    $rs=$cnx->query($SQL);
    
    
    while($info=$rs->fetch_object()) {
        if($info->numero == $numero) {
            echo 'existant';
            exit;
        }
    }
    
   $SQL2 = "UPDATE demandeurs
            SET numero='".$numero."',
                nom='".$nom."',
                sigle='".$sigle."',
                president='".$president."',
            WHERE numero = '".$numero."'; ";
   $rs2=$cnx->query($SQL2);
   echo 'ok';
?>