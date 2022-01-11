<?php

require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/Content.php';
//on vérifie qu'une session a bien été créer et on redirige
if (isset($_SESSION['auth']['login'])) {
    header('location: page-user.php');
    exit();
}
// on défini la même requête dans plusieurs variables avec des paramètres différents
$content = new Content();
$contentsListbyIdMovie = $content->getPosterByMedia(1);
$contentsListbyIdSerie = $content->getPosterByMedia(2);
$contentsListbyIdMusic = $content->getPosterByMedia(3);
$contentsListbyIdVideogame = $content->getPosterByMedia(4);
$contentsListbyIdBook = $content->getPosterByMedia(5);

require_once ROOT . '/Views/home.php';

