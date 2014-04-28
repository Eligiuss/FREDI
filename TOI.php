<body>
<?php
    $titre='Inscription';
    include('header.php');
?>
<h1 align="center">Inscription</h1>
<div id="FormEnreg1">
<form method="POST" id="enreg" action="enregistrement.php">
	<table align="center" id="TableEnreg1">
		<tr>
			<td>Adresse E-mail</td>
			<td>
				<input type="text" class="param" name="email" placeholder="Entrez votre adresse e-mail...">
			</td>
		</tr>
		<tr>
			<td>Mot de passe</td>
			<td>
				<input type="password" class="param" name="mdp" placeholder="Choisissez un mot de passe...">
			</td>
		<tr>
			<td>Confirmation</td>
			<td>
				<input type="password" class="param" name="confirm" placeholder="Confirmez votre  mot de passe...">
			</td>
		</tr>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<input type="button" onclick="inscription()" value="Inscription" />
			</td>
		</tr>
		
	</table>
</form>
</div>
</body>