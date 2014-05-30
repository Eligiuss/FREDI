    <?php
    $hote='127.0.0.1';
    $user='root';
    $passwd='';
    $database='ppe';
    $cnx=new mysqli($hote,$user,$passwd,$database);
    
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