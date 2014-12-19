<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <title>Authentification</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

        <link rel='stylesheet' href='banner.css' />
        <link rel='stylesheet' href='signin.css' />

        <!-- Favicon -->
        <link href="favicon.ico" rel="icon" type="image/x-icon" />
    </head>

    <body>
        <form class="form-signin" role="form" method="post" action="index.php" >
            <h3 class="form-signin-heading">Merci de vous authentifier</h3>
            <label for="inputEmail" class="sr-only">Adresse Email</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Mot de passe</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me" name="remember"> Souvenez-vous de moi</input>
                </label>
            </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Entrer</button>
        </form>

    <footer class="footer">
        <div class="container">
            <p class="text-muted">LTS Services</p>
        </div>
    </footer>
    </body>
</html>
