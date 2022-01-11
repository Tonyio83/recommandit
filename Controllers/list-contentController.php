<?php

require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/Content.php';
require_once ROOT . '/Models/Genre.php';

$errors = [];
$isSubmit = false;
//si la session du role est différent de un on redirige
if ($_SESSION['auth']['role'] != 1){
    header('location: page-user.php');
    exit();
}
//si un post a bien été envoyé on fait les vérifications
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isSubmit = true;
    $idMedias = trim(filter_input(INPUT_POST, 'media', FILTER_SANITIZE_NUMBER_INT));
    if (empty($idMedias)) {
        $errors['media'] = 'Veuillez selectionner une catégorie';
    } elseif (!filter_input(INPUT_POST, 'media', FILTER_VALIDATE_INT)) {
        $errors['media'] = 'Votre catégorie n\'existe pas !';
    }
}
//si il a été soumis on applique notre requête
if ($isSubmit && count($errors) == 0) {
    $content = new Content();
    $content->id_medias = $idMedias;
    $contentsList = $content->getAllByMedia();
    $success = true;
}

require_once ROOT . '/Views/list-content.php';
