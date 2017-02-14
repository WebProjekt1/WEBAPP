<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="header-2">NACHNAME ÄNDERN</p>
        </div>
    </div>
    <br>
    <br>
    <div class="textstandard">

<?php

if (!empty ($_POST["nachname"]))
{
    if (pruefen_text($_POST['nachname'],2,50))
    {
        if (changeBenutzer("nachname", $_SESSION['benutzername'], addslashes($_POST['nachname'])))
        {
            echo "Dein Nachname wurde erfolgreich zu " . $_POST['nachname'] . " geändert";
        }
    }
    else
    {
        echo "Der Nachname konnte nicht geändert werden. Bitte erneut versuchen!";
    }
}

else
{
    ?>
    </div>
    <div class="text-center">
        <form class="formular2" action="index.php?seite=intern_nachname_aendern" method="post">
            Nachname ändern:
            <div class="form-group">
                <input class="form-control" type="text" placeholder="neuer Nachname" name="nachname"/>
            </div>
            <input class="form-control" type="submit" value="Änderung speichern"/>

        </form>
    </div>
    <?php
}
?>
</div>