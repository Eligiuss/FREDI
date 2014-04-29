<?php
    $titre = 'FREDI';
    include('header.php');
    session_start();
?>

<html>	
    <div id="site" align="center">
        <h2>Vous êtes connecté en temps que : <?php echo $_SESSION['login'] ?></h2>

        <h2>Que voulez-vous effectuer ?</h2>
        <a href="bordereau.php">
            <input class="boutonMenu" type="button" value="Ouvrir un nouveau bordereau"/>
        </a>
        <a href="voirinfo.php" >
            <input class="boutonMenu" type="submit" value="Modifier/voir ses informations personnelles"/>
        </a>
        <?php
            if($_SESSION['login']=="admin")
            {
                echo'
                <a href="ligue.php" >
                    <input class="boutonMenu" type="submit" value="Gestion des ligues"/>
                </a>';
            }
        ?>
    </div>
</html>