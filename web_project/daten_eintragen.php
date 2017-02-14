<div class="container">
    <div class="textstandard">
<?php



//Variablen als interne Variablen umbauen
$benutzername=$_POST["benutzername"];
$passwort=md5($_POST["passwort"]);                                                        // md5 -> Passwort Sicherheit
$vorname=$_POST["vorname"];
$nachname=$_POST["nachname"];
$email=$_POST["email"];
$geburtsdatum=$_POST["jahr"]."-".$_POST["monat"]."-".$_POST["tag"];

//hier wird die maximale und minimale Zeichenanzahl festgelegt
$benutzername_laengeok=pruefen_text($benutzername,4,15);
$benutzername_vorhanden=checkUserExist(addslashes($benutzername));
$passwort_laengeok=pruefen_text($_POST["passwort"],8,50);
$vorname_leangeok=pruefen_text($vorname,2,50);
$nachname_laengeok=pruefen_text($nachname,2,50);


//Fehlermeldungen werden ausgegeben
if ($benutzername_laengeok==FALSE)                                                                     
{
    echo "Der gewählte Benutzername ist zu kurz oder zu lang";
}
elseif ($benutzername_vorhanden==FALSE)
{
    echo "Der Benutzer $benutzername ist schon vorhanden.";
}
elseif ($passwort_laengeok==FALSE)
{
    echo "Das Passwort ist zu kurz oder zu lang (mindestens 8 Zeichen)";
}
elseif ($vorname_leangeok==FALSE)
{
    echo "Der Vorname ist zu kurz oder zu lang";
}
elseif ($nachname_laengeok==FALSE)
{
    echo "Der Nachname ist zu kurz oder zu lang";
}
else
{
    newUser(addslashes($benutzername), $passwort, addslashes($vorname), addslashes($nachname), addslashes($email), $geburtsdatum);
    echo "Der Benutzer $benutzername wurde angelegt. Weiter zur <a class=\"links\" href=\"index.php?seite=intern_startseite\">Startseite</a>";                                                      //wenn der Benutzer angelegt wurde, kommt auf dem Bildschirm die Bestätigung das es funktioniert hat
}



?>
    </div>
</div>

