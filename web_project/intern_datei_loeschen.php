<div class="container">
    <div class="textstandard">


<?php


if (isset($_GET['dateien_id']) AND is_numeric($_GET['dateien_id']) AND datei_download_berechtigung ($_SESSION[benutzer_id], $_GET[dateien_id]))
{
    //Ursprungsdateinamen wird aus der Datenbank gelesen und in Variable gespeichert bevor Eintrag aus Datenbank gelöscht wird
    $datei_ursprungsname=datei_name($_GET['dateien_id']);

    //Datei-Eigenschaften aus Datenbank löschen
    $sql = " DELETE FROM dateien WHERE dateien_id='$_GET[dateien_id]' and benutzer_id='$_SESSION[benutzer_id]'";
    $query = $GLOBALS["db"]->query($sql);
    $zeile=$query->fetch(PDO::FETCH_OBJ);


    //"reelle" Datei von Server löschen

    $datei_name = "../../Upload/". $_GET['dateien_id'];     //Pfad der Datei auf dem Server

    if (@file_exists($datei_name) == true AND @unlink($datei_name) == true)     //Datei wird gelöscht und es wird überprüft ob es geklappt oder
    {
        //Wenn Datei auf dem Server gefunden wurde wird folgende Meldung ausgegeben
        echo "Datei " . $datei_ursprungsname. " gelöscht.";

    }
    else
    {
        //Wenn Datei nicht auf dem Server gefunden wurde wird folgende Meldung ausgegeben
        echo "Dateieigenschaften aus Datenbank gelöscht, aber Datei " . $datei_ursprungsname. " konnte nicht auf dem Server gefunden werden.";
    }
}
else
{
    //Wenn Datei nicht in der Datenbank gefunden wurde bzw. nicht dem eingeloggten User gehört
    echo "Datei konnte nicht gelöscht werden. Entweder keine Berechtigung oder Datei nicht verfügbar.";
}

?>
    </div>
</div>
