<?php

require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/Content.php';
require_once ROOT . '/Models/Content_Genres.php';
require_once ROOT . '/add-contentValidation.php';
//on vérifie que l'utilisateur a bien les droits sinon on redirige
if ($_SESSION['auth']['role'] != 1){
    header('location: page-user.php');
    exit();
}
//on vérifie qu'il y a bien un get et que c'est bien un nombre sinon on redirige
if (empty($_GET['idContent']) || !filter_input(INPUT_GET, 'idContent', FILTER_VALIDATE_INT)) {
    header('location: infos-content.php');
    exit();
}
if (empty($_GET['media']) || !filter_input(INPUT_GET, 'media', FILTER_VALIDATE_INT)) {
    header('location: infos-content.php');
    exit();
}

$idGenres = $_SESSION['idGenres'];
$contents = new Content();
$contentGenres = new Content_Genres();
$contents->id = filter_input(INPUT_GET, 'idContent', FILTER_SANITIZE_NUMBER_INT);
//si il n'y a pas d'erreurs
if ($isSubmit && count($errors) == 0) {
    $contents->id_medias = $id_media;
    $contentGenres->contents_id = $contents->id;
    //on envoie le tableau en json
    $contents->content = json_encode($content);
    try {
        //on supprime et remplace dans la même table contents_genres
        $contentGenres->db->beginTransaction();
        //si le tableau idGenres n'est pas vide on supprime autant de fois qu'il y a de genres_id défini
        if (count($idGenres) > 0){
            foreach ($idGenres as $idGenre){
               $contentGenres->genres_id = $idGenre; 
               $contentGenres->delete();
            }
        }
        //si le tableau genres n'est pas vide on recrée autant de fois qu'il y a de genres_id défini
        if (count($genresArray) > 0) {
            foreach ($genresArray as $contentGenre) {
                $contentGenres->genres_id = $contentGenre;
                $contentGenres->define();
            }
        }
        //on modifie les données dans la table content
        $contents->updateContent();
        $contents->db->commit();
        $sleep = 5;
        header('Refresh:' . $sleep . ';http://www.recommandit.com/infos-content.php?idContent=' . $contents->id);
        $success = true;
    } catch (Exception $ex) {
        echo 'La modification du contenu a échouée !' . $ex->getMessage();
        die();
    }
}
//si la fonction ne passe pas redirige vers la page infos-content
if (!$contents->getContentById()) {
    header('location: infos-content.php');
}
//on decode le json de la colonne content
$contentList = json_decode($contents->content, true);


require_once ROOT . '/Views/update-content.php';
