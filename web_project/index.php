<?php


session_start();

//Hier wird der Boxnamen generiert
if(!empty($_SESSION['benutzername'])AND  $_GET["seite"]<>"logout")
{
    $boxname= $_SESSION['benutzername'];
}
else
{
    $boxname= "Your";
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <?php echo "<title>". $boxname . "Box</title>"; ?>

    <?php
    //Hier wird überprüft, ob eine Seite angegeben ist, ansonsten kann hier eine beliebige Startseite definiert werden.
    if(!empty($_GET["seite"])){
        $seite = $_GET["seite"];
    }
    else {
        $seite = "startseite";
    }

    include("navi.php")
    ?>
    


<?php

include "Datenverbindung.php";
include "function_user.php";
include "function_eingabe_pruefen.php";
include "function_files.php";


//Hier wird geprüft ob "intern_" in dem Seitennamen enthalten ist (Interne Seite = geheime Seite und nur mit Login möglich)
if (pruefen_seite ($seite))
{
    if(strpos($seite,"ntern_")<>0){
        if(!empty($_SESSION['benutzername']))
        {
            include($seite . ".php");
        }
    }
    else {
        include($seite . ".php");
    }
}
else{
    echo "<h1>Seite existiert nicht.</h1>";
}

//wenn man nicht eingeloggt ist kommt die Login Seite, außer direkt nach der Registrierungsseite
if(($seite == "logout" or $seite == "registierung"or $seite == "login" or $seite == "passwort_vergessen" or $seite == "passwort_zuruecksetzen" or $seite =="impressum" )==FALSE)
{
    if(empty($_SESSION['benutzername']))
    {
        include ("login.php");
    }
}
?>


    </div>
    </div>



<?php
include "footer.php"
?>
</body>
</html>

