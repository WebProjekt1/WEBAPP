<div class="container">
    < <div class="row">
        <div class="col-md-12">
            <p class="header-2">WOLLEN SIE DIE DATEI WIRKLICH LÖSCHEN?</p>
        </div>
    </div>
    <br>
    <br>
    <div class="textstandard">


<?php

echo "Möchten sie die Datei  " . $datei_ursprungsname. " wirklich löschen?";
?>
        <br><br>


<?php

echo "<td><input class=\"btn btn-default\" type=\"button\" name=\"change\" value=\"Ja\" onClick=\"self.location.href='?seite=intern_datei_loeschen&dateien_id=". $_GET["dateien_id"] ."'\">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>";


echo "<td><input class=\"btn btn-default\" type=\"button\" name=\"change\" value=\"Nein\" onClick=\"self.location.href='?seite=intern_startseite'\"></td>";



?>
        </div>
</div>




