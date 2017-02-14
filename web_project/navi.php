<?php
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/yourBox.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch:400,700|Nunito" rel="stylesheet">


</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?seite=<?php if(!empty($_SESSION['benutzername']) AND  $seite<>"logout") { echo "intern_startseite";} ?> "><?php echo "$boxname"; ?>Box</a>
            </div>
            <?php
            if(!empty($_SESSION['benutzername']))
            {
                ?>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a <?php if($seite=="intern_startseite") {echo "class=\"active\""; }?> href="?seite=intern_startseite">MEINE DATEIEN</a></li>
                    <li><a <?php if($seite=="intern_profil_einstellungen") {echo "class=\"active\""; }?> href="?seite=intern_profil_einstellungen">MEIN PROFIL</a></li>
                    <li><a <?php if($seite=="intern_speicherplatz") {echo "class=\"active\""; }?> href="?seite=intern_speicherplatz">SPEICHERPLATZ</a></li>

                    <li><a href="#"><span class="profilePicture"><?php echo "<img src=\"intern_profilbild.php?sollhoehe=20\" height=\"20\" alt=\"Profilbild\">"; ?></span></a></li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo $_SESSION['benutzername']; ?>
                            <span <i class="glyphicon glyphicon-menu-down"> </i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="?seite=logout" >Abmelden <i class="glyphicon glyphicon-off"></i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <?php
            }
            ?>
        </div>
    </nav>

<?php

    if((empty($_SESSION['benutzername']) OR  $seite=="logout") AND $seite<>"login")
        {
            echo "<div class=\"bg\">";
        }
        else
        {
           echo "<div class=\"bg_intern\">";
        }

    ?>

<div class="text-center">