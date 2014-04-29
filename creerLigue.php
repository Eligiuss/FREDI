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
                <h1 align="center">Création d\'une nouvelle ligue</h1>
                <div id="Creatligue">
                    <table align="center" id="TableEnreg2">
                            <tr>
                                    <td>N°</td>
                                    <td>
                                            <input class="param" type="text" id="numero" value="">
                                    </td>
                            </tr>
                            <tr>
                                    <td>Nom</td>
                                    <td>
                                            <input class="param" type="text" id="nom" value="">
                                    </td>
                            </tr>
                            <tr>
                                    <td>Sigle</td>
                                    <td>
                                            <input class="param" type="text" id="sigle" value="">
                                    </td>
                            </tr>
                            <tr>
                                    <td>Président</td>
                                    <td>
                                            <input class="param" id="president" value="">
                                    </td>
                            </tr>
                                    <td></td>
                                    <td>
                                            <input type="button" onclick="creerLigue()" value="Créer la ligue"/>
                                    </td>
                            </tr>
                    </table>
                </div>';
        }
    ?>
</html>
    