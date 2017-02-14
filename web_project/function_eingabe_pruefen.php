<?php
/**
 * Created by PhpStorm.
 * User: Breqqs
 * Date: 13.11.2016
 * Time: 17:46
 */

//Diese Funktion prüft die Mindest- oder Maximallänge was der Benutzer eingibt
function pruefen_text ($text, $mindestlaenge, $maximallaenge)
{
    $laenge=strlen($text);
    if ($laenge >= $mindestlaenge and $laenge <= $maximallaenge)
    {
        return true;
    }

    else
    {
        return false;
    }
}

//Diese Funktion prüft ob die Seite korrekt ist
function pruefen_seite ($seite)
{

    if (file_exists($seite.".php"))
    {
        return true;
    }
    else
    {
        return false;
    }
}

?>

