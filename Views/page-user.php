<?php
require_once ROOT . '/Views/includes/header.php';
?>
<main>
    <div class="container-fluid d-lg-flex flex-lg-row justify-content-center py-5">
        
        <!-- begin of card carousels -->
        <div id="myCardCarousels" class="card-fluid bg-light col-lg-8 mb-3">
            <div class="card-body">
                <h2 class="text-center display-4 mb-5">Vos Catégories Favorites</h2>
                <hr>
                <div class="row mx-auto">
                    <?php
                    foreach ($medias as $media):
                        $content->id_medias = $media['medias_id'];
                        $contentsListbyIdMedias = $content->getAllByMedia();
                        ?>                   
                    <div class="carousel slide carousel-multi-item v-2 pb-4" id="<?= $media['media'] ?>" data-ride="carousel">
                            <!--Controls-->
                            <div class="mb-3 d-flex justify-content-between col-lg-11">
                                <h2><?= $media['media'] ?>s les plus recommandés</h2>
                                <div class="controls-top d-flex justify-content-end mb-3">
                                    <a class="btn btn-dark rounded-circle mr-2" href="#<?= $media['media'] ?>" data-slide="prev"><i class="fa fa-chevron-left text-light m-auto"></i></a>
                                    <a class="btn btn-dark rounded-circle" href="#<?= $media['media'] ?>" data-slide="next"><i class="fa fa-chevron-right text-light m-auto"></i></a>
                                </div>
                            </div>
                            <!--/.Controls-->
                            <div class="carousel-inner v-2" role="listbox">
                                <div class="row">
                                    <?php
                                    foreach ($contentsListbyIdMedias as $contentIdMedia => $contentInfosMedia):
                                        $contentPart = json_decode($contentInfosMedia->content, true);
                                        ?>
                                        <div class="carousel-item <?= ($contentIdMedia === 0) ? 'active' : '' ?>">
                                            <div class="col-6 col-md-4">            
                                                <a href="infos-content.php?idContent=<?= $contentInfosMedia->id ?>" class="btn btn-link">
                                                    <img class="img-fluid" src="assets/img/<?= $contentPart['poster'] ?>" alt="<?= $contentPart['poster'] ?>">
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- end of card carousels -->
        </div>
    </div>
</main>
<!-- end of main -->
<?php
require_once ROOT . '/Views/includes/footer.php';

