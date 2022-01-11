<?php

require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/User.php';

$errors = [];
//si le formulaire a bien été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //on fait les vérifications sur le post pour le pseudo
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING));
    if (empty($mail)) {
        $errors['mail'] = 'Veuillez renseigner votre adresse mail';
    } elseif (!filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = 'Votre adresse mail n\'est pas valide';
    }
    //on enlève les espaces sur le password récupéré
    $userPassword = trim($_POST['userPassword']);
    //si il n'y a pas d'erreurs 
    if (count($errors) == 0) {
        $user = new User();
        $user->mail = $mail;
        try {
            //on vérifie que le mot de passe et le pseudo sont bien dans la table et on crée les sessions
            $user->getOne();
            if (password_verify($userPassword, $user->password)) {
                $_SESSION['auth']['login'] = true;
                $_SESSION['auth']['id'] = $user->id;
                $_SESSION['auth']['nickname'] = $user->nickname;
                $_SESSION['auth']['role'] = $user->role_id;
                $_SESSION['auth']['image'] = $user->image;
                header('Location:page-user.php');
                exit();
            } else {
                $errors['login'] = 'L\'identifiant ou le mot de passe est incorrect !';
            }
        } catch (PDOException $ex) {
            $errors['login'] = 'Il y a eu un problème lors de la connexion Ã  votre compte !';
        }
    }
}
require_once ROOT. '/Views/user-login.php';
