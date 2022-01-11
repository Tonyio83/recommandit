<?php
require_once ROOT. '/Utils/Database.php';
require_once ROOT. '/Models/User.php';
require_once ROOT. '/Models/User_Medias.php';
//on verifie qu'une session a bien été créé
if (!isset($_SESSION['auth']['id'])) {
    header('location: home.php');
    exit();
}
$userInfos = new User();
$userInfos->id = $_SESSION['auth']['id'];
//on vérifie si la requête qui affiche les informations de l'utilisateur est bien passé
if (!$userInfos->getOne()) {
    header('location: page-user.php');
}
$userMedias = new User_Medias();
//on défini l'users_id par la session récupéré
$userMedias->users_id = $_SESSION['auth']['id'];
//on affiche les catégories avec l'id de la session
$medias = $userMedias->getMediasById();

require_once ROOT. '/Views/user-infos.php';