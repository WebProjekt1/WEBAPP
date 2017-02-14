<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/yourBox.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch:400,700|Nunito" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="header-2">NEUES PASSWORT VERGEBEN</p>
        </div>
    </div>
    <br>
    <br>
    <div class="textstandard">

<?php

//Hiet wird überprüft, ob das Passwort leer ist
if (pruefen_text($_POST["passwort"],8,50))
{
    if ($_POST['passwort'] == $_POST['passwort2'] AND checkZufallszahl($_POST['benutzername'], $_POST['zufallszahl']) AND $_POST['zufallszahl'] > 0 )   //Hier wird die Zufallszahl überprüft das sie nicht 0 ist und richtig.
    {
        changePasswort($_POST['benutzername'], md5($_POST['passwort2']));
        changeBenutzer ("zufallszahl", $_POST['benutzername'], 0);                                  //Hierdurch kann man das Passwort nur einmal ändern
        echo "Dein Passwort wurde erfolgreich geändert";
    }
    else
    {
        echo "Das Passwort konnte nicht geändert werden. Bitte erneut versuchen!";
    }
}
else
{

?>
    </div>
    <div class="text-center">
        <form class="formular2" action="index.php?seite=passwort_zuruecksetzen" method="post">
    <input type="hidden" name="benutzername" value="<?php if (empty ($_GET['benutzername'])) echo $_POST['benutzername']; else echo $_GET['benutzername']; ?>">
    <input type="hidden" name="zufallszahl" value="<?php if (empty ($_GET['zufallszahl'])) echo $_POST['zufallszahl']; else echo $_GET['zufallszahl']; ?>">
    Bitte gib ein neues Passwort ein:
            <div class="form-group">
    <input class="form-control" type="password" placeholder="neues Passwort" name="passwort"><br><br>
            </div>
    Passwort erneut eingeben:
            <div class="form-group">
    <input class="form-control"type="password" placeholder="Passwort bestätigen" name="passwort2"><br><br>
            </div>
    <input class="form-control"type="submit" value="Passwort speichern">
</form>

<?php
}
?>
</div>