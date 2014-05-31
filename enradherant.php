<?php

    include ('Connection_BDD.php');


    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $Sexe= $_POST["Sexe"];
    $dateDeNaissance = $_POST["dateDeNaissance"];
    $adresse = $_POST["adresse"];
    $codepostal = $_POST["codepostal"];
    $ville = $_POST["ville"];
    $ligueSportive = $_POST["ligueSportive"];
    $numLicence = $_POST["numLicence"];

    $SQL = "INSERT INTO adherents (`numero-licence`, `Nom`,`Prenom`, `ligue`,`Sexe`, `dateNaissance`,`adresse`, `codepostal`, `Ville`) VALUES ('".$numLicence."', '".$nom."', '".$prenom."', '".$ligueSportive."', '".$Sexe."', '".$dateDeNaissance."', '".$adresse."', '".$codepostal."', '".$ville."')";
    var_dump($SQL);
    $rs=$cnx->query($SQL);
    
    if($rs)
    {
     echo"ok";
    }
?>
<html>
  <head>
    <noscript>
      <meta http-equiv="refresh" content="5;url=http://example.com" />
    </noscript>
    <title>Countdown Sample</title>
  </head>
  <body>
    <p class="center">
      Vous allez être redirigé vers l'accueil dans <span id="seconds">5</span>.
    </p>
    <script>
      var seconds = 5;
      setInterval(
        function(){
          if (seconds <= 1) {
            window.location = 'index.php';
          }
          else {
            document.getElementById('seconds').innerHTML = --seconds;
          }
        },
        1000
      );
    </script>
  </body>
</html>