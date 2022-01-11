<?php

require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/Content.php';
require_once ROOT . '/Models/Content_Genres.php';

$contents = new Content();
$contentGenres = new Content_Genres();
$success = false;
//on vérifie que l'utilisateur a bien les droits
if ($_SESSION['auth']['role'] != 1){
    header('location: page-user.php');
    exit();
}
//on vérifie qu'il y a bien un get sinon on redirige
if (empty($_GET['contentId']) || !filter_input(INPUT_GET, 'contentId', FILTER_VALIDATE_INT)) {
    header('location: list-content.php');
    exit();
}
//on défini la colonne contents_id par le get récupéré
$contentGenres->contents_id = $_GET['contentId'];
$idGenres = $contentGenres->getIdGenresByIdContent();
try {
    //on insère dans deux tables
    $contentGenres->db->beginTransaction();
    //on vérifie que le tableau est égale ou supérieur à 1
    if (count($idGenres) >= 1) {
        //si oui on boucle le tableau des id genres
        foreach ($idGenres as $genreId) {
            $contentGenres->genres_id = $genreId['genres_id'];
            //on supprime chaque ligne avec les genres_id récupéré
            $contentGenres->delete();
        }
    }
    //on récupère le get pour l'id du tableau content
    $contents->id = $_GET['contentId'];
    $contents->delete();
    $contents->db->commit();
    $success = true;
    $sleep = 3;
    header('Refresh:' . $sleep . ';http://www.recommandit.com/list-content.php');
} catch (Exception $e) {
    $contents->db->rollBack();
    header('Location: list-content.php');
}
//si il n'y a pas de tableau idgenres on redirige
if (!$idGenres) {
    $message = 'Ce genre n\'existe pas !';
    $sleep = 4;
    header('Refresh:' . $sleep . ';http://www.recommandit.com/list-content.php');
}

require_once ROOT . '/Views/delete-content.php';
