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
            <div class="card-fluid bg-light my-5 col-lg-8 shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <div class="mb-5">
                        <h1 class="text-center pb-2">Recommand <span class="text-danger">it</span></h1>
                    </div>
                    <h2 class="text-center my-5">Liste des contenus</h2>
                    <div class="mt-4">
                        <form method="post" action="list-content.php" novalidate>
                            <div class="form-group row justify-content-center">
                                <select class="custom-select custom-select-lg col-md-4 col-7" id="media" name="media">
                                    <option selected>Catégorie</option>
                                    <option value="1">Film</option>
                                    <option value="2">Série TV</option>
                                    <option value="3">Musique</option>
                                    <option value="4">Jeux Vidéo</option>
                                    <option value="5">Livre</option>
                                </select>                     
                                <input type="submit" value="Valider" class="btn ml-2 btn-outline-danger col-md-2 col-4">
                                <span class="text-danger col-8"><?= ($errors['media']) ?? '' ?></span>
                            </div>
                        </form>
                    </div>
                <!--<div class="mt-5">
                        <form method="post" action="#">
                            <div class="form-group row justify-content-center">
                                <input type="text" class="form-control col-5" placeholder="Sélectionnez un titre" name="searchContent">
                                <input type="submit" value="Recherche" class="btn btn-sm btn-outline-danger ml-2 col-md-2 col-4">
                            </div> 
                        </form>
                    </div>-->
                    <?php if (isset($success)): ?>
                        <div class="row justify-content-center">
                            <table class="table table-striped table-bordered col-10">
                                <thead class="thead-danger">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Infos</th>
                                        <th scope="col">Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($contentsList) > 0) {
                                        foreach ($contentsList as $contentId => $contentInfos):
                                            $contentPart = json_decode($contentInfos->content, true);
                                            ?>
                                            <tr>
                                                <td><?= $contentId + 1 ?></td>
                                                <td><?= $contentPart['title'] ?></td>
                                                <td><a href="infos-content.php?idContent=<?= $contentInfos->id ?>" class="btn btn-sm btn-dark" ><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                                                <td class="text-center"><button data-id="<?= $contentInfos->id ?>" class="deleteButton btn btn-sm btn-danger" data-toggle="modal" data-target="#confirmDeleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                    <div class="justify-content-center d-flex mt-5">
                        <a href="add-content.php" class="btn btn-lg btn-danger">Ajouter des contenus</a>
                    </div>
                    <div class="justify-content-center d-flex mt-4">
                        <a href="page-user.php" class="btn btn-sm btn-dark">Retour à l'accueil</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade show" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="my-3 mx-1 text-center">      
                        <p class="lead">Êtes-vous sûr de confirmer la suppression de ce contenu ?</p>
                    </div>
                        <div class="justify-content-center d-flex mb-3 mr-2">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                            <button type="submit" id="confirmDeleteContent" class="btn btn-primary ml-2">Oui</button>
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
