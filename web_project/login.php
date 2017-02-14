<div class="container">
    <div class="textstandard">

<?php


if (!isset($_GET['login']))
{

    $benutzername=$_POST['benutzername'];
    $passwort =$_POST['passwort'];

    //hier wird das Passwort überprüft
    if (empty ($benutzername))
    {
        ?>
            <div class="header-1"><p>Login</p></div>
            <form class="formular" action="index.php?seite=login" method="POST">
                Benutzername:
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Benutzername" size="40" maxlength="250" name="benutzername">
                </div>
                Passwort:
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Passwort" size="40" maxlength="250" name="passwort"><br>
                </div>
                <input class="form-control" type="submit" value="einloggen"><br>

                <p>Passwort vergessen?<a class="links" href ="index.php?seite=passwort_vergessen"> Neues Passwort anfordern</a></p>
                <p>Noch keinen Account?<a class="links" href="index.php?seite=registierung"> Jetzt Registrieren</a> </p>

            </form>
        

<?php
    }
    elseif (checkPasswort (addslashes($benutzername), $passwort))
    {
        $_SESSION['benutzername'] = $benutzername;
        $_SESSION['benutzer_id'] = BenutzerID($benutzername);
        echo "Als $benutzername eingeloggt. Weiter zu <a class=\"links\" href=\"index.php?seite=intern_startseite\">Startseite</a>";

    }

    else
    {
        echo "Der Benutzername oder das Passwort waren ungültig";
    }

}


?>
    </div>
</div>









