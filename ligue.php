<?php
    $titre = 'FREDI';
    include('header.php');
    session_start();
?>

<html>
    <?php
        if($_SESSION['login']=="admin")
        {
            echo'
            <a href="creerLigue.php" >
                <input class="boutonMenu" type="submit" value="Création d\'une ligue"/>
            </a>';
        }
    ?>
</html>
    