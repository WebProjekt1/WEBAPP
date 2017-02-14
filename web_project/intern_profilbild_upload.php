<div class="container">
    <div class="textstandard">
        
        
<?php



//Profilbild-Upload
try {


    if (
        !isset($_FILES['Bilddatei']['error'])  ||
        is_array($_FILES['Bilddatei']['error'])
    ) {
        throw new RuntimeException('Parameter sind ungültig.');
    }


    switch ($_FILES['Datei']['error'])
    {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('Es wurde keine Datei abeschickt. Bitte wähle eine Datei aus');
        default:
            throw new RuntimeException('Unbekannter Fehler ist aufgetreten.');
    }

    if ($_FILES['Bilddatei']['size'] > 10000000) {
        throw new RuntimeException('Maximale Dateigröße wurde überschritten.'); //zugelassene Maximalgröße in Bytes
    }

    //Zugelassene Mime-Typen und deren Prüfung
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
            $finfo->file($_FILES['Bilddatei']['tmp_name']),
            array(
                'jpg' => 'image/jpeg'

            ),
            true
        )) {
        throw new RuntimeException('Ungültiges Dateiformat wurde hochgeladen. Nur JPG-Bilddateien sind zugelassen!');
    }

    
    if (!move_uploaded_file(
        $_FILES['Bilddatei']['tmp_name'], "Profilbilder/". $_SESSION['benutzer_id'] .".jpg"
    )

    ) {
        throw new RuntimeException('Der Dateiupload ist fehlgeschlagen.');
    }
    
    echo "Das Profilbild wurde erfolgreich geändert.";

} catch (RuntimeException $e) {

    echo $e->getMessage();

}

?>
</div>
</div>