<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr_FR" lang="fr_FR">
<head>  
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<script src="jquery.js"></script>
	<script src="script.js"></script>
        <script>
            function Calcul(){
                var nbLignes = $('#tableauBordereau tr').length;
                    var KmsParcouru = document.getElementsByName('kmFrais[]')[0].value;
                    var Tarif = document.getElementById('Tarif').value;
                    document.getElementsByName("coutFrais[]")[0].value = KmsParcouru*Tarif;
            }
            
            function Calcultotal(){
                var nbLignes = $('#tableauBordereau tr').length;
                    var coutFrais = parseInt(document.getElementsByName('coutFrais[]')[0].value);
                    if(isNaN(coutFrais))
                    {
                        coutFrais==0;
                    }
                    var peagesFrais = parseInt(document.getElementsByName('peagesFrais[]')[0].value);
                    var repasFrais = parseInt(document.getElementsByName('repasFrais[]')[0].value);
                    var hebergementFrais = parseInt(document.getElementsByName('hebergementFrais[]')[0].value);
                    var calcul = parseInt(coutFrais+peagesFrais+repasFrais+hebergementFrais);
                    document.getElementsByName("totalFrais[]")[0].value = calcul;
            }
        </script>
</head>
    
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
    
    while($info = $rs->fetch_object()) {
        $Nom=$info->nom;
        $Prenom=$info->prenom;
        $Adresse=$info->adresse;
        $CodeP=$info->codepostal;
        $Ville=$info->ville;
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
            <center>Tarif kilométrique appliqué pour le remboursement : <input type="text" id="Tarif" value="0.28" disabled="disabled"/></center>
            <table id="tableauBordereau">
                <tr>
                    <td>
                        Date jj/mm/aaaa
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
                                        <td><input type="button" value="enregistré ligne" onclick="enrligue()"></td>
				 </tr>
                
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