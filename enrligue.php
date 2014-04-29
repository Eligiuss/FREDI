<?php
    $hote='127.0.0.1';
    $user='root';
    $passwd='';
    $database='ppe';
    $cnx=new mysqli($hote,$user,$passwd,$database);
    
    session_start();
    
    $numéro = $_POST["numéro"];
    $nom = $_POST["nom"];
    $sigle = $_POST["sigle"];
    $président = $_POST["président"];
    
    $SQL = "INSERT INTO ligues(n°, Nom, sigle, président) VALUES('".$numéro."', '".$nom."', '".$sigle."', '".$président."')";
    
//    $rs=$cnx->query($SQL);
//    echo 'ok';
?>