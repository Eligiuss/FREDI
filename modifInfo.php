<?php
    $hote='127.0.0.1';
    $user='root';
    $passwd='';
    $database='ppe';
    $cnx=new mysqli($hote,$user,$passwd,$database);
    
    session_start();
    $mail = $_SESSION["login"];
    
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $adresse = $_POST["adresse"];
    $codepostal = $_POST["codepostal"];
    $ville = $_POST["ville"];
    //$club = $_POST["club"];

    $SQL = "UPDATE demandeurs
            SET nom='".$nom."',
                prenom='".$prenom."',
                adresse='".$adresse."',
                codepostal='".$codepostal."',
                ville='".$ville."'
            WHERE adressemail = '".$mail."'; ";
    
    var_dump($SQL);
    
    $rs=$cnx->query($SQL);
?>
