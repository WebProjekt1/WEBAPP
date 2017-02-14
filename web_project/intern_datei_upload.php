<div class="container">
    <div class="textstandard">


<?php


//Datei-Upload
try {

    if (
        !isset($_FILES['Datei']['error'])  ||
        is_array($_FILES['Datei']['error']))
    {
        throw new RuntimeException('Parameter sind ungültig.');
    }

    switch ($_FILES['Datei']['error'])
    {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('Es wurde keine Datei abeschickt. Bitte wähle eine Datei aus.');
        case UPLOAD_ERR_INI_SIZE:
        default:
            throw new RuntimeException('Unbekannter Fehler ist aufgetreten.');
    }

    //Hier wird die Dateigröße überprüft
    if ($_FILES['Datei']['size'] > 10000000) {
        throw new RuntimeException('Maximale Dateigröße wurde überschritten. Es dürfen maximal 10 MB dürfen hochgeladen werden.');
    }
    //Überprüfen ob genug Speicherplatz für Uploaddatei zur Verfügung steht; alles in MB berechnet
    if ($_FILES['Datei']['size']/1024/1024 > (BenutzerSpeicherplatz($_SESSION['benutzer_id'])-datei_summe_speicherverbrauch($_SESSION['benutzer_id']))) {
        throw new RuntimeException('Dateigröße ist größer als derzeit verfügbarerer Speicherplatz.');
    }

    // Überprüfen der Mime-Typen, zugelassene Mime-Typen definiert
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
            $finfo->file($_FILES['Datei']['tmp_name']),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
                'jpeg' => 'image/jpeg',

                'mpeg' => 'video/mpeg',
                'mov' => 'video/quicktime',            
                'avi' => 'video/x-msvideo',
                'mp4'=> 'video/mp4',                    
                
                'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'doc' => 'application/msword',
                'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
                'txt' => 'text/plain',             

                'pdf' => 'application/pdf',

            ),
            true
        )) {
        throw new RuntimeException("Dieser Dateityp ist nicht zugelassen. Bitte wähle einen anderen Dateitypen.");
    }

    //Datenbankeintrag
    $insertedInDb=newfile($_SESSION['benutzer_id'],$_FILES['Datei']['size'],date("Y-m-d",time()),date("Y-m-d",time()), addslashes($_FILES['Datei']['name']),$ext);

    //Datei-Upload
    if ($insertedInDb)
    {
        if (!move_uploaded_file(
            $_FILES['Datei']['tmp_name'], "../../Upload/" . datei_aktuelle_id($_SESSION['benutzer_id']) //Verzeichnis Upload zwei Ebenen unter public_html
        )

        ) {
            throw new RuntimeException('Upload fehlgeschlagen. Bitte versuche es erneut.');
        }
    }


    echo "<div>Der Upload war erfolgreich.</div>";


} catch (RuntimeException $e) {

    echo $e->getMessage();

}


?>
    </div>
</div>