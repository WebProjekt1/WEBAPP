<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="header-2">PASSWORT ÄNDERN</p>
        </div>
    </div>
    <br>
    <br>
    <div class="textstandard">
<?php

$passwort_alt=md5($_POST["passwort_alt"]);
$passwort_neu=md5($_POST["passwort_neu"]);
$passwort_neu2=md5($_POST["passwort_neu2"]);


if (!empty ($_POST["passwort_alt"]))
{
    if (($passwort_neu == $passwort_neu2) AND checkPasswort($_SESSION['benutzername'], $_POST["passwort_alt"]) AND pruefen_text($_POST['passwort_neu'],8,50))
    {
        if (changePasswort($_SESSION['benutzername'], $passwort_neu))
        {
            echo "Dein Passwort wurde erfolgreich geändert";
        }

    }
    else
    {
        echo "Das Passwort konnte nicht geändert werden. Bitte erneut versuchen!";
    }
}

if (empty ($_POST["passwort_alt"]))
{
?>
    </div>
    <div class="text-center">
        <form class="formular2" action="index.php?seite=intern_kennwort_aendern" method="post">
            Altes Passwort:
            <div class="form-group">
                <input class="form-control" type="password" placeholder="Altes Passwort" name="passwort_alt"/>
            </div>
            Neues Passwort:
            <div class="form-group">
                <input class="form-control" type="password" placeholder="Neues Passwort" name="passwort_neu"/>
            </div>
            Bestätigung neues Passwort:
            <div class="form-group">
                <input class="form-control" type="password" placeholder="Passwort wiederholen" name="passwort_neu2"/>
            </div>
            <input class="form-control" type="submit" value="Änderung speichern"/>

        </form>
    </div>

<?php
}
?>
</div>