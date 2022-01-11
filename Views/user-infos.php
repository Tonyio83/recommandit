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
        <div class="container-fluid row justify-content-center mx-auto">
            <div class="card-fluid bg-light my-5 col-lg-8 shadow mb-5 bg-white rounded">
                <div class="card-body">
                    <div class="mb-5">
                        <h1 class="text-center pb-2">Recommand <span class="text-danger">it</span></h1>
                    </div>
                    <hr>
                    <h2 class="text-center my-4">Mes Informations</h2>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-5">
                            <img class="img-fluid" src="<?= $userInfos->image ?>">
                        </div>
                    </div>
                    <div class="justify-content-center d-flex">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class="font-weight-bold">Pseudo : </span><?= $userInfos->nickname ?></li>
                            <li class="list-group-item"><span class="font-weight-bold">Nom : </span><?= $userInfos->lastname ?></li>
                            <li class="list-group-item"><span class="font-weight-bold">Prénom : </span><?= $userInfos->firstname ?></li>
                            <li class="list-group-item"><span class="font-weight-bold">Date de naissance : </span><?= date('d/m/Y', strtotime($userInfos->birthdate)) ?></li>
                            <li class="list-group-item"><span class="font-weight-bold">Adresse mail : </span><?= $userInfos->mail ?></li>
                            <li class="list-group-item"><span class="font-weight-bold">Date d'inscription : </span><?= date('d/m/Y', strtotime($userInfos->register_at)) ?></li>
                            <li class="list-group-item">
                                <span class="font-weight-bold">Catégories favorites : </span>
                                <?php foreach ($medias as $media) { ?>
                                    <?= $media['media'] ?>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="update-user.php" class="btn btn-lg btn-danger">Modifier</a>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <button data-id="<?= $_SESSION['auth']['id'] ?>" class="btn btn-outline-danger" id="deleteUserButton" data-toggle="modal" data-target="#confirmDeleteUserModal">Supprimer mon compte</button>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="page-user.php" class="btn btn-dark">retour</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade show" id="confirmDeleteUserModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2 class="text-center">Attention</h2>
                    </div>
                    <div class="my-3 mx-1 text-center alert alert-danger text-light">
                        <p class="lead">Cette action supprimera définitivement vos données !</p>
                        <p class="lead">Êtes-vous sûr de vouloir supprimer votre compte ?</p>
                    </div>
                    <div class="justify-content-center d-flex mb-3 mr-2">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                        <button type="submit" id="confirmDeleteUser" class="btn btn-primary ml-2">Oui</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../Public/assets/js/script.js"></script>
    </body>
</html>

