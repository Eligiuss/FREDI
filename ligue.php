<?php
    $titre = 'FREDI';
    include('header.php');
    session_start();
    
    
    if($_SESSION['login']=="admin")
    {
        echo'
        <a href="creerLigue.php" >
            <input class="boutonMenu" type="submit" value="Création d\'une ligue"/>
        </a>';
    }
    
    $hote='127.0.0.1';
    $user='root';
    $passwd='';
    $database='ppe';
    $cnx=new mysqli($hote,$user,$passwd,$database);

    $SQL = "SELECT * FROM ligues";
    $rs=$cnx->query($SQL);
        
    echo"<div>
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
                        <input type='text' name='numero' value='".$info->numero."'>
                    </td>
                    <td>
                        <input type='text' name='nom' value='".$info->nom."'>
                    </td>
                    <td>
                        <input type='text' name='sigle' value='".$info->sigle."'>
                    </td>
                    <td>
                        <input type='text' name='president' value='".$info->president."'>
                    </td>
                    <td>
                         <input class='boutonLigue' type='button' onclick='modifLigue(".$info->numero.")' value='modifier'/>
                    </td>
                    <td>
                         <input class='boutonLigue suprLigne' type='button' onclick='suprLigue()' value='X'/>
                    </td>
                </tr>";
    }
    echo"</table> </div>";
?>