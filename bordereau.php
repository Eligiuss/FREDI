<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr_FR" lang="fr_FR">
<head>  
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<script src="jquery.js"></script>
	<script src="script.js"></script>
</head>
    
<?php
    $titre='FREDI';
    include('header.php');
    include ('Connection_BDD.php');
    
    session_start();
    $Mail=$_SESSION["login"];


    $SQL = "SELECT * FROM demandeurs WHERE adressemail= '".$Mail."'";
    $rs=$cnx->query($SQL);
    
    while($info = $rs->fetch_object()) {
        $Nom=$info->nom;
        $Prenom=$info->prenom;
        $Adresse=$info->adresse;
        $CodeP=$info->codepostal;
        $Ville=$info->ville;
    }
    $SQL1 = "SELECT * FROM tarif";
    $rs1=$cnx->query($SQL1);
    while($info = $rs1->fetch_object()) {
        $tarif=$info->tarif;
    }
    
    
?>
<body>
    <form action="saveBordereau.php" method="POST">
        <div id="container">
            <h3>Note de frais des bénévoles</h3>
            <input type="text" name="anneeCivile" id="anneeCivile" value="<?php echo date("Y")?>">
            <br/><br/>

            <h5>Je soussigné(e)</h5>
            <input type="text" class="newBordereauText" name="nom" id="nomDemandeur" value="<?php echo$Nom;?>">
            <br/><br/>

            <h5>Demeurant</h5>
            <input type="text" class="newBordereauText" name="adresse" id="adresseDemandeur" value="<?php echo$Adresse;?>">
            <br/><br/>

            <h5>certifie renoncer au remboursement des frais ci-dessous et les laisser à l'association</h5>
            <input type="text"  class="newBordereauText" readonly value="Salles d'Armes de Villers lès Nancy, 1 rue Rodin - 54600 Villers lès Nancy">
            <h5>en tant que don</h5>
            <br/>

            <h5>Frais de déplacement</h5>
            <center>Tarif kilométrique appliqué pour le remboursement : <input type="text" id="tarif" value="<?php echo$tarif;?>" disabled="disabled"/></center>
            <table id="tableauBordereau">
                <tr>
                    <td>
                        Date aaaa/mm/jj
                    </td>
                    <td>
                        Motif
                    </td>
                    <td>
                        Trajet
                    </td>
                    <td>
                        Kms parcourus
                    </td>
                    <td>
                        Coût Trajet
                    </td>
                    <td>
                        Péages
                    </td>
                    <td>
                        Repas
                    </td>
                    <td>
                        Hébergement
                    </td>
                    <td>
                        Total
                    </td>
                    <td></td>
                </tr>
                                <?php
                                    $SQL = "SELECT * FROM bordereau WHERE mail= '".$Mail."'";
                                    $rs=$cnx->query($SQL);
                                    $x=1;
                                    while($info = $rs->fetch_object()) {
                                    $Date=$info->Date;
                                    $Motif=$info->Motif;
                                    $Trajet=$info->Trajet;
                                    $KmsParcourus=$info->KmsParcourus;
                                    $Cout=$info->Cout;
                                    $Peages=$info->Peages;
                                    $Repas=$info->Repas;
                                    $Hebergement=$info->Hebergement;
                                    $Total=$info->Total;
                                    echo'
                                        <tr>
                                            <td><input class="inputTableau" type="text" value="'.$Date.'" name="dateFrais['.$x.']" maxlength="10"></td>
                                            <td><input class="inputTableau" type="text" value="'.$Motif.'" name="motifFrais['.$x.']" maxlength="22"></td>
                                            <td><input class="inputTableau" type="text" value="'.$Trajet.'" name="trajetFrais['.$x.']" maxlength="20"></td>
                                            <td><input class="inputTableau" type="text" value="'.$KmsParcourus.'" onchange="Calcul()" name="kmFrais['.$x.']" maxlength="10"></td>
                                            <td><input class="inputTableau" type="text" value="'.$Cout.'" onchange="Calcultotal()" name="coutFrais['.$x.']" maxlength="10"</td>
                                            <td><input class="inputTableau" type="text" value="'.$Peages.'" onchange="Calcultotal()" name="peagesFrais['.$x.']" maxlength="10"></td>
                                            <td><input class="inputTableau" type="text" value="'.$Repas.'" onchange="Calcultotal()" name="repasFrais['.$x.']" maxlength="10"></td>
                                            <td><input class="inputTableau" type="text" value="'.$Hebergement.'" onchange="Calcultotal()" name="hebergementFrais['.$x.']" maxlength="10"></td>
                                            <td><input class="inputTableau" type="text" value="'.$Total.'" name="totalFrais['.$x.']" maxlength="10"></td>
                                            <td><input type="button" class="deleteButton"/></td>
                                        </tr>';
                                    $x++;
                                    }
                                    if($x<=9){
                                        echo'
                                            <tr>
                                                    <td><input class="inputTableau" type="text" name="dateFrais[]" maxlength="10"></td>
                                                    <td><input class="inputTableau" type="text" name="motifFrais[]" maxlength="22"></td>
                                                    <td><input class="inputTableau" type="text" name="trajetFrais[]" maxlength="20"></td>
                                                    <td><input class="inputTableau" type="text" onchange="Calcul()" name="kmFrais[]" maxlength="10"></td>
                                                    <td><input class="inputTableau" type="text" onchange="Calcultotal()" name="coutFrais[]" maxlength="10"</td>
                                                    <td><input class="inputTableau" type="text" onchange="Calcultotal()" name="peagesFrais[]" maxlength="10"></td>
                                                    <td><input class="inputTableau" type="text" onchange="Calcultotal()" name="repasFrais[]" maxlength="10"></td>
                                                    <td><input class="inputTableau" type="text" onchange="Calcultotal()" name="hebergementFrais[]" maxlength="10"></td>
                                                    <td><input class="inputTableau" type="text" name="totalFrais[]" maxlength="10"></td>
                                                    <td><input type="button" class="deleteButton"/></td>
                                                    <td><input type="button" id="enrLigne" value="Enregistrer ligne" </td>
                                            </tr>
                                        '; 
                                    } 
                                ?>
                
                <tr>
                    <td colspan="8">Montant total des frais de déplacement</td>
                    <td contenteditable="true" value=''></td>
                    <td></td>
                </tr>
            </table>
            <br/>
            
            <div class="center"><input type="button" value="Ajouter une ligne" onclick="addLine()"></div>

            <h5>Je suis le représentant légal des adhérents suivants :</h5>
            <textarea name="enfants" id="enfants"></textarea>
            <br/><div class="center"><input type="button" value="ajouter adhérant représenté"></div>
            <br/>

            Montant total des dons
            <input type="text" name="total" id="totalDons">
            <br/><br/>

            <i>Pour bénéficier du reçu de dons, cette note de frais doit être accompagnée de toutes les justificatifs correspondants</i><br/>
            A <input type="text" name="lieu" id="lieu" class="date_lieu" value="<?php echo $Ville;?>"> Le <input type="text" name="date" id="date" class="date_lieu" value="<?php echo date("d.m.y")?>">
            <br/><br/>

            Signature du bénévole <input type="text" name="signature" id="signature">
            <br/><br/>

            <div class="center"><input type="submit" value="PDF"></div>
        </div>
    </form>
</body>
</html>