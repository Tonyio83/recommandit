<?php
require_once ROOT. '/Utils/Database.php';
require_once ROOT . '/Models/Content.php';
require_once ROOT. '/Models/User_Medias.php';
//on redirige si il n'y a pas de session
if (!isset($_SESSION['auth']['login'])){
    header('location: home.php');
    exit();
}
$contentsListbyIdMedias = [];
$content = new Content();
$userMedias = new User_Medias();
//on récupère la session poour définir l'users_id
$userMedias->users_id = $_SESSION['auth']['id'];
//on applique notre fonction
$medias = $userMedias->getMediasById();

require_once ROOT. '/Views/page-user.php';
