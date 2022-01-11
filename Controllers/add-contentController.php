<?php

require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/Content.php';
require_once ROOT . '/Models/Content_Genres.php';
require_once ROOT . '/add-contentValidation.php';
//si l'utilisateur n'est pas admin redirige vers sa page
if ($_SESSION['auth']['role'] != 1){
    header('location: page-user.php');
    exit();
}
//si il y a bien un get, vérifier que c'est bien un int sinon le rediriger
if (isset($_GET['media'])) {
    if (empty($_GET['media']) || !filter_input(INPUT_GET, 'media', FILTER_VALIDATE_INT)) {
        header('location: add-content.php');
        exit();
    }
}
//on vérifie si le formulaire a bien été soumis
if ($isSubmit && count($errors) == 0) {
    //on instancie la classe Content en rentrant 2 paramètres dont l'un sera converti en format JSON
    $addContent = new Content(json_encode($content), $id_media);
    $addGenres = new Content_Genres();
    //on vérifie si la requête est bien passé au niveau de notre base de données
    try {
        //on insère dans deux tables
        $addContent->db->beginTransaction();
        $addContent->addContent();
        //on vérifie que le tableau n'est pas vide
        if (count($genresArray) > 0) {
            //boucle qui permet d'insérer plusieurs dans la table contents_genres
            foreach ($genresArray as $genre) {
                $addGenres->contents_id = $addContent->id;
                $addGenres->genres_id = $genre;
                $addGenres->define();
            }
        }
        $addGenres->db->commit();
        $sleep = 5;
        header('Refresh:' . $sleep . ';http://www.recommandit.com/infos-content.php?idContent=' . $addContent->id);
        $success = true;
        //si la requête n'est pas passé on envoie un message
    } catch (PDOException $ex) {
        echo 'L\'ajout du contenu a échouée !' . $ex->getMessage();
        die();
    }
}
require_once ROOT . '/Views/add-content.php';
