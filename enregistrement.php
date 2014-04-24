<?php
	include('header.php');

	$hote='127.0.0.1';
	$user='root';
	$passwd='';
	$database='ppe';
	$cnx=new mysqli($hote,$user,$passwd,$database);
	
	$Mail = $_POST["email"];
	$Mdp = $_POST["mdp"];
	
	$SQL = "INSERT INTO demandeurs (`adresse-mail`, `mdp`) VALUES ('".$Mail."', '".$Mdp."')";
	$rs=$cnx->query($SQL);
?>
<center>
<p>
Vous avez été enregistré, cliquez 	
	<a href="index.php">
		<input type="button" value="ici"/>
	</a>
</p>
</center>