<?php
    $hote='127.0.0.1';
    $user='root';
    $passwd='';
    $database='ppe';
    $cnx=new mysqli($hote,$user,$passwd,$database);
    
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
    
   $SQL2 = "INSERT INTO ligues(numero, nom, sigle, president) VALUES('".$numero."', '".$nom."', '".$sigle."', '".$president."')";
   $rs2=$cnx->query($SQL2);
   echo 'ok';
?>