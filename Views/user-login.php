<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../Public/assets/css/style.css">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/minty/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
        <title>Recommand it</title>
    </head>
    <body>
        <div class="container-fluid justify-content-center" id="formLogin">
            <div class="row">
                <div class="card-fluid bg-light my-4 col-lg-6 shadow p-3 mx-auto mb-5 bg-white rounded">
                    <h1 class="text-center">Recommand <span class="text-danger">it</span></h1>
                    <hr>
                    <div class="card-body">
                        <form method="post" action="user-login.php" enctype="multipart/form-data" novalidate>
                            <h2 class="text-center mb-3">Déjà un compte ?</h2>
                            <div class="row">
                                <div class="col-lg-8 mx-auto">
                                    <div class="form-group">
                                        <label for="mail">Votre adresse mail</label>
                                        <input type="email" class="form-control" name="mail" id="mail">
                                        <span class="text-danger"><?= ($errors['mail']) ?? '' ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="userPassword">Votre mot de passe</label>
                                        <input type="password" class="form-control" name="userPassword" id="userPassword">
                                        <span class="text-danger"><?= ($errors['login']) ?? '' ?></span>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-danger" id="loginButton">Connexion</button>                                                
                                    </div>
                                    <a href="#" class="d-flex justify-content-center mt-3">mot de passe oublié ?</a>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <h3 class="text-center my-3">Pas de compte ?</h3>
                        <div class="d-flex justify-content-center">
                            <a href="add-user.php" class="btn btn-outline-dark">Créer un compte</a>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <a href="home.php" class="btn btn-dark">retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../Public/assets/js/script.js"></script>
    </body>
</html>
