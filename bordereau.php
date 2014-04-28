<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr_FR" lang="fr_FR">
<head>  
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<script src="jquery.js"></script>
	<script src="script.js"></script>
</head>
<?php
	include('header.php');
?>
<body>
    <form action="saveBordereau.php" method="POST">
        <div id="container">
            <h3>Note de frais des bénévoles</h3>
            <input type="text" name="anneeCivile" id="anneeCivile" placeholder="Année civile...">
            <br/><br/>

            <h5>Je soussigné(e)</h5>
            <input type="text" class="newBordereauText" name="nom" id="nomDemandeur">
            <br/><br/>

            <h5>Demeurant</h5>
            <input type="text" class="newBordereauText" name="adresse" id="adresseDemandeur">
            <br/><br/>

            <h5>certifie renoncer au remboursement des frais ci-dessous et les laisser à l'association</h5>
            <input type="text"  class="newBordereauText" readonly value="Salles d'Armes de Villers lès Nancy, 1 rue Rodin - 54600 Villers lès Nancy">
            <h5>en tant que don</h5>
            <br/>

            <h5>Frais de déplacement</h5>
            <center>Tarif kilométrique appliqué pour le remboursement : 0.28€</center>
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
					<td><input class="inputTableau" type="text" name="kmFrais[]" maxlength="10"></td>
					<td><input class="inputTableau" type="text" name="coutFrais[]" maxlength="10"></td>
					<td><input class="inputTableau" type="text" name="peagesFrais[]" maxlength="10"></td>
					<td><input class="inputTableau" type="text" name="repasFrais[]" maxlength="10"></td>
					<td><input class="inputTableau" type="text" name="hebergementFrais[]" maxlength="10"></td>
					<td><input class="inputTableau" type="text" name="totalFrais[]" maxlength="10"></td>
					<td><input type="button" class="deleteButton"/></td>
				 </tr>
                
                <tr>
                    <td colspan="8">Montant total des frais de déplacement</td>
                    <td contenteditable="true"></td>
                    <td></td>
                </tr>
            </table>
            <br/>
            
            <div class="center"><input type="button" value="Ajouter une ligne" onclick="addLine()"></div>

            <h5>Je suis le représentant légal des adhérents suivants :</h5>
            <textarea name="enfants" id="enfants"></textarea>
            <br/><br/>

            Montant total des dons
            <input type="text" name="total" id="totalDons">
            <br/><br/>

            <i>Pour bénéficier du reçu de dons, cette note de frais doit être accompagnée de toutes les justificatifs correspondants</i><br/>
            A <input type="text" name="lieu" id="lieu" class="date_lieu"> Le <input type="text" name="date" id="date" class="date_lieu">
            <br/><br/>

            Signature du bénévole <input type="text" name="signature" id="signature">
            <br/><br/>

            <div class="center"><input type="submit" value="Enregistrer"></div>
        </div>
    </form>
</body>
</html>
