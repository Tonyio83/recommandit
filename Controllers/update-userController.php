<?php

require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/User.php';
require_once ROOT . '/Models/User_Medias.php';
require_once ROOT . '/update-userValidation.php';
//on vérifie que l'utilisateur a bien les droits grâce à la session
if (empty($_SESSION['auth']['id'])) {
    header('location: home.php');
    exit();
}
//on vérifie que le mail n'existe pas dans la table
if (isset($_POST['checkmail'])) {
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING));
    if (filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL)) {
        $user = new User();
        $user->mail = $mail;
        if ($user->checkEmail()) {
            exit('notOk');
        }
        exit('ok');
    }
}
$userInfos = new User();
$user_medias = new User_Medias();
//on défini l'id de l'utilisateur par la session créé lors de la connexion
$userInfos->id = $_SESSION['auth']['id'];
//si le formulaire est bien soumis on défini les lignes qu'on veut modifier avec les variables des posts récupérées
if ($isSubmitted && count($errors) == 0) {
    if (!isset($_GET['idUser'])) {
        $userInfos->nickname = $nickname;
        $userInfos->lastname = $lastname;
        $userInfos->firstname = $firstname;
        $userInfos->birthdate = $birthdate;
        $userInfos->mail = $mail;
        $user_medias->users_id = $userInfos->id;
        $medias = $user_medias->getMediasById();
    }   
    try {
        //si il y a un get de l'idUser on modifie le mot de passe crypté
        if (isset($_GET['idUser'])) {
            $userInfos->password = password_hash($password, PASSWORD_BCRYPT);
            $userInfos->updateUserPassword();
            //sinon on utilise deux fonctions
        } else {
            //on supprime les données autant de fois qu'il y a de medias_id défini
            $user_medias->db->beginTransaction();
            if (count($medias) > 0) {
                foreach ($medias as $media) {
                    $user_medias->medias_id = $media['medias_id'];
                    $user_medias->delete();
                }
            }
            //on modifie les données autant de fois qu'il y a de medias_id défini
            if (count($favoriteCategoryArray) > 0) {
                foreach ($favoriteCategoryArray as $user_media) {
                    $user_medias->medias_id = $user_media;
                    $user_medias->define();
                }
            }
            //on modifie les données récupéré dans la table users
            $userInfos->updateUserInfos();
            $userInfos->db->commit();
        }
        $sleep = 5;
        header('Refresh:' . $sleep . ';http://www.recommandit.com/user-infos.php');
        $success = true;
    } catch (Exception $ex) {
        echo 'La modification du contenu a échouée !' . $ex->getMessage();
        die();
    }
}
//on vérifie si la requête est bien passé sinon on redirige
if (!$userInfos->getOne()) {
    header('location: page-user.php');
}
require_once ROOT . '/Views/update-user.php';
