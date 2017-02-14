<div class="container">
<?php
?>
    <div class="header-1"><p>Registrierung</p></div>
    <form class="formular" action="index.php?seite=daten_eintragen" method="post">
        Vorname:
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Vorname" name="vorname" />
        </div>
        Nachname:
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Nachname" name="nachname" />
        </div>
        Benutzername:
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Benutzername" name="benutzername" />
        </div>
        Passwort:
        <div class="form-group">
            <input class="form-control" type="password" placeholder="*******" name="passwort" />
        </div>
        Email-Adresse:
        <div class="form-group">
            <input class="form-control" type="email" placeholder="E-Mail" name="email" />
        </div>

    Geburtsdatum:<br>
    <label>Tag
        <select class="form-control" name="tag" size="1">
             <?php
             $tag=1;
             while($tag<=31){                                 //Diese Schleife zählt von 01 bis 31 Tage
                 $tag2 = $tag;
                 if ($tag<10){
                     $tag2= "0".$tag;
                 }
                 echo"<option value=\"$tag2\">$tag2</option>";
                 $tag++;
             }
             ?>
        </select>
    </label>

    <label>Monat
        <select class="form-control" name="monat" size="1">
             <option value="01">Januar</option>
             <option value="02">Februar</option>
             <option value="03">März</option>
             <option value="04">April</option>
             <option value="05">Mai</option>
             <option value="06">Juni</option>
             <option value="07">Juli</option>
             <option value="08">August</option>
             <option value="09">September</option>
             <option value="10">Oktober</option>
             <option value="11">November</option>
             <option value="12">Dezember</option>
        </select>
    </label>

    <label>Jahr
        <select class="form-control" name="jahr" size="1">
            <?php
            $jahr=date("Y",time());
            while($jahr>=date("Y",time())-100){                                     //Diese Schleife zählt vom aktuellem Jahr bis 100 Jahre runter
                echo"<option value=\"$jahr\">$jahr</option>";
                $jahr--;                                                            //Jahr = Jahr - 1
            }
            ?>
        </select>
    </label><br><br>

   <input class="form-control"  type="submit" value="Jetzt registrieren"/>


</form>
</div>
