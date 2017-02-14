<?php

//Diese Funktion tragt die Daten des Benutzers in die Datenbank ein
function newUser($benutzername, $passwort, $vorname, $nachname, $email, $geburtsdatum)
{
    $sql = "INSERT INTO benutzer (benutzername, passwort, vorname, nachname, email, geburtsdatum) VALUES ('$benutzername','$passwort','$vorname','$nachname','$email','$geburtsdatum')";
    $query = $GLOBALS["db"]->query($sql);
    if ($query == false) 
    {
        return false;
        die;
    } 
    else 
    {
        return true;
    }
}

//Diese Funktion überprüft ob der Benutzer vorhanden oder nicht vorhanden ist
function checkUserExist ($benutzername)
{

    $sql = "SELECT * FROM benutzer WHERE benutzername like '$benutzername'";
    $query = $GLOBALS["db"]->query($sql);

    if ($zeile=$query->fetch(PDO::FETCH_OBJ))
    {

        return false;       //Benutzername ist schon vorhanden
    }
    else
    {
        return true;        //Benutzername ist noch nicht vorhanden
    }
}

//Diese Funktion überprüft, ob die Email-Adresse vorhanden oder nicht vorhanden ist
function checkMailExist ($email)
{

    $sql = "SELECT * FROM benutzer WHERE email like '$email'";
    $query = $GLOBALS["db"]->query($sql);

    if ($zeile=$query->fetch(PDO::FETCH_OBJ))
    {

        return true;        //E-Mail vorhanden
    }
    else
    {
        return false;       //E-Mail nicht vorhanden
    }
}

//Diese Funktion überprüft, ob der Benutzer vorhanden oder nicht vorhanden ist
function BenutzerID($benutzername)
{

    $sql = "SELECT benutzer_id FROM benutzer WHERE benutzername like '$benutzername'";
    $query = $GLOBALS["db"]->query($sql);

    if ($zeile=$query->fetch(PDO::FETCH_OBJ))
    {

        return $zeile->benutzer_id;       //Benutzername gefunden und ID ausgeben
    }
    else
    {
        return false;                     //Benutzername nicht gefunden
    }
}

//Diese Funktion liest aus, wieviel Speicherplatz ein Benutzer mit der ID x hat
function BenutzerSpeicherplatz($benutzer_id)
{
    $sql = "SELECT speicherplatz FROM benutzer WHERE benutzer_id='$benutzer_id'";
    $query = $GLOBALS["db"]->query($sql);

    if ($zeile=$query->fetch(PDO::FETCH_OBJ))
    {

        return $zeile->speicherplatz;       //BenutzerID gefunden und Speicherplatz ausgeben
    }
    else
    {
        return false;                       //BenutzerID nicht gefunden
    }
}

//Diese Funktion überprüft das Passwort auf Richtigkeit
function checkPasswort ($benutzername, $passwort)
{

    $sql = "SELECT * FROM benutzer WHERE benutzername like '$benutzername'";
    $query = $GLOBALS["db"]->query($sql);
    $zeile=$query->fetch(PDO::FETCH_OBJ);

    if ($benutzername==$zeile->benutzername and md5($passwort)==$zeile->passwort)
    {

        return true;         //Passwort richtig

    }
    else
    {
        return false;       //Passwort falsch
    }
}

//Diese Funktion überprüft die Email-Adresse auf Richtigkeit
function checkEmail ($benutzername, $email)
{

    $sql = "SELECT * FROM benutzer WHERE benutzername like '$benutzername'";
    $query = $GLOBALS["db"]->query($sql);
    $zeile=$query->fetch(PDO::FETCH_OBJ);

    if ($benutzername==$zeile->benutzername and $email==$zeile->email)
    {

        return true;         //Email richtig

    }
    else
    {
        return false;       //Email falsch
    }
}

//Diese Funktion überprüft die Zufallszahl auf Richtigkeit
function checkZufallszahl ($benutzername, $zufallszahl)
{

    $sql = "SELECT * FROM benutzer WHERE benutzername like '$benutzername'";
    $query = $GLOBALS["db"]->query($sql);
    $zeile=$query->fetch(PDO::FETCH_OBJ);

    if ($benutzername==$zeile->benutzername and $zufallszahl==$zeile->zufallszahl)
    {

        return true;         //Zufallszahl richtig

    }
    else
    {
        return false;       //Zufallszahl falsch
    }
}

function changePasswort ($benutzername, $passwort_neu)
{
    $sql = "UPDATE benutzer SET passwort='$passwort_neu' WHERE benutzername = '$benutzername'";
    $query = $GLOBALS["db"]->query($sql);
    $zeile=$query->fetch(PDO::FETCH_OBJ);
    
    if ($query == false)
    {
        return false;                                                               
        die;
    }
    else
    {
        return true;
    }
}

//Diese Funktion ändert den Inhalt der Datenbanktabell
function changeBenutzer ($Datenbankfeldname, $benutzername, $DatenbankfeldInhalt)              //Datenbankfeldname ist hier nur ein Platzhalter wird übernommen mit dem was man einfügt
{
    $sql = "UPDATE benutzer SET $Datenbankfeldname='$DatenbankfeldInhalt' WHERE benutzername = '$benutzername'";
    $query = $GLOBALS["db"]->query($sql);
    $zeile=$query->fetch(PDO::FETCH_OBJ);
    if ($query == false)
    {
        return false;
        die;
    }
    else
    {
        return true;
    }
}


?>