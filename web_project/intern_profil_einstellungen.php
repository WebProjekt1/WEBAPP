<div class="container">


<?php

$benutzername=$_SESSION['benutzername'];
$sql = "SELECT * FROM benutzer WHERE benutzername like '$benutzername'";
$query = $GLOBALS["db"]->query($sql);



if ($zeile=$query->fetch(PDO::FETCH_OBJ))
{

?>
    <div class="row">
        <div class="col-md-12">
            <p class="header-2">MEIN PROFIL</p>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="profil"><?php echo "$zeile->vorname <a  class=\"links\" href=\"index.php?seite=intern_vorname_aendern\"> Vorname ändern <i class='glyphicon glyphicon-pencil'></i></a><br><br>"?></div>
            <div class="profil"><?php echo "$zeile->nachname <a  class=\"links\" href=\"index.php?seite=intern_nachname_aendern\"> Nachname ändern <i class='glyphicon glyphicon-pencil'></i></a><br><br>"?></div>
        </div>

        <div class="col-md-4">

        </div>

        <div class="col-md-4">
            <div class="profil"><?php echo "$zeile->email <a class=\"links\" href=\"index.php?seite=intern_email_aendern\">E-Mail Adresse ändern <i class='glyphicon glyphicon-pencil'></i></a><br><br>"?></div>
            <div class="profil"><?php echo "****** <a class=\"links\" href=\"index.php?seite=intern_kennwort_aendern\">Kennwort ändern <i class='glyphicon glyphicon-pencil'></i></a><br><br>"?></div>


            <div class="profil"><?php echo date('d'.".".'m'.".".'Y',strtotime($zeile->geburtsdatum)) . "<br><br>"?></div>
        </div>

    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-3">
            <?php
            }
            echo "<img src=\"intern_profilbild.php?sollbreite=200\" alt=\"Profilbild\">";                 //Die Bilddatei wird immer als 200px breite angezeigt, höhe variabel, abhängig vom hochgeladenen bild
            ?><br><br>
        </div>
        <div class="col-md-4"></div>

    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-3">
            <?php
            echo "<input class=\"btn btn-default\" type=\"button\" name=\"change\" value=\"Profilbild ändern\" onClick=\"self.location.href='?seite=intern_profilbild_upload_link2'\">";
            ?>
        </div>
        <div class="col-md-4"></div>
    </div>

</div>