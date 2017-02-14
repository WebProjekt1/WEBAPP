<div class="container">
    <div class="textstandard">
<?php

session_start();

include "function_files.php";
include "Datenverbindung.php";
include "function_user.php";
include "function_eingabe_pruefen.php";

if (is_numeric($_GET[dateien_id]))                                               //schließt Sicherheitslücke, es dürfen nur Zahlen übergeben werden
{
    $dateien_id=$_GET[dateien_id];
}

$file_name="../../Upload/" . $dateien_id;

//hier wird überprüft ob man die Berechtigung hat die Datei herunterzuladen
if (datei_download_berechtigung($_SESSION['benutzer_id'], $dateien_id))
{
    if (file_exists($file_name))
    {
     header("Content-type: application/x-download");
     header("Content-Disposition: attachment; filename=". datei_name($dateien_id));        //liest aus der Datenbank den typ und den Ursprungsnamen und benennt die downloaddatei danach
     header("Content-Transfer-Encoding: binary");
     header('Content-Length: ' . filesize($file_name));
     ob_clean();
     flush();
     readfile($file_name);
   }
}
else
{
    echo "Keine Berechtigung um die Datei herunterzuladen";
}


?>
    </div>
</div>
