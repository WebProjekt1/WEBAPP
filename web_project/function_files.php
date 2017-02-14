<?php

//Diese Funktion schreibt die Metadaten in die Datenbank
function newfile($benutzer_id,$groesse,$uploaddatum,$aenderungsdatum,$ursprungsname,$dateityp)
{
    $sql = "INSERT INTO dateien (benutzer_id, groesse, uploaddatum, aenderungsdatum, ursprungsname, dateityp) 
            VALUES ('$benutzer_id','$groesse','$uploaddatum','$aenderungsdatum','$ursprungsname','$dateityp')";
    $query = $GLOBALS["db"]->query($sql);
    if ($query == false)
    {
        return false;           //Datei wurde nicht in die Datenbank eingetragen
        die;
    }
    else
    {
        return true;            //Datei wurde in Datenbank eingetragen
    }
}

//Diese Funktion gibt alle Datein auf dem Bildschirm eines Users aus
function alle_dateien_auflisten($benutzer_id, $filter="",$vorschaubild=false)
{

    $sql = "SELECT * FROM dateien WHERE benutzer_id='$benutzer_id' $filter";
    $query = $GLOBALS["db"]->query($sql);
    echo "<table align=\"center\"><tr>";
    echo "<th align=\"center\">löschen&nbsp;&nbsp;</th>";
    echo "<th align=\"center\">umbennnen&nbsp;&nbsp;</th>";
    echo "<th align=\"center\">geteilt&nbsp;&nbsp;</th>";
    if($vorschaubild)
    {
        echo"<th>&nbsp;</th>";
    }
    echo "<th align=\"left\">Datei herunterladen</th></tr>";
    while($zeile=$query->fetch(PDO::FETCH_ORI_NEXT))
    {
        echo "<tr>";
        echo "<td><a href=\"?seite=intern_datei_loeschen_zwischenseite&dateien_id=". $zeile[dateien_id] ."\"><span class=\"glyphicon glyphicon-trash\"></span></a></td>";
        echo "<td><a href=\"?seite=intern_datei_umbenennen&dateien_id=". $zeile[dateien_id] ."\"><span class=\"glyphicon glyphicon-edit\"></span></a></td>";

        if($zeile[geteilt]<>1)
        {
            echo "<td><a href=\"?seite=intern_datei_freigeben&dateien_id=". $zeile[dateien_id] . "&freigeben=1\"><span class=\"glyphicon glyphicon-unchecked\"></span></a></td>";
        }
        else
        {
            echo "<td><a href=\"?seite=intern_datei_freigeben&dateien_id=". $zeile[dateien_id] . "&freigeben=0\"><span class=\"glyphicon glyphicon-check\"></span></a></td>";
        }
        if($vorschaubild)
        {
            if($zeile[dateityp]=="jpg" OR $zeile[dateityp]=="gif" OR $zeile[dateityp]=="jpeg" OR $zeile[dateityp]=="png" )
            {
                echo"<td><img src=\"intern_datei_vorschau_bild.php?dateien_id=".$zeile[dateien_id]."&sollhoehe=20\"></td>";
            }
            elseif ($zeile[dateityp]=="mpeg" or $zeile[dateityp]=="mov" or $zeile[dateityp]=="avi" or $zeile[dateityp]=="mp4")
            {
                echo "<td><span class=\"glyphicon glyphicon-film\"></span></td>";
            }
            else
            {
                echo "<td><span class=\"glyphicon glyphicon-file\"></span></td>";
            }
        }
        echo "<td align=\"left\"><a class=\"links\" href=\"intern_datei_download.php?dateien_id=" . $zeile[dateien_id] . "\">" . $zeile[ursprungsname] ."</a></td>";
        echo "</tr> ";
    }
    echo "</table>";
}


//Diese Funktion prüft, ob der User die Datei umbenennen, löschen oder teilen darf
function datei_download_berechtigung ($benutzer_id, $dateien_id)
{
        $sql = "SELECT * FROM dateien WHERE dateien_id='$dateien_id'";
        $query = $GLOBALS["db"]->query($sql);
        $zeile=$query->fetch(PDO::FETCH_OBJ);

        if ($benutzer_id==$zeile->benutzer_id)
        {

            return true;       //Richtiger Benutzer, Berechtigung zum Download/Löschen

        }
        else
        {
            return false;       //keine Berechtigung auf Datei, falscher Benutzer
        }
}

