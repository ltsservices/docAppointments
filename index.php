<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <title>Gestion de la patientèle</title>
        <link rel='stylesheet' href='fullcalendar-2.2.3/fullcalendar.css' rel='stylesheet' />
        <link rel='stylesheet' href='fullcalendar-2.2.3/lib/cupertino/jquery-ui.min.css' />
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
                        <li class="active"><a href="#">Accueil</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administration<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="./stats/">Statistiques</a></li>
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
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <!-- Begin page content -->
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Notes <span id="sticky_saved">&nbsp;</span></h3>
                        </div>
                        <div class="panel-body">
                            <textarea id="sticky_area" class="sticky_area" name="sticky" cols="15" rows="12"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div id='calendar'></div>
                    <div style='clear: both'></div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="text-muted">LTS Services</p>
            </div>
        </footer>
    </body>
</html>
