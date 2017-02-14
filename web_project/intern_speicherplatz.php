<div class="container">
<div class="row">
<div class="col-md-12">
    <p class="header-2">SPEICHERPLATZ</p>
</div>
</div>
<br>
<br>
<div class="speicherplatz">

<?php
echo "Größe Speicherplatz " . BenutzerSpeicherplatz($_SESSION['benutzer_id'])." MB </br>";              //für jeden Benutzer kann separat der Speicherplatz festgelegt werden -> Standard 100 mb in DB eingetragen
echo "Speicherverbrauch " . datei_summe_speicherverbrauch($_SESSION['benutzer_id']) ." MB </br>";
echo "Freier Speicherplatz " . (BenutzerSpeicherplatz($_SESSION['benutzer_id'])-datei_summe_speicherverbrauch($_SESSION['benutzer_id'])) ." MB</br>";
echo "Vebrauch " . datei_prozent_speicherverbrauch($_SESSION['benutzer_id']) ." %</br>";

$anzeigenbreite=400;
?>


<br>
<br>
<br>


<table align="center" border="1" width="<?php echo $anzeigenbreite; ?>">
    <tr>
        <td class="speicherplatz-1" height="20" width="<?php echo datei_prozent_speicherverbrauch($_SESSION['benutzer_id'])/100*$anzeigenbreite; ?>" bgcolor="#afeeee"></td>           <?php //rechnte aus wie groß blauer Balken sein muss?>
        <td class="speicherplatz-1"height="20" width="<?php echo (100-datei_prozent_speicherverbrauch($_SESSION['benutzer_id']))/100*$anzeigenbreite; ?>"></td>                        <?php //rechent 100 minus verbrauchter Speicherplatz = freier Speicherplatz ?>

    </tr>
</table>

<?php //Tabellen-beschriftung, deswegen nochmal das gleiche, da sonst die Prozentzahl eine Zeile darunter steht (unterdrückt Zeilenumbruch)?>
<table align="center" width="<?php echo $anzeigenbreite; ?>">
    <tr>
        <td width="<?php echo datei_prozent_speicherverbrauch($_SESSION['benutzer_id'])/100*$anzeigenbreite; ?>">Vebrauch&nbsp;<?php echo datei_prozent_speicherverbrauch($_SESSION['benutzer_id']) ."&nbsp;%";?></td>
        <td width="<?php echo (100-datei_prozent_speicherverbrauch($_SESSION['benutzer_id']))/100*$anzeigenbreite; ?>">frei&nbsp;<?php echo (100-datei_prozent_speicherverbrauch($_SESSION['benutzer_id'])) ."&nbsp;%";?></td>
    </tr>
</table>
</div>
</div>