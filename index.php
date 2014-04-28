<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr_FR" lang="fr_FR">
<head>  
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<script src="script.js"></script>
	<script src="jquery.js"></script>
</head>
<?php
        $titre='Connexion';
	include('header.php');
?>
<h1 align="center">Connexion</h1>
<body>
	<div>
		<form method="POST" id="connect" action="site.php">
		<table id="connexion" align="center">
			<tr>
				<td>
					E-mail
				</td>
				<td>
					<input type="text" class="param" name="email" placeholder="Entrez votre adresse e-mail..."/>
				</td>
			</tr>
			<tr>
				<td>
					Mot de passe
				</td>
				<td>
					<input type="password" class="param" name="mdp" placeholder="Entrez votre mot de passe..."/>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
					<input type="button" onclick="connexion()" id="btn_connexion" value="Connexion" />
				</td>
			</tr>
			<tr>
				<td>
					Pas encore inscrit ?
				</td>
				<td>
					<a href="Toi.php">
						<input type="button" id="btn_inscription" value="Cliquez ici" />
					</a>
				</td>
			</tr>
			<tr>
				<td>
					<td><input type="button" onclick="passRequest()" value="J'ai oublié mon mot de passe"></td>
				</td>
			</tr>
			
		</table>
		</form>
	</div>
</body>
</html>