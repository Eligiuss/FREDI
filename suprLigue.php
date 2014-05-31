<?php
    include ('Connection_BDD.php');

    
    session_start();
    
    $id = $_POST["id"];
    
    $SQL = "DELETE FROM ligues WHERE numero = '".$id."'; ";
    $rs=$cnx->query($SQL);
    
    if($rs)
    {
     echo"ok";
    }
?>