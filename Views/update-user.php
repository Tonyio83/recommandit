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
        <div id="formContainer" class="container-fluid row mx-auto justify-content-center">
            <div class="card-fluid bg-light my-5 col-lg-6 shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <div class="mb-5">
                        <?php if (isset($success)) { ?>
                            <h1 class="text-center pb-4">Recommand <span class="text-danger">it</span></h1>
                            <p class="alert alert-success text-center lead">Vos modifications ont bien été enregistré !</p>
                        <?php } else { ?>
                            <p class="h3 text-center">Modifier vos Informations</p>
                        </div>
                    <?php if (!isset($_GET['idUser']) || !filter_input(INPUT_GET, 'idUser', FILTER_VALIDATE_INT) || $_GET['idUser'] != $_SESSION['auth']['id']) { ?>
                        <form method="post" action="update-user.php" enctype="multipart/form-data" novalidate>                            
                                <div class="form-group row">
                                    <label for="nickname" class="col-form-label col-lg-4">Pseudo</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="nickname" id="nickname" value="<?= $userInfos->nickname ?>" required>
                                        <span class="text-danger"><?= $errors['nickname'] ?? '' ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastname" class="col-form-label col-lg-4">Nom</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?= $userInfos->lastname ?>" required>
                                        <span class="text-danger"><?= $errors['lastname'] ?? '' ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="firstname" class="col-form-label col-lg-4">Prénom</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="firstname" id="firstname" value="<?= $userInfos->firstname ?>" required>
                                        <span class="text-danger"><?= $errors['firstname'] ?? '' ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="birthdate" class="col-form-label col-lg-4">Date de naissance</label>
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control" name="birthdate" id="age" value="<?= $userInfos->birthdate ?>" required>
                                        <span class="text-danger"><?= $errors['birthdate'] ?? '' ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mail" class="col-form-label col-lg-4">Email</label>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control" name="mail" id="mail" value="<?= $userInfos->mail ?>" required>
                                        <span class="text-danger text-center"><?= $errors['mail'] ?? '' ?></span>
                                    </div>
                                </div>
                                <fieldset class="form-group row ml-lg-5">
                                    <legend class="col-form-label">Catégories Favorites</legend>
                                    <div class="form-check col-lg-5 ml-lg-5">
                                        <input class="form-check-input" type="checkbox" name="favoriteCategory[]" id="movie" value="1">
                                        <label class="form-check-label" for="movie">
                                            Cinéma
                                        </label>
                                    </div>
                                    <div class="form-check col-lg-5">
                                        <input class="form-check-input" type="checkbox" name="favoriteCategory[]" id="serie" value="2">
                                        <label class="form-check-label" for="serie">
                                            Séries TV
                                        </label>
                                    </div>
                                    <div class="form-check col-lg-5 ml-lg-5">
                                        <input class="form-check-input" type="checkbox" name="favoriteCategory[]" id="music" value="3">
                                        <label class="form-check-label" for="music">
                                            Musique
                                        </label>
                                    </div>
                                    <div class="form-check col-lg-5">
                                        <input class="form-check-input" type="checkbox" name="favoriteCategory[]" id="videoGame" value="4">
                                        <label class="form-check-label" for="videoGame">
                                            Jeux Vidéo
                                        </label>
                                    </div>
                                    <div class="form-check col-lg-5 ml-lg-5">
                                        <input class="form-check-input" type="checkbox" name="favoriteCategory[]" id="book" value="5">
                                        <label class="form-check-label" for="book">
                                            Livre
                                        </label>
                                    </div>
                                    <span class="text-danger"><?= $errors['favoriteCategory'] ?? '' ?></span>
                                </fieldset>
                            <?php } else { ?>
                            <form method="post" action="update-user.php?idUser=<?= $_SESSION['auth']['id'] ?>" enctype="multipart/form-data" novalidate>
                                <div class="form-group row">
                                    <label for="password" class="col-form-label col-lg-4">Mot de passe</label>
                                    <div class="col-lg-6">
                                        <input  type="password" class="form-control" name="password" id="password" required>
                                        <span class="text-danger"><?= $errors['password'] ?? '' ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="confirmPassword" class="col-form-label col-lg-4">Confirmer mot de passe</label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
                                        <span class="text-danger"><?= $errors['confirmPassword'] ?? '' ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-danger">Envoyer les modifications</button>
                            </div>
                        </form>
                    <?php if (!isset($_GET['idUser']) || !filter_input(INPUT_GET, 'idUser', FILTER_VALIDATE_INT) || $_GET['idUser'] != $_SESSION['auth']['id']) { ?>
                        <div class="d-flex justify-content-center mt-3">
                            <a href="update-user.php?idUser=<?= $userInfos->id ?>" class="btn btn-outline-dark">Modifier votre mot de passe</a>
                        </div>
                    <?php } ?>
                        <div class="d-flex justify-content-center mt-3">
                            <a href="user-infos.php" class="btn btn-sm btn-dark">retour</a>
                        </div>
                    <?php } ?>
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

