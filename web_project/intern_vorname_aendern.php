<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="header-2">VORNAME ÄNDERN</p>
        </div>
    </div>
    <br>
    <br>
    <div class="textstandard">

<?php


if (!empty ($_POST["vorname"]))
{
    if (pruefen_text($_POST['vorname'],2,50))
    {
        if (changeBenutzer("vorname", $_SESSION['benutzername'], addslashes($_POST['vorname']))) {
            echo "Dein Vorname wurde erfolgreich zu " . $_POST['vorname'] . " geändert";
        }
    }
    else
    {
        echo "Der Vorname konnte nicht geändert werden. Bitte erneut versuchen!";
    }
}

else
{
    ?>
    </div>
    <div class="text-center">
        <form class="formular2" action="index.php?seite=intern_vorname_aendern" method="post">
            Vorname ändern:
            <div class="form-group">
                <input class="form-control"type="text" placeholder="neuer Vorname" name="vorname"/>
            </div>
            <input class="form-control" type="submit" value="Änderung speichern"/>
        </form>
    </div>
    <?php
}
?>
</div>