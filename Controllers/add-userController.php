<?php

require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/User.php';
require_once ROOT . '/Models/User_Medias.php';
require_once ROOT . '/add-userValidation.php';
//on défini une image par défaut pour l'utilisateur
$image = '../assets/img/default_profile.png';
//on vérifie qu'on récupère un post et on vérifie qu'il n'existe pas dèjà dans la table users
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
//on vérifie si le formulaire a bien été soumis
if ($isSubmitted && count($errors) == 0) {
    //on instancie la classe Content en rentrant 2 paramètres dont l'un sera converti en format JSON
    $user = new User($nickname, $lastname, $firstname, $birthdate, $image, $mail, password_hash($password, PASSWORD_BCRYPT));
    $user_medias = new User_Medias();
    //on vérifie si la requête est bien passé au niveau de notre base de données
    try {
        //on insère dans deux tables
        $user->db->beginTransaction();
        $user->create();
        //on vérifie que le tableau récupéré n'est pas vide
        if (count($favoriteCategoryArray) > 0) {
            //boucle permettant d'insérer dans la table tous les id catégories dans la table users_medias
            foreach ($favoriteCategoryArray as $user_media) {
                $user_medias->users_id = $user->id;
                $user_medias->medias_id = $user_media;
                $user_medias->define();
            }
        }
        $user_medias->db->commit();
        $success = true;
        $sleep = 3;
        header('Refresh:' . $sleep . ';http://www.recommandit.com/page-user.php');
        // on récupère les données récupérées dans des sessions
        $_SESSION['auth']['login'] = true;
        $_SESSION['auth']['id'] = $user->id;
        $_SESSION['auth']['nickname'] = $user->nickname;
        $_SESSION['auth']['image'] = $user->image;
        $_SESSION['auth']['role'] = $user->role_id;
    } catch (PDOException $ex) {
        echo 'L\'ajout du contenu a échouée !' . $ex->getMessage();
        die();
    }
}
require_once ROOT . '/Views/add-user.php';
