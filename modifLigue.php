<?php
    $hote='127.0.0.1';
    $user='root';
    $passwd='';
    $database='ppe';
    $cnx=new mysqli($hote,$user,$passwd,$database);
    
    session_start();
    
    $x = $_POST["x"];
    
    $SQL = "SELECT * FROM ligues WHERE numero==.$x.";
    $rs=$cnx->query($SQL);
    
     echo"
           <table id='tableLigue'>
                <tr>
                    <td>
                        N°
                    </td>
                    <td>
                        Nom
                    </td>
                    <td>
                        Sigle
                    </td>
                    <td>
                        President
                    </td>
                </tr>
                
        ";
    while($info = $rs->fetch_object()) {
        echo" 
                <tr>
                    <td>
                        ".$info->numero."
                    </td>
                    <td>
                        ".$info->numero."
                    </td>
                    <td>
                        ".$info->sigle."
                    </td>
                    <td>
                        ".$info->president."
                    </td>
                    </tr>";
    }
    echo"</table>";
?>