<?php
require_once ROOT . '/Views/includes/header.php';
?>
<!-- begin of main -->
<main>
    <div class="container-lg-full container-fluid d-lg-flex flex-lg-row justify-content-center py-5">
        <!-- begin of card presentation -->
        <div class="card-fluid text-center bg-light col-lg-4 mb-3 mr-lg-3">
            <div class="card-body">
                <h2 class="mb-5 h1">Venez consulter ou partager des recommandations dans vos domaines favoris !</h2>
                <p class="lead">Partagez vos conseils dans diverses catégories (Cinéma, Série TV, Musique, Jeux Vidéo et Livre) et faites les découvrir à vos amis ou à des personnes partageant les mêmes passions que vous.</p>
                <a  href="add-user.php" class="btn btn-danger mt-4">S'inscrire</a>
            </div>
        </div>
        <!-- end of card presentation -->
        <!-- begin of card carousels -->
        <div id="myCardCarousels" class="card-fluid bg-light col-lg-7 mb-3">
            <div class="card-body">
                <div class="row mx-auto">
                    <div id="cineMultiItem" class="carousel slide carousel-multi-item v-2" data-ride="carousel">
                        <!--Controls-->
                        <div class="mb-3 d-flex justify-content-between col-lg-11">
                            <h2>Films les plus recommandés</h2>
                            <div class="controls-top d-flex justify-content-end mb-3">
                                <a class="btn btn-dark rounded-circle mr-2" href="#cineMultiItem" data-slide="prev"><i class="fa fa-chevron-left text-light m-auto"></i></a>
                                <a class="btn btn-dark rounded-circle" href="#cineMultiItem" data-slide="next"><i class="fa fa-chevron-right text-light m-auto"></i></a>
                            </div>
                        </div>
                        <!--/.Controls-->
                        <div class="carousel-inner v-2" role="listbox">
                            <div class="row">
                                <?php
                                if (count($contentsListbyIdMovie) > 3) {
                                    foreach ($contentsListbyIdMovie as $contentIdMovie => $contentInfosMovie):
                                        $contentPartMovie = json_decode($contentInfosMovie->content, true);
                                        ?>
                                        <div class="carousel-item <?= ($contentIdMovie === 0) ? 'active' : '' ?>">
                                            <div class="col-6 col-md-4">            
                                                <a href="infos-content.php?idContent=<?= $contentInfosMovie->id ?>" class="btn btn-link">
                                                    <img class="img-fluid" src="assets/img/<?= $contentPartMovie['poster'] ?>" alt="<?= $contentPartMovie['poster'] ?>">
                                                </a>
                                            </div>
                                        </div>
                                        <?php
                                    endforeach;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="seriesMultiItem" class="carousel slide carousel-multi-item v-2 mt-5" data-ride="carousel">
                        <!--Controls-->
                        <div class="mb-3 d-flex justify-content-between col-lg-11">
                            <h2>Séries les plus recommandés</h2>
                            <div class="controls-top d-flex justify-content-end mb-3">
                                <a class="btn btn-dark rounded-circle mr-2" href="#seriesMultiItem" data-slide="prev"><i class="fa fa-chevron-left text-light m-auto"></i></a>
                                <a class="btn btn-dark rounded-circle" href="#seriesMultiItem" data-slide="next"><i class="fa fa-chevron-right text-light m-auto"></i></a>
                            </div>
                        </div>
                        <!--/.Controls-->
                        <div class="carousel-inner v-2" role="listbox">
                            <div class="row">
                                <?php
                                if (count($contentsListbyIdSerie) > 3) {
                                    foreach ($contentsListbyIdSerie as $contentIdSerie => $contentInfosSerie):
                                        $contentPartSerie = json_decode($contentInfosSerie->content, true);
                                        ?>
                                        <div class="carousel-item <?= ($contentIdSerie === 0) ? 'active' : '' ?>">
                                            <div class="col-6 col-md-4">
                                                <a href="infos-content.php?idContent=<?= $contentInfosSerie->id ?>" class="btn btn-link">
                                                <img class="img-fluid" src="assets/img/<?= $contentPartSerie['poster'] ?>"
                                                     alt="<?= $contentPartSerie['poster'] ?>">
                                                </a>
                                            </div>
                                        </div>
                                        <?php
                                    endforeach;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="musicMultiItem" class="carousel slide carousel-multi-item v-2 mt-5" data-ride="carousel">
                        <!--Controls-->
                        <div class="mb-3 d-flex justify-content-between col-lg-11">
                            <h2>Musique les plus recommandés</h2>
                            <div class="controls-top d-flex justify-content-end mb-3">
                                <a class="btn btn-dark rounded-circle mr-2" href="#musicMultiItem" data-slide="prev"><i class="fa fa-chevron-left text-light m-auto"></i></a>
                                <a class="btn btn-dark rounded-circle" href="#musicMultiItem" data-slide="next"><i class="fa fa-chevron-right text-light m-auto"></i></a>
                            </div>
                        </div>
                        <!--/.Controls-->
                        <div class="carousel-inner v-2" role="listbox">
                            <div class="row">
                                <?php
                                if (count($contentsListbyIdMusic) > 3) {
                                    foreach ($contentsListbyIdMusic as $contentIdMusic => $contentInfosMusic):
                                        $contentPartMusic = json_decode($contentInfosMusic->content, true);
                                        ?>
                                        <div class="carousel-item <?= ($contentIdMusic === 0) ? 'active' : '' ?>">
                                            <div class="col-6 col-md-4">
                                                <a href="infos-content.php?idContent=<?= $contentInfosMusic->id ?>" class="btn btn-link">
                                                <img class="img-fluid" src="assets/img/<?= $contentPartMusic['poster'] ?>"
                                                     alt="<?= $contentPartMusic['poster'] ?>">
                                                </a>
                                            </div>
                                        </div>
                                        <?php
                                    endforeach;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="videoGameMultiItem" class="carousel slide carousel-multi-item v-2 mt-5" data-ride="carousel">
                        <!--Controls-->
                        <div class="mb-3 d-flex justify-content-between col-lg-11">
                            <h2>Jeux-Vidéo les plus recommandés</h2>
                            <div class="controls-top d-flex justify-content-end mb-3">
                                <a class="btn btn-dark rounded-circle mr-2" href="#videoGameMultiItem" data-slide="prev"><i class="fa fa-chevron-left text-light m-auto"></i></a>
                                <a class="btn btn-dark rounded-circle" href="#videoGameMultiItem" data-slide="next"><i class="fa fa-chevron-right text-light m-auto"></i></a>
                            </div>
                        </div>
                        <!--/.Controls-->
                        <div class="carousel-inner v-2" role="listbox">
                            <div class="row">
                                <?php
                                if (count($contentsListbyIdVideogame) > 3) {
                                    foreach ($contentsListbyIdVideogame as $contentIdVideogame => $contentInfosVideogame):
                                        $contentPartVideogame = json_decode($contentInfosVideogame->content, true);
                                        ?>
                                        <div class="carousel-item <?= ($contentIdVideogame === 0) ? 'active' : '' ?>">
                                            <div class="col-6 col-md-4">
                                                <a href="infos-content.php?idContent=<?= $contentInfosVideogame->id ?>" class="btn btn-link">
                                                <img class="img-fluid" src="assets/img/<?= $contentPartVideogame['poster'] ?>"
                                                     alt="<?= $contentPartVideogame['poster'] ?>">
                                                </a>
                                            </div>
                                        </div>
                                        <?php
                                    endforeach;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="bookMultiItem" class="carousel slide carousel-multi-item v-2 mt-5" data-ride="carousel">
                        <!--Controls-->
                        <div class="mb-3 d-flex justify-content-between col-lg-11">
                            <h2>Livres les plus recommandés</h2>
                            <div class="controls-top d-flex justify-content-end mb-3">
                                <a class="btn btn-dark rounded-circle mr-2" href="#bookMultiItem" data-slide="prev"><i class="fa fa-chevron-left text-light m-auto"></i></a>
                                <a class="btn btn-dark rounded-circle" href="#bookMultiItem" data-slide="next"><i class="fa fa-chevron-right text-light m-auto"></i></a>
                            </div>
                        </div>
                        <!--/.Controls-->
                        <div class="carousel-inner v-2" role="listbox">
                            <div class="row">
                                <?php
                                if (count($contentsListbyIdBook) > 3) {
                                    foreach ($contentsListbyIdBook as $contentIdBook => $contentInfosBook):
                                        $contentPartBook = json_decode($contentInfosBook->content, true);
                                        ?>
                                        <div class="carousel-item <?= ($contentIdBook === 0) ? 'active' : '' ?>">
                                            <div class="col-6 col-md-4">
                                                <a href="infos-content.php?idContent=<?= $contentInfosBook->id ?>" class="btn btn-link">
                                                <img class="img-fluid" src="assets/img/<?= $contentPartBook['poster'] ?>"
                                                     alt="<?= $contentPartBook['poster'] ?>">
                                                </a>
                                            </div>
                                        </div>
                                        <?php
                                    endforeach;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of card carousels -->
            </div>
        </div>
</main>
<!-- end of main -->
<?php
require_once ROOT . '/Views/includes/footer.php';



