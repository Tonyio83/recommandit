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
        <div class="container-fluid row justify-content-center">
            <div class="card-fluid bg-light my-5 col-lg-6 shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <div class="mb-5">
                        <h1 class="text-center pb-4">Recommand <span class="text-danger">it</span></h1>
                        <p class="h3 text-center">Insérez du contenu</p>
                    </div>
                    <?php
                    if (isset($success)) {
                        ?>
                        <p class="alert alert-success text-center">Le contenu a bien été enregistré !</p>
                        <?php
                    } else {
                        ?>
                        <form method="post" action="add-content.php?media=<?= $_GET['media'] ?? '' ?>" enctype="multipart/form-data" novalidate>
                            <div class="form-group row justify-content-center">
                                <select class="custom-select custom-select-lg col-lg-7" id="media" name="media">
                                    <option>Choisir une catégorie...</option>
                                    <option value="1" <?= (isset($_GET['media']) && ($_GET['media'] === '1')) ? 'selected' : '' ?>>Film</option>
                                    <option value="2" <?= (isset($_GET['media']) && ($_GET['media'] === '2')) ? 'selected' : '' ?>>Série TV</option>
                                    <option value="3" <?= (isset($_GET['media']) && ($_GET['media'] === '3')) ? 'selected' : '' ?>>Musique</option>
                                    <option value="4" <?= (isset($_GET['media']) && ($_GET['media'] === '4')) ? 'selected' : '' ?>>Jeux Vidéo</option>
                                    <option value="5" <?= (isset($_GET['media']) && ($_GET['media'] === '5')) ? 'selected' : '' ?>>Livre</option>
                                </select>
                                <span class="text-danger col-lg-7"><?= ($errors['media']) ?? '' ?></span>
                            </div>
                            <div id="blocForm">
                                <?php
                                if (isset($_GET['media'])) {
                                    $mediaId = $_GET['media'];
                                    if ($mediaId === '1') {
                                        require_once 'formMovie.php';
                                    }
                                    if ($mediaId === '2') {
                                        require_once 'formSerie.php';
                                    }
                                    if ($mediaId === '3') {
                                        require_once 'formMusic.php';
                                    }
                                    if ($mediaId === '4') {
                                        require_once 'formVideoGame.php';
                                    }
                                    if ($mediaId === '5') {
                                        require_once 'formBook.php';
                                    }
                                }
                                ?>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center mt-3">
                            <a href="list-content.php" class="btn btn-dark">retour</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../Public/assets/js/add-content.js"></script>
        <script src="../Public/assets/js/script.js"></script>
    </body>
</html>
