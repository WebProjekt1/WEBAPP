<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="header-2">DATEI UMBENENNEN</p>
        </div>
    </div>
    <div class="textstandard">


<?php


if (!empty ($_POST["ursprungsname"]))
{
    if (isset($_GET['dateien_id']) AND is_numeric($_GET['dateien_id']) AND pruefen_text($_POST['ursprungsname'],1,50) AND datei_download_berechtigung($_SESSION['benutzer_id'], $_GET['dateien_id']))
    {
        if (datei_umbennenen($_GET['dateien_id'], addslashes($_POST['ursprungsname']))) 
        {
            ?> <br><br> <?php
            echo "Die Datei wurde erfolgreich zu " . $_POST['ursprungsname'] . " umbenannt.";
        }
    }
    else
    {
        echo "Datei konnte nicht umbenannt werden. Keine Berechtigung oder Dateinamen zu kurz/lang (zwischen 1 und 50 Zeichen erlaubt).";
    }
}

else {

    ?>
    </div>

    <div class="text-center">
        <form class="formular2"
              action="index.php?seite=intern_datei_umbenennen&dateien_id=<?php echo $_GET['dateien_id']; ?>"
              method="post">
            Datei umbenennen:
            <div class="form-group">
                <input class="form-control" type="text" placeholder="<?php echo datei_name($_GET['dateien_id']); ?>"
                       name="ursprungsname"/>
            </div>
            <input class="form-control" type="submit" value="umbennnen"/>

        </form>
    </div>
    <?php
}
    ?>
</div>

