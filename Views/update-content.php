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
            <div class="card-fluid bg-light my-5 col-lg-6 shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <div class="mb-5">
                        <h1 class="text-center pb-4">Recommand <span class="text-danger">it</span></h1>
                        <?php if (isset($success)) { ?>
                            <p class="alert alert-success text-center lead">La modification du contenu a bien été enregistré !</p>
                        <?php } else { ?>
                            <p class="h3 text-center">Modifier le contenu</p>
                        </div>
                        <form method="post" action="update-content.php?idContent=<?= $contents->id ?>&amp;media=<?= $contents->id_medias ?>" enctype="multipart/form-data" novalidate>
                            <div class="form-group row justify-content-center">
                                <select class="custom-select custom-select-lg col-lg-7" id="media" name="media">
                                    <option>Choisir...</option>
                                    <option value="1"<?= (isset($contents->id_medias) && ($contents->id_medias === '1')) ? 'selected' : '' ?>>Film</option>
                                    <option value="2"<?= (isset($contents->id_medias) && ($contents->id_medias === '2')) ? 'selected' : '' ?>>Série TV</option>
                                    <option value="3"<?= (isset($contents->id_medias) && ($contents->id_medias === '3')) ? 'selected' : '' ?>>Musique</option>
                                    <option value="4"<?= (isset($contents->id_medias) && ($contents->id_medias === '4')) ? 'selected' : '' ?>>Jeux Vidéo</option>
                                    <option value="5"<?= (isset($contents->id_medias) && ($contents->id_medias === '5')) ? 'selected' : '' ?>>Livre</option>
                                </select>
                                <span class="text-danger col-lg-7"><?= ($errors['media']) ?? '' ?></span>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-form-label col-lg-2">Titre</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control"  value="<?= $contentList['title'] ?>" name="title" id="title">
                                    <span class="text-danger"><?= ($errors['title']) ?? '' ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="synopsis" class="col-form-label col-lg-2">Synopsis</label>
                                <div class="col-lg-8">
                                    <textarea class="form-control" name="synopsis" id="synopsis"><?= $contentList['synopsis'] ?></textarea>
                                    <span class="text-danger"><?= ($errors['synopsis']) ?? '' ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dateReleased" class="col-form-label col-lg-2">Date de sortie</label>
                                <div class="col-lg-6">
                                    <input type="date" class="form-control" value="<?= $contentList['dateReleased'] ?>" name="dateReleased" id="dateReleased">
                                    <span class="text-danger"><?= ($errors['dateReleased']) ?? '' ?></span>
                                </div>
                            </div>
                            <?php if ($contents->id_medias === '1' || $contents->id_medias === '2') { ?>
                                <div class="form-group row">
                                    <label for="cast" class="col-form-label col-lg-2">Acteurs</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?= $contentList['cast'] ?>" name="cast" id="cast" >
                                        <span class="text-danger"><?= ($errors['cast']) ?? '' ?></span>
                                    </div>
                                </div>
                            <?php } if ($contents->id_medias === '3') { ?>
                                <div class="form-group row">
                                    <label for="artist" class="col-form-label col-lg-2">Artiste</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?= $contentList['artist'] ?>" name="artist" id="artist" >
                                        <span class="text-danger"><?= ($errors['artist']) ?? '' ?></span>
                                    </div>
                                </div>
                            <?php } if ($contents->id_medias === '4') { ?>
                                <div class="form-group row">
                                    <label for="developer" class="col-form-label col-lg-2">Developpeur</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?= $contentList['developer'] ?>" name="developer" id="developer" >
                                        <span class="text-danger"><?= ($errors['developer']) ?? '' ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="support" class="col-form-label col-lg-2">Support(s)</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="support" id="support" value="<?= $contentList['support'] ?>">
                                        <span class="text-danger"><?= ($errors['support']) ?? '' ?></span>
                                    </div>
                                </div>
                            <?php } if ($contents->id_medias === '5') { ?>
                                <div class="form-group row">
                                    <label for="author" class="col-form-label col-lg-2">Auteur(s)</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?= $contentList['author'] ?>" name="author" id="author" >
                                        <span class="text-danger"><?= ($errors['author']) ?? '' ?></span>
                                    </div>
                                </div>
                            <?php } if ($contents->id_medias === '1' || $contents->id_medias === '2' || $contents->id_medias === '3') { ?>
                                <div class="form-group row">
                                    <label for="nationality" class="col-form-label col-lg-2">Nationalité</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="nationality" value="<?= $contentList['nationality'] ?>" id="nationality">
                                        <span class="text-danger"><?= ($errors['nationality']) ?? '' ?></span>
                                    </div>
                                </div>
                            <?php } if ($contents->id_medias === '1') { ?>
                                <div class="form-group row">
                                    <label for="director" class="col-form-label col-lg-2">Réalisateur</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" value="<?= $contentList['director'] ?>" name="director" id="director">
                                        <span class="text-danger"><?= ($errors['director']) ?? '' ?></span>
                                    </div>
                                </div>
                            <?php } if ($contents->id_medias === '2') { ?>
                                <div class="form-group row">
                                    <label for="director" class="col-form-label col-lg-2">Créateur</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" value="<?= $contentList['creator'] ?>" name="creator" id="creator">
                                        <span class="text-danger"><?= ($errors['creator']) ?? '' ?></span>
                                    </div>
                                </div>
                            <?php } if ($contents->id_medias === '3') { ?>
                                <div class="form-group row">
                                    <label for="copyright" class="col-form-label col-lg-2">Droits d'auteur</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" value="<?= $contentList['copyright'] ?>" name="copyright" id="copyright">
                                        <span class="text-danger"><?= ($errors['copyright']) ?? '' ?></span>
                                    </div>
                                </div>
                            <?php } if ($contents->id_medias === '4' || $contents->id_medias === '5') { ?>
                                <div class="form-group row">
                                    <label for="editor" class="col-form-label col-lg-2">Editeur</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" value="<?= $contentList['editor'] ?>" name="editor" id="editor">
                                        <span class="text-danger"><?= ($errors['editor']) ?? '' ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="form-group row">
                                <label for="poster" class="col-form-label col-lg-2">Image</label>
                                <div class="col-lg-8">
                                    <input type="file" class="form-control-file" value="<?= $contentList['poster'] ?>" id="poster" name="poster">
                                    <span class="text-danger"><?= ($errors['poster']) ?? '' ?></span>
                                </div>
                            </div>
                            <fieldset class="form-group row ml-lg-5">
                                <legend class="col-form-label">Genres</legend>
                                <?php if ($contents->id_medias === '1' || $contents->id_medias === '2' || $contents->id_medias === '4') { ?>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="action" value="1">
                                        <label class="form-check-label" for="action">
                                            Action
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="adventure" value="2">
                                        <label class="form-check-label" for="adventure">
                                            Aventure
                                        </label>
                                    </div>
                                <?php } if ($contents->id_medias === '1' || $contents->id_medias === '2') { ?>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="horror" value="3">
                                        <label class="form-check-label" for="horror">
                                            Horreur
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="drama" value="4">
                                        <label class="form-check-label" for="drama">
                                            Drame
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="fantastic" value="5">
                                        <label class="form-check-label" for="fantastic">
                                            Fantastique
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="comedy" value="6">
                                        <label class="form-check-label" for="comedy">
                                            Comédie
                                        </label>
                                    </div>
                                <?php } if ($contents->id_medias === '4') { ?>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="survivalHorror" value="38">
                                        <label class="form-check-label" for="survivalHorror">
                                            Survival-Horror
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="fighting" value="39">
                                        <label class="form-check-label" for="fighting">
                                            Combat
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="fps" value="40">
                                        <label class="form-check-label" for="fps">
                                            FPS
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="moba" value="41">
                                        <label class="form-check-label" for="moba">
                                            MOBA
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="mmo" value="42">
                                        <label class="form-check-label" for="mmo">
                                            MMO
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="rpg" value="43">
                                        <label class="form-check-label" for="rpg">
                                            RPG
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="platform" value="44">
                                        <label class="form-check-label" for="platform">
                                            Plateforme
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="cardsGame" value="45">
                                        <label class="form-check-label" for="cardsGame">
                                            Cartes
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="strategy" value="46">
                                        <label class="form-check-label" for="strategy">
                                            Stratégie
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="sport" value="47">
                                        <label class="form-check-label" for="sport">
                                            Sport
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="racingGames" value="48">
                                        <label class="form-check-label" for="racingGames">
                                            Courses
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="simulation" value="49">
                                        <label class="form-check-label" for="simulation">
                                            Simulation
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="hacknslash" value="50">
                                        <label class="form-check-label" for="hacknslash">
                                            Hack'n'Slash
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="multiplayer" value="51">
                                        <label class="form-check-label" for="multiplayer">
                                            Multijoueur
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="indy" value="52">
                                        <label class="form-check-label" for="indy">
                                            Indé
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="mobile" value="53">
                                        <label class="form-check-label" for="TPS">
                                            TPS
                                        </label>
                                    </div>
                                <?php } if ($contents->id_medias === '5') { ?>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="novel" value="54">
                                        <label class="form-check-label" for="novel">
                                            Roman
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="frenchComics" value="55">
                                        <label class="form-check-label" for="frenchComics">
                                            Franco-Belge
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="manga" value="56">
                                        <label class="form-check-label" for="manga">
                                            Manga
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="comics" value="57">
                                        <label class="form-check-label" for="comics">
                                            Comics
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="graphicNovel" value="58">
                                        <label class="form-check-label" for="graphicNovel">
                                            Roman Graphique
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="blackNovel" value="59">
                                        <label class="form-check-label" for="blackNovel">
                                            Roman Noir
                                        </label>
                                    </div>
                                <?php } if ($contents->id_medias === '1' || $contents->id_medias === '2' || $contents->id_medias === '5') { ?>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="thriller" value="7">
                                        <label class="form-check-label" for="thriller">
                                            Thriller
                                        </label>
                                    </div>
                                <?php } if ($contents->id_medias === '5') { ?>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="loveNovel" value="60">
                                        <label class="form-check-label" for="loveNovel">
                                            Roman d'amour
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="cyberpunk" value="15">
                                        <label class="form-check-label" for="cyberpunk">
                                            Cyberpunk
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="steampunk" value="61">
                                        <label class="form-check-label" for="steampunk">
                                            Steampunk
                                        </label>
                                    </div>
                                <?php } if ($contents->id_medias === '1' || $contents->id_medias === '2') { ?>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="animation" value="8">
                                        <label class="form-check-label" for="animation">
                                            Animation
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="sciencefiction" value="9">
                                        <label class="form-check-label" for="sciencefiction">
                                            Science-Fiction
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="romantic" value="10">
                                        <label class="form-check-label" for="romantic">
                                            Comédie Romantique
                                        </label>
                                    </div>
                                <?php } if ($contents->id_medias === '1' || $contents->id_medias === '2' || $contents->id_medias === '5') { ?>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="anticipation" value="11">
                                        <label class="form-check-label" for="anticipation">
                                            Anticipation
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="western" value="12">
                                        <label class="form-check-label" for="western">
                                            Western
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="history" value="13">
                                        <label class="form-check-label" for="history">
                                            Histoire
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="fantasy" value="14">
                                        <label class="form-check-label" for="fantasy">
                                            Fantasy
                                        </label>
                                    </div>
                                <?php } if ($contents->id_medias === '3') { ?>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="variety" value="20">
                                        <label class="form-check-label" for="variety">
                                            Variété Française
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="rock" value="21">
                                        <label class="form-check-label" for="rock">
                                            Rock
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="rap" value="22">
                                        <label class="form-check-label" for="rap">
                                            Rap
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="electro" value="23">
                                        <label class="form-check-label" for="electro">
                                            Electro
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="pop" value="24">
                                        <label class="form-check-label" for="pop">
                                            Pop
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="reggae" value="25">
                                        <label class="form-check-label" for="reggae">
                                            Reggae
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="soul" value="26">
                                        <label class="form-check-label" for="soul">
                                            Soul
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="classic" value="27">
                                        <label class="form-check-label" for="classic">
                                            Classique
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="rnb" value="28">
                                        <label class="form-check-label" for="rnb">
                                            R'n'B
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="latino" value="29">
                                        <label class="form-check-label" for="latino">
                                            Latine
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="metal" value="30">
                                        <label class="form-check-label" for="metal">
                                            Metal
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="funk" value="31">
                                        <label class="form-check-label" for="funk">
                                            Funk
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="disco" value="32">
                                        <label class="form-check-label" for="disco">
                                            Disco
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="blues" value="33">
                                        <label class="form-check-label" for="blues">
                                            Blues
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="country" value="34">
                                        <label class="form-check-label" for="country">
                                            Country
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="k-pop" value="35">
                                        <label class="form-check-label" for="k-pop">
                                            K-pop
                                        </label>
                                    </div>
                                    <div class="form-check col-5 ml-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="raï" value="36">
                                        <label class="form-check-label" for="raï">
                                            Raï
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="checkbox" name="genre[]" id="musical" value="37">
                                        <label class="form-check-label" for="musical">
                                            Comédie Musicale
                                        </label>
                                    </div>
                                <?php } ?>
                                <span class="text-danger"><?= ($errors['genre']) ?? '' ?></span>
                            </fieldset>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-danger">Envoyer</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center mt-3">
                            <a href="http://www.recommandit.com/infos-content.php?idContent=<?= $contents->id ?>" class="btn btn-dark">Retour</a>
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
