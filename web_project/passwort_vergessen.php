<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="header-2">PASSWORT VERGESSEN? JETZT ZURÜCKSETZEN</p>
        </div>
    </div>
    <br>
    <br>
    <div class="textstandard">


<?php

if (!empty($_POST['email']))
{
    $email=$_POST['email'];
    $benutzername=$_POST['benutzername'];
    if (checkEmail (addslashes($benutzername), addslashes($email)))
    {
        $zufallszahl = rand(1,9999);                                                 //Diese Zufallszahl zwischen 1 und 9999 wird an den Benutzer per mail geschickt

        //Die Zufallszahl wird in der Datenbank aktualisiert
        changeBenutzer ("zufallszahl", $benutzername, $zufallszahl);

        //Link für generieren mit (.) werden die Strings zusammen gebaut
        $link = "https://mars.iuk.hdm-stuttgart.de/~rw038/web_project/index.php?seite=passwort_zuruecksetzen&zufallszahl=" . $zufallszahl . "&benutzername=" . $benutzername;

        //Hier wird die E-Mail verschickt
        mail($email,"Passwort vergessen","Klicke hier auf den Link $link um ein neues Passwort zu setzen.");
        echo "E-Mail wurde an $email geschickt. Bitte Anweisungen in der E-Mail folgen.";
    }
    else{
        echo "Die E-Mail $email und der Benutzernamen $benutzername konnten nicht in der Datenbank gefunden werden.";
    }

}


else{
?>
    </div>

    <div class="text-center">
    <form class="formular2" action="index.php?seite=passwort_vergessen" method="post">
        Benutzername:
            <div class="form-group">
            <input class="form-control" type="text" placeholder="Benutzername eingeben" name="benutzername">
            </div>
        E-mail Adresse:
            <div class="form-group">
            <input class="form-control" type="email" placeholder="Email eingeben" name="email">
            </div>
            <input class="btn btn-default" type="submit" value="Neues Passwort anfordern">
</form>
    </div>
<?php
}
?>
</div>