<?php
	include('header.php');

	$login = $_POST['email'];
	$password = $_POST['mdp'];
	
	echo'
		<div id="site" align="center">
			<input type="hidden" name="login" value="'.$login.'"/>
			<h2>Vous êtes connecté en temps que : '.$login.'</h2>
				
			<h2>Que voulez-vous effectuer ?</h2>
			<a href="bordereau.php">
				<input type="button" value="Ouvrir un nouveau bordereau"/>
			</a>
			<a href="voirinfo.php?login='.$login.'">
				<input type="button" value="Modifier/voir ses informations personnelles"/>
			</a>
		</div>';
?>