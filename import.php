<?php
    $titre='Importer des fichiers';
    include('header.php');
    
    include ('Connection_BDD.php');

?>
<script>
    $(document).ready(
    function(){
        $('input:file#file1').change(
            function(){
                if ($(this).val()) {
                    $('input:submit#sub1').attr('disabled',false); 
                } 
            }
        );

        $('input:file#file2').change(
            function(){
                if ($(this).val()) {
                    $('input:submit#sub2').attr('disabled',false);
                } 
            }
        );
    });
</script>
<html>
    <div class="nouveau">
        <div class="milieuPage">
            <h2 class="text-center">Importer un fichier</h2>
            <br/>
            <h5 align="center">Veuillez choisir un fichier au format .csv</h5>
            <h5 align="center">Le contenu de ce fichier sera ajouté à l'application et remplacera le contenu existant (opération irreversible !)</h5><br/>
            <form action="uploadFile.php" method="post" class="milieuPage" enctype="multipart/form-data">
                <input type="hidden" name="actionUpload" value="file"/>
                <select name="choix" class="form-control">
                    <option value="adhérents">Liste de adhérents</option>
                </select><br/>
                <div style="position:relative; margin-left:42.5%;">
                    <a class='btn btn-default' href='javascript:;'>
                        Parcourir...
                        <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file" size="40" id='file1' onchange='$("#upload-file-info1").html($(this).val());'>
                    </a>
                    &nbsp;
                    <span class='label label-info' id="upload-file-info1"></span>
                </div>
                <br/>
                <input type="submit" id="sub1" disabled class="btn btn-primary center-block" value="Envoyer" />
            </form>     
        </div>
    </div>