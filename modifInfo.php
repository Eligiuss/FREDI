<?php
    $hote='127.0.0.1';
    $user='root';
    $passwd='';
    $database='ppe';
    $cnx=new mysqli($hote,$user,$passwd,$database);
    
    session_start();
    $mail = $_SESSION["login"];
    
    $nom = $cnx->real_escape_string($_POST["nom"]);
    $prenom = $cnx->real_escape_string($_POST["prenom"]);
    $adresse = $cnx->real_escape_string($_POST["adresse"]);
    $codepostal = $cnx->real_escape_string($_POST["codepostal"]);
    $ville = $cnx->real_escape_string($_POST["ville"]);

    $SQL = "UPDATE demandeurs
            SET nom='".$nom."',
                prenom='".$prenom."',
                adresse='".$adresse."',
                codepostal='".$codepostal."',
                ville='".$ville."'
            WHERE adressemail = '".$mail."'; ";
    
    $rs=$cnx->query($SQL);
    echo 'ok';
?>
