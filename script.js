function inscription(){
	var email = document.getElementsByName('email')[0].value;
	var mdp = document.getElementsByName('mdp')[0].value;
	var confirm = document.getElementsByName('confirm')[0].value;
	
	if (email == ''){
		alert('Veuillez entrer votre adresse email !');
		return false;
	}
	
	if (mdp == ''){
		alert('Veuillez entrer votre mot de passe !');
		return false;
	}
	
	if (confirm.value == ''){
		alert('Veuillez confirmer votre mot de passe !');
		return false;
	}
	
	if(confirm != mdp){
		alert('Les 2 mots de passe ne correspondent pas');
		return false;
	}
	
	document.forms["enreg"].submit();
}

function connexion(){
	var email = document.getElementsByName('email')[0].value;
	var mdp = document.getElementsByName('mdp')[0].value;
	
	if (email == ''){
		alert('Veuillez entrer votre adresse email !');
		return false;
	}
	
	if (mdp == ''){
		alert('Veuillez entrer votre mot de passe !');
		return false;
	}
        
        $.ajax({url: 'checkLogin.php',
                data: {email: email, mdp : mdp},
                type: 'POST',
                success: function(response){
                    if(response == "ok"){
                        window.location.replace('site.php');
                    } else {
                        alert('Identifiants de connexion incorrects');
                        document.getElementsByName('mdp')[0].value = '';
                        return;
                    }
                }
        })
}

function passRequest(){
	var email = prompt("Veuillez entrer votre adresse e-mail");
	if(!email)
	{
		return false;
	}

	$.ajax({ 
            url: 'sendMail.php',
            data: {email: email},
            type: 'post',
            success: function(response){
                if(response=="ok") {
                   alert('Mail envoyé.');
               } else {
                   alert(response);
                   alert('Erreur dans l\'envoi du mail');
               }
            }
        });
}

function addLine(){
    var nbLignes = $('#tableauBordereau tr').length;
    if(nbLignes == 11){ //9 'vraies' lignes + la première et la dernière, sur lesquelles on n'entre pas d'infos
        alert('Vous avez atteint le nombre maximum de lignes !\nVeuillez en supprimer avant d\'en ajouter à nouveau.');
        return;
    }
    
    $('#tableauBordereau tr:last').prev().after( '<tr>'+
                                                    '<td><input type="text" class="inputTableau" name="dateFrais[]"></td>'+
                                                    '<td><input type="text" class="inputTableau" name="motifFrais[]"></td>'+
                                                    '<td><input type="text" class="inputTableau" name="trajetFrais[]"></td>'+
                                                    '<td><input type="text" class="inputTableau" name="kmFrais[]"></td>'+
                                                    '<td><input type="text" class="inputTableau" name="coutFrais[]"></td>'+
                                                    '<td><input type="text" class="inputTableau" name="peagesFrais[]"></td>'+
                                                    '<td><input type="text" class="inputTableau" name="repasFrais[]"></td>'+
                                                    '<td><input type="text" class="inputTableau" name="hebergementFrais[]"></td>'+
                                                    '<td><input type="text" class="inputTableau" name="totalFrais[]"></td>'+
                                                    '<td><input type="button" class="deleteButton"/></td>'+
                                                    '<td><input type="button" value="enregistré ligne" onclick="enrligne()"/></td>'+
                                                 '</tr>');
												 
    $('.deleteButton').click(function(){
            $(this).closest("tr").remove();
    });
}

function modifInfo(){
        var nom = document.getElementById('nom').value;
        var prenom = document.getElementById('prenom').value;
        var adresse = document.getElementById('adresse').value;
        var codepostal = document.getElementById('codepostal').value;
        var ville = document.getElementById('ville').value;
        
        $.ajax({ 
            url: 'modifInfo.php',
            data:   { 
                        nom: nom,
                        prenom: prenom,
                        adresse: adresse,
                        codepostal: codepostal,
                        ville: ville
                    },
            type: 'POST',
            success: function(response){
               if(response=="ok") {
                   alert('Modifications effectuées.');
                   window.location.replace('site.php');
               }
            }
        });
}

