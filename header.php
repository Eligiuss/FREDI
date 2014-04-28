<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr_FR" lang="fr_FR">
<head> 
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link type="text/css" href="style.css" rel="stylesheet"/>
        <title><?php echo $titre; ?></title>
	<script src="script.js"></script>
        <script src="jquery.js"></script>
</head>
<body>
    <div id="images">
        <img src="salle_armes.png" class="header_img" />
        <img src="m2l.png" class="header_img" />
        <?php
            if(($titre!=='Connexion') && ($titre!=='Inscription')) {
                echo '  <input id="boutonLogout" type="button" onclick="location.href=\'logout.php\'" value="Déconnexion" />
                        <input type="button" id="boutonHome" onclick="location.href=\'site.php\'" value="Accueil" />';


            }
        ?>
        <hr>
    </div>
</body>
</html>