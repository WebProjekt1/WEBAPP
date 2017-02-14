<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="header-2">DATEI TEILEN</p>
        </div>
    </div>
    <br>
    <br>
    <div class="textstandard">

<?php

if (is_numeric($_GET[dateien_id]))                                                //schließt Sicherheitslücke, es dürfen nur Zahlen übergeben werden
{
    $dateien_id=$_GET[dateien_id];
}
if(is_numeric($_GET[freigeben]))
{
    $freigeben=$_GET[freigeben];                                                  //durch URL wird übergeben: 0 (sperren) oder 1 (freigeben)
}

//hier wird überprüft, ob man die Berechtigung hat die Datei freizugeben
if (datei_download_berechtigung($_SESSION['benutzer_id'], $dateien_id))
    {
    if(datei_freigeben ($dateien_id, $freigeben))                              //führt Update in Datenbank aus freigeben oder sperren
    {

       if($freigeben==1)                                                       //prüft ob freigegeben (1) oder gesperrt (0) werden soll und gibt entsprechende Rückmeldung
       {
           echo "Die Datei wurde erfolgreich zum Teilen freigegeben.";
           echo "<form>
            <div class='form-group'>
            <br><input class=\"linkteilen form-control\" value=\"https://mars.iuk.hdm-stuttgart.de/~rw038/web_project/datei_downloadfreigabe.php?dateien_id=" . $dateien_id . "\"></input></form></div>";
       }
       else
       {
           echo "Der Datei wurde erfolgreich die Freigabe zum Teilen entzogen.";
       }

    }
}
?>
    </div>
</div>
