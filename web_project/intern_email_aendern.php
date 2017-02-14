<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="header-2">E-MAIL ADRESSE ÄNDERN</p>
        </div>
    </div>
    <br>
    <br>
    <div class="textstandard">
<?php


if (!empty ($_POST["email"]))
{
    if (pruefen_text($_POST['email'],5,250))
    {
        if (changeBenutzer("email", $_SESSION['benutzername'], addslashes($_POST['email'])))
        {
            echo "Dein E-Mailadresse wurde erfolgreich zu " . $_POST['email'] . " geändert";
        }
    }
    else
    {
        echo "Die E-Mailadresse konnte nicht geändert werden. Bitte erneut versuchen!";
    }
}

else
{
    ?></div>
    <div class="text-center">
        <form class="formular2" action="index.php?seite=intern_email_aendern" method="post">
            E-Mail Adresse ändern:
            <div class="form-group">
                <input class="form-control" type="email" placeholder="neue E-mail Adresse" name="email"/>
            </div>
            <input class="form-control" type="submit" value="Änderung speichern"/>

        </form>
    </div>
    <?php
}
?>
</div>