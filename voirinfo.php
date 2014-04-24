<?php
    include('header.php');

    $Mail=$_GET["login"];

    $hote='127.0.0.1';
    $user='root';
    $passwd='';
    $database='ppe';
    $cnx=new mysqli($hote,$user,$passwd,$database);

    $SQL = "SELECT * FROM demandeurs WHERE 'adressemail'= '".$Mail."'";
    $rs=$cnx->query($SQL);

    var_dump($SQL); 
    var_dump($rs); 

    while($info=$rs->fetch_object())
    {
        $Nom="$info->nom";
        $Prenom="$info->prenom";
        $Adresse="$info->rue";
        $CodeP="$info->cp";
        $Ville="$info->ville";
        $Club=" ";
        $Nlicence="";
        $NLigue="";
    }
        
    echo'
        <h1 align="center">Information</h1>
        <div id="VOIRINFO">
                <table align="center" id="TableEnreg2">
                        <tr>
                                <td>Nom</td>
                                <td>
                                        <input class="param" type="text" name="nom" value="'.$Nom.'">
                                </td>
                        </tr>
                        <tr>
                                <td>Prenom</td>
                                <td>
                                        <input class="param" type="text" name="prenom" value="'.$Prenom.'">
                                </td>
                        </tr>
                        <tr>
                                <td>Adresse</td>
                                <td>
                                        <input class="param" name="adresse" value="'.$Adresse.'">
                                </td>
                        </tr>
                        <tr>
                                <td>Code Postal</td>
                                <td>
                                        <input class="param" name="codepostale" value="'.$CodeP.'">
                                </td>
                        </tr>
                        <tr>
                                <td>Ville</td>
                                <td>
                                        <input class="param" name="ville" value="'.$Ville.'">
                                </td>
                        </tr>
                        <tr>
                                <td>Club</td>
                                <td>
                                        <input class="param" type="text" name="club" value="'.$Club.'">
                                </td>
                        </tr>
                        <tr>
                                <td>N° Licence</td>
                                <td>
                                        <input class="param" type="text" name="licence" value="'.$Nlicence.'">
                                </td>
                        </tr>
                        <tr>
                                <td>N° Ligue</td>
                                <td>
                                        <input class="param" type="text" name="ligue" value="'.$NLigue.'">
                                </td>
                        </tr>
                        <tr>
                                <td>
                                </td>
                                <td>
                                        <input type="submit" value="Enregister les modifications"/>
                                </td>
                        </tr>
                </table>
        </div>';
