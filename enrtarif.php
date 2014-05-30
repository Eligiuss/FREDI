<?php
    session_start();
    
    $hote='127.0.0.1';
    $user='root';
    $passwd='';
    $database='ppe';
    $cnx=new mysqli($hote,$user,$passwd,$database);
    
    $tarif=$_POST["tarif"];
    
    $SQL = "UPDATE tarif
            SET tarif='".$tarif."'";
    $rs=$cnx->query($SQL);
    
    if($rs)
    {
     echo"ok";
    }
 ?>