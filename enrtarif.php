<?php
    session_start();
    
    include ('Connection_BDD.php');

    
    $tarif=$_POST["tarif"];
    
    $SQL = "UPDATE tarif
            SET tarif='".$tarif."'";
    $rs=$cnx->query($SQL);
    
    if($rs)
    {
     echo"ok";
    }
 ?>