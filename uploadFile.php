<?php
    include ('Connection_BDD.php');


    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);

    if($_POST["actionUpload"]=='file'){
        $mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
        if(!in_array($_FILES['file']['type'],$mimes)){
            echo 'Format invalide, veuillez choisir un fichier csv.';
            exit;
        }
        move_uploaded_file($_FILES["file"]["tmp_name"],
        "upload/" . $_FILES["file"]["name"]);

        $f = fopen("upload/" . $_FILES["file"]["name"], 'r');
        if ($f) {
            $i=0;
            $data = array();

            while ($line = fgetcsv($f)) {
                $data[$i] = $line[0];
                $i++;
            }
            fclose($f);
        } else {
            echo "Erreur dans l'ouverture du fichier";
        }

        $SQL = "INSERT into adherents VALUES ";

        for($i=0; $i<sizeof($data)-1; $i++){
            $SQL.="('".$data[$i]."'),";
        }

        $SQL.="('".$data[$i]."')";

        var_dump($SQL);
        //$rs = $cnx->query($SQL);
        echo 'Operation effectuee';
    }