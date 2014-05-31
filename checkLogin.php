<?php 
    include ('Connection_BDD.php');
    
    if( (isset($_POST['email'])) && (isset($_POST['mdp'])) ) {
        $login = $_POST['email'];
        $mdp = $_POST['mdp'];
    } else {
        exit;
    }
    

    
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