<?php 

    if( (isset($_POST['email'])) && (isset($_POST['mdp'])) ) {
        $login = $_POST['email'];
        $mdp = $_POST['mdp'];
    } else {
        exit;
    }
    
    $hote='127.0.0.1';
    $user='root';
    $passwd='';
    $database='ppe';
    $cnx=new mysqli($hote,$user,$passwd,$database);
    
    $SQL = "SELECT * FROM demandeurs WHERE adressemail= '".$login."'";
    $rs=$cnx->query($SQL);
    
    while($info=$rs->fetch_object())
    {
        if(($info->adressemail == $login) && ($info->mdp == $mdp)) {
            session_start();
            $_SESSION['login'] = $_POST['email'];
            $_SESSION['password'] = $_POST['mdp'];
            echo 'ok';
        } else {
            exit;
        }
    }   
?>