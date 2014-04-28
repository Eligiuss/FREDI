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
    //var i = $('#tableauBordereau tr').length - 1;
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
        var club = document.getElementById('club').value;
        
        $.ajax({ 
            url: 'modifInfo.php',
            data:   { 
                        nom: nom,
                        prenom: prenom,
                        adresse: adresse,
                        codepostal: codepostal,
                        ville: ville,
                        club: club,
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