<?php
    $titre = 'FREDI';
    include('header.php');
    session_start();
    
    include ('Connection_BDD.php');

    
    $SQL = "SELECT * FROM tarif";
    $rs=$cnx->query($SQL);
    
    while($info = $rs->fetch_object()) {
        $tarif=$info->tarif;
    }
?>
<html>	
    <div id="site" align="center">
        <input type="text"  name="tarif" id="tarif" value="<?php echo$tarif;?>">
        <input type="button" id="modfitarif" value="modifier le tarif" onclick="modiftarif()"/>
    </div>
</html>