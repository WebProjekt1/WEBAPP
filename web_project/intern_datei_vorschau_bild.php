<?php

session_start();

include "function_files.php";
include "Datenverbindung.php";


//hier wird der Pfad zur Datei auf dem Server gespeichert, sofern Datei ID eine Nummer ist
if (is_numeric($_GET['dateien_id']))
{
    $dateien_id = $_GET['dateien_id'];
    $bild = "../../Upload/" . $dateien_id;
}
//hier werden die Höhe und die Breite des Bildes ermittelt
list($breite, $hoehe) = getimagesize($bild);

if (is_numeric($_GET["sollbreite"])){
    $bildSollBreite=$_GET["sollbreite"];

    //hier wird das Bild normiert (Breite soll immer gleich sein, egal wie groß das Ursprungsbild ist)
    $hoehenfaktor=$bildSollBreite/$breite;
    $bildSollHoehe=$hoehe*$hoehenfaktor;
}
elseif(is_numeric($_GET["sollhoehe"])) {
    $bildSollHoehe = $_GET["sollhoehe"];

    //hier wird das Bild normiert (Höhe soll immer gleich sein, egal wie groß das Ursprungsbild ist)
    $breitenfaktor=$bildSollHoehe/$hoehe;
    $bildSollBreite=$breite*$breitenfaktor;
}

if(datei_download_berechtigung ($_SESSION[benutzer_id], $dateien_id))
{
    
    resizePicture ($bild, $bildSollBreite,$bildSollHoehe);
}

?>