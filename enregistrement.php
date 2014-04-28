<?php
    $titre='Inscription';
    include('header.php');

    $hote='127.0.0.1';
    $user='root';
    $passwd='';
    $database='ppe';
    $cnx=new mysqli($hote,$user,$passwd,$database);

    $Mail = $_POST["email"];
    $Mdp = $_POST["mdp"];

    $SQL = "INSERT INTO demandeurs (`adressemail`, `mdp`) VALUES ('".$Mail."', '".$Mdp."')";
    $rs=$cnx->query($SQL);
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