<?php 

    $login = $_POST['email'];
    $mdp = $_POST['mdp'];
    
    $hote='127.0.0.1';
    $user='root';
    $passwd='';
    $database='ppe';
    $cnx=new mysqli($hote,$user,$passwd,$database);

    $SQL = "SELECT * FROM demandeurs WHERE adressemail= '".$login."'";
    $rs=$cnx->query($SQL);
    
    while($info=$rs->fetch_object())
    {
        if($info->adressemail == $login)
        {
            echo 'ok';
        }
    }
        
?>