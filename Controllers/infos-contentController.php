<?php
require_once ROOT. '/Utils/Database.php';
require_once ROOT. '/Models/Content.php';
require_once ROOT. '/Models/Genre.php';

//on vérifie si il y a un get dans l'url et si c'est un nombre sinon on l' envoi sur la page liste
if (empty($_GET['idContent']) || !filter_input(INPUT_GET, 'idContent', FILTER_VALIDATE_INT)) {
    header('location: list-content.php');
    exit();
}
$contents = new Content();
$contents->id = filter_input(INPUT_GET, 'idContent', FILTER_SANITIZE_NUMBER_INT);
 
if ($_GET['idContent'] != $contents->id) {
    header('location: list-content.php');
    exit();
}
//on vérifie si la requête est bien passé
if (!$contents->getContentById()) {
    header('location: infos-content.php');
}
// on décode le JSON en tableau associatif
$contentInfos = json_decode($contents->content, true);
$genre = new Genre();
$genresByContent = $genre->getGenresByContent($contents->id);
//on boucle le tableau des idgenres
foreach ($genresByContent as $idGenre) {
    //on les récupère dans un tableau
    $array[] = $idGenre->genres_id;
}
//on l'intègre dans une session
$_SESSION['idGenres'] = $array;
require_once ROOT. '/Views/infos-content.php';

