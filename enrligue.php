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
    
    $SQL = "INSERT INTO ligues(numero, nom, sigle, president) VALUES('".$numero."', '".$nom."', '".$sigle."', '".$president."')";
    
   $rs=$cnx->query($SQL);
   echo 'ok';
?>