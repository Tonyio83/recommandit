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
        <?php if (isset($success)) { ?>
            <div class="container-fluid row justify-content-center mx-auto">
                <div class="card-fluid bg-light my-5 col-lg-6 shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="mb-5">
                            <h1 class="text-center pb-4">Recommand <span class="text-danger">it</span></h1>
                            <p class="alert alert-success text-center">Votre compte a bien été enregistré !</p>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div id="formContainer" class="container-fluid row mx-auto justify-content-center">
                    <div class="card-fluid bg-light my-5 col-lg-6 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <div class="mb-5">
                                <h1 class="text-center pb-4">Recommand <span class="text-danger">it</span></h1>
                                <p class="h3 text-center">Inscrivez-vous</p>
                            </div>
                            <form method="post" action="" enctype="multipart/form-data" novalidate>
                                <div class="form-group row">
                                    <label for="nickname" class="col-form-label col-lg-4">Pseudo</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="nickname" id="nickname" required>
                                        <span class="text-danger"><?= $errors['nickname'] ?? '' ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastname" class="col-form-label col-lg-4">Nom</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="lastname" id="lastname" required>
                                        <span class="text-danger"><?= $errors['lastname'] ?? '' ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="firstname" class="col-form-label col-lg-4">Prénom</label>

                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="firstname" id="firstname" required>
                                        <span class="text-danger"><?= $errors['firstname'] ?? '' ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="birthdate" class="col-form-label col-lg-4">Date de naissance</label>                                    
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control" name="birthdate" id="birthdate" required>
                                        <span class="text-danger"><?= $errors['birthdate'] ?? '' ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mail" class="col-form-label col-lg-4">Email</label>                                   
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control" name="mail" id="mail" required>
                                        <span class="text-danger"><?= $errors['mail'] ?? '' ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-form-label col-lg-4">Mot de passe</label>                                  
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" name="password" id="password" required>
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

                                <div class="custom-control custom-checkbox mt-3 justify-content-center d-flex">
                                    <input type="checkbox" class="custom-control-input" id="terms" name="terms" <?= (isset($isSubmitted) && !isset($errors['terms'])) ? 'is-valid' : '' ?> <?= (isset($isSubmitted) && isset($errors['terms'])) ? 'is-invalid' : '' ?> required>
                                    <label class="custom-control-label" for="terms">J'ai pris connaissance et accepte la<a href="#" data-toggle="modal" data-target="#privacyPolicyModal"> politique de données personnelles</a>.</label>
                                </div>
                                <span class="text-danger ml-5"><?= $errors['terms'] ?? '' ?></span>                                
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-danger">Envoyer</button>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <a href="home.php" class="btn btn-sm btn-dark">Retour</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="modal fade show" id="privacyPolicyModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="my-3 px-4 text-center">
                            <hr>
                            <h2 class="text-center py-2">Politique de Données personnelles</h2>
                            <hr>
                            <p class="text-left">Nous accordons une grande importance au respect de votre vie privée et avons à cœur de construire avec vous des relations fortes et durables. La protection de vos données personnelles est primordiale à nos yeux. C’est pourquoi, nous mettons à votre disposition notre Politique de protection des données afin de vous informer de la façon la plus claire possible des traitements mis en œuvre dans le cadre de l’utilisation des services du site.</p> 
                            <p class="mt-2 text-left">La présente Politique s’applique ainsi à l’ensemble des services proposés sur le site Internet Recommand it.</p>
                            <p class="mt-2 text-left">Cette politique est soumise au règlement européen concernant la protection des données personnelles.</p>
                            <p class="mt-2 text-left">Au sein de la présente Politique de protection des données, les « Données Personnelles » désignent toute information permettant d’identifier un utilisateur directement ou indirectement notamment, par exemple, en référence à son nom, son adresse email, son adresse IP (ci-après les « Données Personnelles »). Sont exclues des Données Personnelles, les informations anonymisées, c’est-à-dire les données personnelles qui ont fait l’objet d’un traitement approprié pour les rendre non identifiables afin d’empêcher leur identification de manière irréversible.</p>
                            <p class="mt-2 text-left">Nous collectons et traitons notamment vos nom, adresse email, mot de passe, vos actions (recommandations, amis), données de connexion et de navigation ou historique d'achat.</p>
                            <p class="mt-2 text-left">Le caractère obligatoire ou facultatif des données vous est signalé lors de la collecte. Certaines données sont collectées automatiquement du fait de vos actions sur le site.</p>
                            <p class="mt-2 text-left">Nous collectons les informations que vous nous fournissez notamment lorsque vous créez et gérez votre compte Recommand it ou lorsque vous naviguez et faites des actions sur notre site</p>
                            <p class="mt-2 text-left">Les Données Personnelles vous concernant peuvent être recueillies pour les finalités suivantes, selon les services que vous utilisez :</p>
                            <ul class="text-left">
                                <li>Fourniture des servi ces ou des informations que vous demandez</li>
                                <li>Permettre le bon fonctionnement technique et administratif du site</li>
                                <li>Gestion de votre compte utilisateur et des préférences associées</li>
                                <li>Mise à disposition d’outils de partage sur les réseaux sociaux</li>
                                <li>Suggestion de programmes pertinents sur la base de votre historique de recommandations.</li>
                            </ul>
                        </div>
                        <h3 class="text-center">Recommand <span class="text-danger">it</span></h3>
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