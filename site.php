<?php
    $titre = 'FREDI';
    include('header.php');
    session_start();
?>

<html>	
    <div id="site" align="center">
        <h2>Vous êtes connecté en tant que : <?php echo $_SESSION['login'] ?></h2>

        <h2>Que voulez-vous effectuer ?</h2>
        <a href="bordereau.php">
            <input class="boutonMenu" type="button" value="Ouvrir un nouveau bordereau"/>
        </a>
        <br/><br/>
        <a href="voirinfo.php" >
            <input class="boutonMenu" type="submit" value="Modifier/voir ses informations personnelles"/>
        </a>
        <br/><br/>
        <a href="adherent.php" >
            <input class="boutonMenu" type="submit" value="Vous êtes adhérent? cliquez ici"/>
        </a>
        <br/><br/>
        <?php
            if($_SESSION['login']=="admin")
            {
                echo'
                <a href="ligue.php" >
                    <input class="boutonMenu" type="submit" value="Gestion des ligues"/>
                </a>
                <br/><br/>
                <a href="modiftarif.php" >
                    <input class="boutonMenu" type="submit" value="Modifier le tarif"/>
                </a>
                <br/><br/>
                <a href="import.php" >
                    <input class="boutonMenu" type="submit" value="Importer adhérent"/>
                </a>';
            }
        ?>
    </div>
</html>