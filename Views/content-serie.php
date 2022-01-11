<?php
require_once ROOT . '/Views/includes/header.php';
?>
<main>
    <div class="container-lg-full container-fluid d-lg-flex flex-lg-row justify-content-center py-5">       
        <div id="myCardCarousels" class="card-fluid bg-light col-lg-8 mb-3">
            <h2 class="text-center display-4 py-2">Catégorie Série TV</h2>
            <hr>
            <div class="card-body">
                <div class="row mx-auto">
                    <div id="cineMultiItem" class="carousel slide carousel-multi-item v-2" data-ride="carousel">
                        <!--Controls-->
                        <div class="mb-3 d-flex justify-content-between">
                            <h2>Séries les plus recommandés</h2>
                            <div class="controls-top d-flex justify-content-end mb-3">
                                <a class="btn btn-dark rounded-circle mr-2" href="#cineMultiItem" data-slide="prev"><i class="fa fa-chevron-left text-light m-auto"></i></a>
                                <a class="btn btn-dark rounded-circle" href="#cineMultiItem" data-slide="next"><i class="fa fa-chevron-right text-light m-auto"></i></a>
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
                                                    <img class="img-fluid" src="assets/img/<?= $contentPartSerie['poster'] ?>" alt="<?= $contentPartSerie['poster'] ?>">
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
            </div>
        </div>
    </div>
</main>
<?php
require_once ROOT . '/Views/includes/footer.php';