function creerLigue(){
        var numero = document.getElementById('numero').value;
        var nom = document.getElementById('nom').value;
        var sigle = document.getElementById('sigle').value;
        var president = document.getElementById('president').value;
        if(nom==""|| numero==""||sigle==""||president=="")
        {
            alert("Veuillez remplir le(s) champ(s) manquant(s)");
            return;
        }
            $.ajax({ 
            url: 'enrligue.php',
            data:   { 
                        numero: numero,
                        nom: nom,
                        sigle: sigle,
                        president: president
                    },
            type: 'POST',
            success: function(response){
               if(response=='ok') {
                   alert('Création effectuée.');
                   window.location.replace('ligue.php');
               } else if (response=='existant') {
                   alert('Une ligue existe déjà avec ce numéro.');
                   document.getElementById('numero').value='';
                   return;
               }
            }
        });
}

function modifLigue(id){
        var numero = document.getElementsByName('numero')[id].value;
        var nom = document.getElementsByName('nom')[id].value;
        var sigle = document.getElementsByName('sigle')[id].value;
        var president = document.getElementsByName('president')[id].value;
        
    $.ajax({ 
            url: 'modifLigue.php',
            data:   {
                       id: id,
                       numero: numero,
                       nom: nom,
                       sigle: sigle,
                       president: president
                    },
            type: 'POST',
            success: function(response){
               $('#tableLigue').append(response);
            }
        });
}

function suprLigue(id){
        $.ajax({ 
            url: 'suprLigue.php',
            data:   {
                       id: id
                    },
            type: 'POST',
            success: function(response){
               if(response=='ok') {
                   alert('supression effectuée.');
                   window.location.replace('site.php');
               } else if (response=='existant') {
                   alert('Une ligue existe déjà avec ce numéro.');
                   document.getElementById('numero').value='';
                   return;
               }
            }
        });
}

function enrAdehant(){
        var nom = document.getElementById('nom').value;
        var prenom = document.getElementById('prenom').value;
        var Sexe = document.getElementById('Sexe').value;
        var dateDeNaissance = document.getElementById('dateDeNaissance').value;
        var adresse = document.getElementById('adresse').value;
        var codepostal = document.getElementById('codepostal').value;
        var ville = document.getElementById('ville').value;
        var ligueSportive = document.getElementById('ligueSportive').value;
        var numLicence = document.getElementById('numLicence').value;
        $.ajax({ 
               url: 'enradherant.php',
               data:   { 
                           nom: nom,
                           prenom: prenom,
                           Sexe: Sexe,
                           dateDeNaissance: dateDeNaissance,
                           adresse: adresse,
                           codepostal: codepostal,
                           ville: ville,
                           ligueSportive: ligueSportive,
                           numLicence: numLicence
                       },
               type: 'POST',
               success: function(response){
                  if(response=="ok") {
                      alert('Modifications effectuées.');
                      window.location.replace('site.php');
                  }
               }
           });
}

function modiftarif(){
    var tarif = document.getElementById('tarif').value;
    $.ajax({ 
               url: 'enrtarif.php',
               data:   { 
                           tarif: tarif,
                       },
               type: 'POST',
               success: function(response){
                  if(response=="ok") {
                      alert('Modifications effectuées.');
                      window.location.replace('site.php');
                  }
               }
           });
}

function enrligne(id){
        var peagesFrais = document.getElementsByName('peagesFrais[]')[id].value;
        var repasFrais = document.getElementsByName('repasFrais[]')[id].value;
        var hebergementFrais = document.getElementsByName('hebergementFrais[]')[id].value;
        var KmsParcouru = document.getElementsByName('kmFrais[]')[id].value;
        var dateFrais = document.getElementsByName('dateFrais[]')[id].value;
        var motifFrais = document.getElementsByName('motifFrais[]')[id].value;
        var trajetFrais = document.getElementsByName('trajetFrais[]')[id].value;
        var coutFrais = document.getElementsByName('coutFrais[]')[id].value;
        var totalFrais = document.getElementsByName('totalFrais[]')[id].value;
           $.ajax({ 
               url: 'enrligne.php',
               data:   { 
                           peagesFrais: peagesFrais,
                           repasFrais: repasFrais,
                           hebergementFrais: hebergementFrais,
                           KmsParcouru: KmsParcouru,
                           dateFrais: dateFrais,
                           motifFrais: motifFrais,
                           trajetFrais: trajetFrais,
                           coutFrais: coutFrais,
                           totalFrais: totalFrais
                       },
               type: 'POST',
               success: function(response){
                  if(response=="ok") {
                      alert('Modifications effectuées.');
                      window.location.replace('site.php');
                  }
               }
           });
}

function Calcul(){
                var nbLignes = $('#tableauBordereau tr').length;
                    var KmsParcouru = document.getElementsByName('kmFrais[]')[0].value;
                    var Tarif = document.getElementById('tarif').value;
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
