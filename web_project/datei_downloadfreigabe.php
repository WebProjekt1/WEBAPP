<div class="container">
    <div class="textstandard">
<?php


//generiert die Datei (es muss kein Benutzer eingeloggt sein)

include "function_files.php";
include "Datenverbindung.php";


if (is_numeric($_GET[dateien_id]))                                                      //schließt Sicherheitslücke, es dürfen nur Zahlen übergeben werden
{
    $dateien_id=$_GET[dateien_id];                                                      //Dateien_id wird übergeben
}

$file_name="../../Upload/" . $dateien_id;                                               //Speicherort der Datei

if(datei_geteilt_status($dateien_id))                                                   //überprüft, ob man die Berechtigung hat die Datei herunterzuladen (=> eine freigabe besteht)
{
    if (file_exists($file_name))                                                        //überprüft ob Datei existiert mit jeweiligem Filename
    {

     header("Content-type: application/x-download");                 
     header("Content-Disposition: attachment; filename=". datei_name($dateien_id));       
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
