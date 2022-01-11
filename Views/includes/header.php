<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../assets/css/style.css">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/minty/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
        <title>Recommand it</title>
    </head>
    <body>
        <!-- begin of header -->
        <header>
            <div id="myHeader" class="row d-flex justify-content-between">
                <div class="col-5">
                    <a href="home.php"><h1 class="display-4">Recommand <span class="text-danger">it</span></h1></a>
                </div>
                <div class="d-flex justify-content-end col-7">
                    <?php if (!isset($_SESSION['auth']['login'])) { ?>
                        <div class="row">
                            <div class="col-3 mt-1">
                                <a href="add-user.php" class="btn btn-sm btn-light"><i class="fa fa-plus-circle" aria-hidden="true"></i>S'incricre</a>
                            </div>
                            <div class="col-3 mt-1">
                                <a href="user-login.php" class="btn btn-danger p-2 text-light" role="button" ><i class="fa fa-user" aria-hidden="true"> Connexion</i></a>
                            </div>
                            <div class="col-5 mt-3 pl-5">
                                <button class="btn btn-sm border btn-light"><i class="fa fa-search" aria-hidden="true" data-toggle="modal" data-target="#searchModal"> Recherche</i></button>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class=" row justify-content-end">
                            <div class="col-10 row">
                                <div class="col-4 mt-4">
                                    <button class="btn border btn-lg btn-light"><i class="fa fa-search" aria-hidden="true" data-toggle="modal" data-target="#searchModal"> Recherche</i></button>
                                </div>
                                <div class="btn-group col-8 pb-5 pt-3 pr-5">
                                    <button type="button" class="btn btn-outline-danger btn-sm dropdown-toggle d-flex flex-row" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="col-3 my-auto">
                                            <img class="img-fluid" src="<?= $_SESSION['auth']['image'] ?>"/>
                                        </div>
                                        <div class="col-8 my-auto">
                                            <p class="text-dark"><span class="lead">Bonjour <?= $_SESSION['auth']['nickname'] ?> !</span> <br>Mon compte</p>
                                        </div>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="user-infos.php">Mes Informations</a>
                                        <a class="dropdown-item" href="#">Mes Recommandations</a>
                                        <a class="dropdown-item" href="#">Mes Amis</a>
                                        <?php if ($_SESSION['auth']['role'] === 1 || $_SESSION['auth']['role'] === '1') { ?>
                                            <a class="dropdown-item" href="list-content.php">Admin</a>
                                        <?php } ?>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item btn btn-sm" href="user-logout.php">Deconnexion</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- begin of modal for search bar -->
            <div id="searchModal" class="modal fade bd-modal-xl" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content px-3 pb-4">
                        <div class="justify-content-end mt-1">
                            <button type="button" data-dismiss="modal" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="container-fluid d-flex justify-content-between my-3">
                            <i class="fa fa-search mt-2 mx-1" aria-hidden="true"></i>
                            <input class="form-control form-control-sm mr-1" type="search" placeholder="Recherche..." aria-label="Search">
                            <button type="button" class="btn btn-danger btn-sm">Rechercher</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- begin of modal for user connection -->
            <!--
            <div id="connectModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content px-3 pb-4">
                        <div class="justify-content-end">
                            <button type="button" data-dismiss="modal" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="container-fluid my-1">
                            <form method="post" action="#" enctype="multipart/form-data" novalidate>
                                <h2 class="text-center mb-3">Déjà un compte ?</h2>
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="userNickname">Votre pseudo</label>
                                            <input type="text" class="form-control" name="userNickname" id="userNickname">
                                            <span class="text-danger"><?= ($errors['userNickname']) ?? '' ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="userPassword">Votre mot de passe</label>
                                            <input type="password" class="form-control" name="userPassword" id="userPassword">
                                            <span class="text-danger"><?= ($errors['userPassword']) ?? '' ?></span>
                                        </div>
                                        <div class="mx-auto">
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
                                <a href="add-user.php" class="btn btn-dark">Créer un compte</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            -->
            <!-- end of header -->
            <!-- begin of navbar -->
            <nav id="myNavBar" class="navbar navbar-light justify-content-between mx-5 mt-2">
                <a class="navbar-brand" href="content-movie.php">Film</a>
                <a class="navbar-brand" href="content-serie.php">Série TV</a>
                <a class="navbar-brand" href="content-music.php">Musique</a>
                <a class="navbar-brand" href="content-videogame.php">Jeux Vidéo</a>
                <a class="navbar-brand" href="content-book.php">Livre</a>
            </nav>
            <!-- begin of navbar responsive -->
            <div id="myResponsiveNav">
                <div id="mySidebar" class="sidebar">
                    <h5 class="my-4 ml-2">Recommand <span class="text-danger">it</span></h5>
                    <div id="linkNavSidebar">
                        <a href="javascript:void(0)" class="closebtn">&times;</a>
                        <a href="content-movie.php">Film</a>
                        <a href="content-serie.php">Série TV</a>
                        <a href="content-music.php">Musique</a>
                        <a href="content-videogame.php">Jeux Vidéo</a>
                        <a href="content-book.php">Livre</a>
                    </div>
                    <?php if (!isset($_SESSION['auth']['login'])) { ?>
                        <div class="container-full row mt-5 ml-2">
                            <a href="add-user.php" class="btn btn-light btn-sm col-3 mx-3"><i class="fa fa-plus-circle " aria-hidden="true"></i>S'inscrire</a>
                            <a href="user-login.php" class="btn btn-danger btn-sm col-4"><i class="fa fa-user" aria-hidden="true"></i>Connexion</a>
                        </div>
                    <?php } else { ?>
                        <div class="container-full row mt-5">
                            <div class="btn-group dropup ml-2 px-3 mr-2">
                                <button type="button" class="btn btn-sm btn-outline-danger dropdown-toggle d-flex flex-row" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="col-3 my-auto">
                                        <img class="img-fluid" src="<?= $_SESSION['auth']['image'] ?>"/>
                                    </div>
                                    <div class="col-7 my-auto">
                                        <p class="text-dark"><span class="lead">Bonjour <?= $_SESSION['auth']['nickname'] ?> !</span><br>Mon compte</p>
                                    </div>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item px-1" href="user-infos.php">Mes informations</a>
                                    <a class="dropdown-item px-1" href="#">Mes recommandations</a>
                                    <a class="dropdown-item px-1" href="#">Mes Amis</a>
                                    <?php if ($_SESSION['auth']['role'] === 1) { ?>
                                        <a class="dropdown-item px-1" href="list-content.php">Admin</a>
                                    <?php } ?>
                                    <div class="dropdown-divider"></div>
                                    <button class="dropdown-item px-1" href="#">Deconnexion</button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div id="main" class="container d-flex flex-row justify-content-between text-center">
                    <button class="openbtn col-1">&#9776;</button>
                    <h4 class="col-10 ml-2 mt-1">Recommand <span class="text-danger">it</span></h4>
                    <button class="btn col-2"><i class="fa fa-search text-dark" aria-hidden="true" data-toggle="modal" data-target="#searchModal"></i></button>
                </div>
            </div>
            <!-- end of navbar responsive -->
        </header>