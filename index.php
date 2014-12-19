<?php
include ("auth.inc.php");
login();

if(isset($_GET["page"])){
    $page=$_GET["page"];
    if(strpos($page,"/") === true){
        die("");
    }
}else{
    $page="main";
}

function addMenuLink($name, $text){
    global $page;
    if($page == $name){
        $class='class="active"';
    }else{
        $class='';
    }
    echo '<li '.$class.'><a href="?page='.$name.'">'.$text.'</a></li>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <title>Gestion de la patientèle</title>
        <link rel='stylesheet' href='fullcalendar-2.2.3/fullcalendar.css' rel='stylesheet' />
        <link rel='stylesheet' href='fullcalendar-2.2.3/lib/cupertino/jquery-ui.min.css' />
        <link rel='stylesheet' href='banner.css' />
        <link rel='stylesheet' href='docAppointments.css' />
        <link rel='stylesheet' href='fullcalendar-2.2.3/fullcalendar.print.css' media='print' />

        <script type="text/javascript" src='fullcalendar-2.2.3/lib/moment.min.js'></script>
        <script type="text/javascript" src='fullcalendar-2.2.3/lib/jquery.min.js'></script>
        <script type="text/javascript" src='fullcalendar-2.2.3/lib/jquery-ui.custom.min.js'></script>
        <script type="text/javascript" src='fullcalendar-2.2.3/fullcalendar.min.js'></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

        <!-- Doc appointments -->
        <script type="text/javascript" src='fullcalendar-2.2.3/lang-all.js'></script>
        <script type="text/javascript" src='docAppointments.js'></script>
        <script type="text/javascript" src='sticky.js'></script>

        <!-- Favicon -->
        <link href="favicon.ico" rel="icon" type="image/x-icon" />
    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Gestion de la patientèle</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <?php addMenuLink("main", "Accueil"); ?>
                        <?php addMenuLink("stats", "Statistiques"); ?>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administration<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                 <?php addMenuLink("backup.php", "Backup"); ?>
                            </ul>
                        </li>
                    </ul>

                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Patient...">
                        </div>
                        <button type="submit" class="btn btn-default">Rechercher</button>
                    </form>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">05 62 18 84 70</a></li>
                        <li><a href="signout.php">Se déconnecter</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <!-- Begin page content -->
        <div class="container">
            <?php
                // Include the correct page
                $page_include="pages/".$page.".php";
                 if(file_exists($page_include)){
                     include $page_include;
                 }else{
                     include "pages/notfound.php";
                 }
            ?>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="text-muted">LTS Services</p>
            </div>
        </footer>
    </body>
</html>