//Diese Funktion ermittelt die höchste Dateien_id eines Benutzers
function datei_aktuelle_id ($benutzer_id)
{
    $sql = "SELECT * FROM dateien WHERE benutzer_id='$benutzer_id' ORDER By dateien_id DESC";
    $query = $GLOBALS["db"]->query($sql);
    $zeile=$query->fetch(PDO::FETCH_OBJ);

    return $zeile->dateien_id;
}

//Diese Funktion wandelt die Dateien_id in den Dateinamen um
function datei_name ($dateien_id)
{
    $sql = "SELECT ursprungsname FROM dateien WHERE dateien_id='$dateien_id'";
    $query = $GLOBALS["db"]->query($sql);
    $zeile=$query->fetch(PDO::FETCH_OBJ);

    return $zeile->ursprungsname;
}

//Diese Funktion überprüft ob die Datei freigegeben ist, wenn Datei freigegebn ist gibt die Funktion ein true zurück
function datei_geteilt_status ($dateien_id)
{
    $sql = "SELECT geteilt FROM dateien WHERE dateien_id='$dateien_id'";
    $query = $GLOBALS["db"]->query($sql);
    $zeile=$query->fetch(PDO::FETCH_OBJ);
    if($zeile->geteilt==1)
    {
        return true;                    //Datei ist freigegeben
    }
    else
    {
        return false;                   //Datei ist gesperrt
    }
}

//Diese Funktion benennt den ursprungsnamen um
function datei_umbennenen ($dateien_id, $dateiname_neu)
{
    $sql = "UPDATE dateien SET ursprungsname = '$dateiname_neu'  WHERE dateien_id='$dateien_id' ";
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

//Diese Funktion schreibt in die Datenbank ob die Datei geteilt (1) oder nicht geteilt wurde (0)
function datei_freigeben ($dateien_id, $freigeben)
{
    $sql = "UPDATE dateien SET geteilt ='$freigeben' WHERE dateien_id='$dateien_id' ";
    $query = $GLOBALS["db"]->query($sql);
    $zeile=$query->fetch(PDO::FETCH_OBJ);

    return $query;                //hier wird zurück gegeben ob das Update erfolgreich war
}

//Diese Funktion ermittelt die Summe des Speicherverbrauchs
function datei_summe_speicherverbrauch($benutzer_id)
{
    $sql = "SELECT SUM(groesse) as summe FROM dateien WHERE benutzer_id='$benutzer_id'";
    $query = $GLOBALS["db"]->query($sql);
    $zeile=$query->fetch(PDO::FETCH_OBJ);

    return round(($zeile->summe/1024/1024),2);       //hier wird der Verbrauch zurück gegeben, Datei wird in byte in der DB gespeichert. durch 1024 in kb, durch 1024 in mb

}

//Diese Funktion rechnet die Prozentzahl aus die man Verbraucht hat
function datei_prozent_speicherverbrauch($benutzer_id)                                     
{
    if(BenutzerSpeicherplatz($benutzer_id)<>0)                              
    {
        return round( datei_summe_speicherverbrauch($benutzer_id) / BenutzerSpeicherplatz($benutzer_id) * 100, 0);
    }
    else
    {
        return 100;                                                     //Der Vebrauch wird in % zurück gegeben
    }

}

//Diese Funktion erzeugt das Vorschaubild
function resizePicture($file, $width, $height)
{

    if(!file_exists($file))
        return false;

    header('Content-type: image/jpeg');

    $info = getimagesize($file);

    if($info[2] == 1)
    {
        $image = imagecreatefromgif($file);
    }
    elseif($info[2] == 2)
    {
        $image = imagecreatefromjpeg($file);
    }
    elseif($info[2] == 3)
    {
        $image = imagecreatefrompng($file);
    }
    else
    {
        return false;
    }

    if ($width && ($info[0] < $info[1]))
    {
        $width = ($height / $info[1]) * $info[0];
    }
    else
    {
        $height = ($width / $info[0]) * $info[1];
    }

    $imagetc = imagecreatetruecolor($width, $height);

    imagecopyresampled($imagetc, $image, 0, 0, 0, 0, $width, $height,$info[0], $info[1]);

    imagejpeg($imagetc, null, 100);

}
?>
