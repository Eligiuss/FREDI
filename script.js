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
	
	window.location.replace('site.php');
	document.forms["connect"].submit();
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
                                                    '<td contenteditable name="dateFrais[]"></td>'+
                                                    '<td contenteditable name="motifFrais[]"></td>'+
                                                    '<td contenteditable name="trajetFrais[]"></td>'+
                                                    '<td contenteditable name="kmFrais[]"></td>'+
                                                    '<td contenteditable name="coutFrais[]"></td>'+
                                                    '<td contenteditable name="peagesFrais[]"></td>'+
                                                    '<td contenteditable name="repasFrais[]"></td>'+
                                                    '<td contenteditable name="hebergementFrais[]"></td>'+
                                                    '<td contenteditable name="totalFrais[]"></td>'+
                                                    '<td><input type="button" class="deleteButton"/></td>'+
                                                 '</tr>');
												 
	$('.deleteButton').click(function(){
		$(this).closest("tr").remove();
	});
}

