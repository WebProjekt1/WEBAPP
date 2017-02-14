<?php

session_start();

include "function_files.php";


$bild="Profilbilder/".$_SESSION['benutzer_id'].".jpg";

//Hier werden die Höhe und die Breite des Bildes ermittelt
list($breite, $hoehe) = getimagesize($bild);

if (is_numeric($_GET["sollbreite"])){
    $bildSollBreite=$_GET["sollbreite"];

    //Hier wird das Bild normiert (Die Breite soll immer gleich sein, egal wie groß das Ursprungsbild ist)
    $hoehenfaktor=$bildSollBreite/$breite;
    $bildSollHoehe=$hoehe*$hoehenfaktor;
}
elseif(is_numeric($_GET["sollhoehe"])) {
    $bildSollHoehe = $_GET["sollhoehe"];

    //Hier wird das Bild normiert (Die Höhe soll immer gleich sein, egal wie groß das Ursprungsbild ist)
    $breitenfaktor=$bildSollHoehe/$hoehe;
    $bildSollBreite=$breite*$breitenfaktor;
}


resizePicture ($bild, $bildSollBreite,$bildSollHoehe);

?>
