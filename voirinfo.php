<?php
    $titre='FREDI';
    include('header.php');
    
    session_start();
    $Mail=$_SESSION["login"];

    $hote='127.0.0.1';
    $user='root';
    $passwd='';
    $database='ppe';
    $cnx=new mysqli($hote,$user,$passwd,$database);

    $SQL = "SELECT * FROM demandeurs WHERE adressemail= '".$Mail."'";
    $rs=$cnx->query($SQL);

    //var_dump($SQL); 
    
    while($info = $rs->fetch_object()) {
        $Nom=$info->nom;
        $Prenom=$info->prenom;
        $Adresse=$info->adresse;
        $CodeP=$info->codepostal;
        $Ville=$info->ville;
        $Club="";
        $Nlicence="";
        $NLigue="";
    }
        
    echo'
        <h1 align="center">Informations personnelles</h1>
        <div id="VOIRINFO">
            <table align="center" id="TableEnreg2">
                    <tr>
                            <td>Nom</td>
                            <td>
                                    <input class="param" type="text" id="nom" value="'.$Nom.'">
                            </td>
                    </tr>
                    <tr>
                            <td>Prenom</td>
                            <td>
                                    <input class="param" type="text" id="prenom" value="'.$Prenom.'">
                            </td>
                    </tr>
                    <tr>
                            <td>Adresse</td>
                            <td>
                                    <input class="param" id="adresse" value="'.$Adresse.'">
                            </td>
                    </tr>
                    <tr>
                            <td>Code Postal</td>
                            <td>
                                    <input class="param" id="codepostal" value="'.$CodeP.'">
                            </td>
                    </tr>
                    <tr>
                            <td>Ville</td>
                            <td>
                                    <input class="param" id="ville" value="'.$Ville.'">
                            </td>
                    </tr>
                    <tr>
                            <td>Club</td>
                            <td>
                                    <input class="param" type="text" id="club" value="'.$Club.'">
                            </td>
                    </tr>
                    <tr>
                            <td>N° Licence</td>
                            <td>
                                    <input class="param" type="text" id="licence" value="'.$Nlicence.'">
                            </td>
                    </tr>
                    <tr>
                            <td>N° Ligue</td>
                            <td>
                                    <input class="param" type="text" id="ligue" value="'.$NLigue.'">
                            </td>
                    </tr>
                    <tr>
                            <td>
                            </td>
                            <td>
                                    <input type="button" onclick="modifInfo()" value="Enregister les modifications"/>
                            </td>
                    </tr>
            </table>
        </div>';