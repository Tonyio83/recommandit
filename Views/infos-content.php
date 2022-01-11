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
            <div class="card-fluid bg-light my-5 col-lg-10 shadow mb-5 bg-white rounded">
                <div class="card-body">
                    <div class="mb-5">
                        <h1 class="text-center pb-2">Recommand <span class="text-danger">it</span></h1>
                    </div>
                    <hr>
                    <h2 class="text-center my-4">Infos contenus</h2>
                    <hr>
                    <div class="justify-content-center mt-5">
                        <div class="row mb-2">
                            <img class="img-fluid col-lg-4 py-5" src="../Public/assets/img/<?= $contentInfos['poster'] ?>">
                            <div class="col-lg-8">
                                <h3 class="h1 text-center py-5 font-weight-bold border"><?= $contentInfos['title'] ?></h3>
                                <div class="row">
                                    <p class="lead col-lg-4 font-weight-bold text-lg-right">Date de sortie : </p>
                                    <p class="col-lg-8"><?= date('d/m/Y', strtotime($contentInfos['dateReleased'])) ?></p>
                                </div>
                                <?php
                                if ($contents->id_medias === '1' || $contents->id_medias === '2' || $contents->id_medias === '3') {
                                    ?>
                                    <div class="row">
                                        <p class="lead col-lg-4 font-weight-bold text-lg-right">Nationalité : </p>
                                        <p class="col-lg-8"><?= htmlspecialchars($contentInfos['nationality']) ?></p>
                                    </div>
                                <?php } if ($contents->id_medias === '1') { ?>
                                    <div class="row">
                                        <p class="lead col-lg-4 font-weight-bold text-lg-right">Réalisateur : </p>
                                        <p class="col-lg-8"><?= $contentInfos['director'] ?></p>
                                    </div>
                                <?php } if ($contents->id_medias === '2') { ?>
                                    <div class="row">
                                        <p class="lead col-lg-4 font-weight-bold text-lg-right">Créateur : </p>
                                        <p class="col-lg-8"><?= $contentInfos['creator'] ?></p>
                                    </div>
                                <?php } if ($contents->id_medias === '1' || $contents->id_medias === '2') { ?>
                                    <div class="row">
                                        <p class="lead col-lg-4 font-weight-bold text-lg-right">Acteurs : </p>
                                        <p class="col-lg-8"><?= $contentInfos['cast'] ?></p>
                                    </div>
                                <?php } if ($contents->id_medias === '3') { ?>
                                    <div class="row">
                                        <p class="lead col-lg-4 font-weight-bold text-lg-right">Artiste : </p>
                                        <p class="col-lg-8"><?= $contentInfos['artist'] ?></p>
                                    </div>
                                    <div class="row">
                                        <p class="lead col-lg-4 font-weight-bold text-lg-right">Droits d'Auteur : </p>
                                        <p class="col-lg-8"><?= $contentInfos['copyright'] ?></p>
                                    </div>
                                <?php } if ($contents->id_medias === '4') { ?>
                                    <div class="row">
                                        <p class="lead col-lg-4 font-weight-bold text-lg-right">Developpeur : </p>
                                        <p class="col-lg-8"><?= $contentInfos['developer'] ?></p>
                                    </div>
                                    <div class="row">
                                        <p class="lead col-lg-4 font-weight-bold text-lg-right">Editeur : </p>
                                        <p class="col-lg-8"><?= $contentInfos['editor'] ?></p>
                                    </div>
                                    <div class="row">
                                        <p class="lead col-lg-4 font-weight-bold text-lg-right">Support(s) : </p>
                                        <p class="col-lg-8"><?= $contentInfos['support'] ?></p>
                                    </div>
                                <?php } if ($contents->id_medias === '5') { ?>
                                    <div class="row">
                                        <p class="lead col-lg-4 font-weight-bold text-lg-right">Auteur(s) : </p>
                                        <p class="col-lg-8"><?= $contentInfos['author'] ?></p>
                                    </div>
                                    <div class="row">
                                        <p class="lead col-lg-4 font-weight-bold text-lg-right">Editeur : </p>
                                        <p class="col-lg-8"><?= $contentInfos['editor'] ?></p>
                                    </div>  
                                <?php } ?>
                                <div class="row">
                                    <p class="lead col-lg-4 font-weight-bold text-lg-right">Catégorie : </p>
                                    <p class="col-lg-8"><?= $contents->media ?></p>
                                </div>
                                <div class="row">
                                    <p class="lead col-lg-4 font-weight-bold text-lg-right">Genres : </p>
                                    <p class="col-lg-8">
                                        <?php foreach ($genresByContent as $contentGenre) { ?>
                                            <span><?= $contentGenre->genre ?></span>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <p class="lead font-weight-bold">Synopsis : </p>
                            <p><?= $contentInfos['synopsis'] ?></p>
                        </div>
                        <?php if (!empty($_SESSION['auth']['role']) && $_SESSION['auth']['role'] === '1' ||!empty($_SESSION['auth']['role']) && $_SESSION['auth']['role'] === 1) { ?>
                        <div class="d-flex justify-content-center">
                            <a href="update-content.php?idContent=<?= $contents->id ?>&amp;media=<?= $contents->id_medias ?>" class="btn btn-lg btn-danger">Modifier</a>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <a href="list-content.php" class="btn btn-dark">retour</a>
                        </div>
                        <?php } else { ?>
                        <div class="d-flex justify-content-center">
                            <a href="#" class="btn btn-lg btn-danger">Recommander</a>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <a href="home.php" class="btn btn-dark">retour</a>
                        </div>
                        <?php } ?>
                        
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
