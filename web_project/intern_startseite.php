<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="header-2">MEINE DATEIEN</p>
        </div>
    </div>
    <br>
    <br>
    <div class="row">

        <div class="form-group">

                <?php
                echo "<input class=\"btn btn-default\" type=\"button\" name=\"change\" value=\"Neue Datei zu yourBox hinzufügen\" onClick=\"self.location.href='?seite=intern_datei_upload_link2'\"></br>";
                ?>

        </div>

    </div>
    <br>
    <br>
    <div class="row">
       <div class="col-md-5">

           <?php
           echo "<p class=\"header-3\">ALLE DOKUMENTE</p>";
           alle_dateien_auflisten($_SESSION['benutzer_id'],"and (dateityp='pdf'  or dateityp='doc' or dateityp='txt' or dateityp='docx')",true);
           ?>

       </div>

       <div class="col-md-2"></div>

       <div class="col-md-5">

           <?php
           echo "<p class=\"header-3\">ALLE BILDER</p>";
           alle_dateien_auflisten($_SESSION['benutzer_id'],"and (dateityp='jpg' or dateityp='png' or dateityp='gif' or dateityp='jpeg')",true);
           ?>

       </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-5">

            <?php
            echo "<p class=\"header-3\">SONSTIGE DATEIEN</p>";
            alle_dateien_auflisten($_SESSION['benutzer_id'],"and not (dateityp='jpg' or dateityp='png' or dateityp='gif' or dateityp='jpeg' or dateityp='pdf'  or dateityp='doc' or dateityp='txt' or dateityp='docx' or dateityp='dot')",true);
            ?>

        </div>

        <div class="col-md-2"></div>

        <div class="col-md-5">

            <?php
            echo "<p class=\"header-3\">GETEILTE DATEIEN</p>";
            alle_dateien_auflisten($_SESSION['benutzer_id'],"and geteilt=1",true);
            ?>

        </div>

    </div>
</div>