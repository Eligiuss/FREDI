<?php
    $titre = 'FREDI';
    include('header.php');
    session_start();
?>
<html>
    <div id="site" align="center">
        Vous êtes adhérents et vennez sur cette page pour la première fois? Enregistrez vous!
        <table align="center" id="TableEnreg2">
                    <tr>
                            <td>Nom</td>
                            <td>
                                    <input class="param" type="text" id="nom" value="">
                            </td>
                    </tr>
                    <tr>
                            <td>Prenom</td>
                            <td>
                                    <input class="param" type="text" id="prenom" value="">
                            </td>
                    </tr>
                    <tr>
                            <td>Sexe</td>
                            <td>
                                    <input class="param" type="text" id="Sexe" value="">
                            </td>
                    </tr>
                    <tr>
                            <td>Date de naissance</td>
                            <td>
                                    <input class="param" type="text" id="dateDeNaissance" value="">
                            </td>
                    </tr>
                    <tr>
                            <td>Adresse</td>
                            <td>
                                    <input class="param" id="adresse" value="">
                            </td>
                    </tr>
                    <tr>
                            <td>Code Postal</td>
                            <td>
                                    <input class="param" id="codepostal" value="">
                            </td>
                    </tr>
                    <tr>
                            <td>Ville</td>
                            <td>
                                    <input class="param" id="ville" value="">
                            </td>
                    </tr>
                    <tr>
                            <td>Ligue Sportive</td>
                            <td>
                                    <input class="param" id="ligueSportive" value="">
                            </td>
                    </tr>
                    <tr>
                            <td>Numéro Licence</td>
                            <td>
                                <input class="param" id="numLicence" value="">
                            </td>
                    </tr>
                    <tr>
                            <td>
                            </td>
                            <td>
                                    <input type="button" onclick="enrAdehant()" value="Enregister les informations"/>
                            </td>
                    </tr>
            </table>
    </div>
</html>