    <?php
    include ('Connection_BDD.php');

    
    session_start();
    
    $id = $_POST["id"];
    $numero = $_POST["numero"];
    $nom = $_POST["nom"];
    $sigle = $_POST["sigle"];
    $president = $_POST["president"];
    
    $SQL = "UPDATE ligues
            SET nom='".$nom."',
                sigle='".$sigle."',
                president='".$president."'
            WHERE numero = '".$id."'; ";
    
    $rs=$cnx->query($SQL);
?>