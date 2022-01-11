<?php

$isSubmitted = false;
//regex for form control
$regexNickname = '/^[A-Za-zéÉ][A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ0-9]+((-|_|\.| )[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ0-9]+)?$/';
$regexName = '/^[A-Za-zéÉ][A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+((-| )[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+)?$/';
$passwordRegex = '/^(?=.*[\d])(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*])?[\w!@#$%^&*]{8,}$/';
$dateRegex = '/^((?:19|20)[0-9]{2})-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/';

$favoriteCategoryArray = [];
$errors = [];
//condition on form validation
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isSubmitted = true;
    if (!isset($_GET['idUser']) || !filter_input(INPUT_GET, 'idUser', FILTER_VALIDATE_INT) || $_GET['idUser'] != $_SESSION['auth']['id']) {
        //nickname control
        $nickname = trim(filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_STRING));
        if (empty($nickname)) {
            $errors['nickname'] = 'Veuillez renseigner votre pseudo';
        } elseif (!preg_match($regexNickname, $nickname)) {
            $errors['nickname'] = 'Votre pseudo n\'est pas valide';
        }
        //lastname control
        $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING));
        if (empty($lastname)) {
            $errors['lastname'] = 'Veuillez renseigner votre nom';
        } elseif (!preg_match($regexName, $lastname)) {
            $errors['lastname'] = 'Votre nom contient des caractères non autorisés !';
        }
        //firstname control
        $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING));
        if (empty($firstname)) {
            $errors['firstname'] = 'Veuillez renseigner votre prénom';
        } elseif (!preg_match($regexName, $firstname)) {
            $errors['firstname'] = 'Votre prénom contient des caractères non autorisés !';
        }
        //birthdate control
        $birthdate = trim(filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_NUMBER_INT));
        if (empty($birthdate)) {
            $errors['birthdate'] = 'Veuillez renseigner votre date de naissance.';
        } elseif (!preg_match($dateRegex, $birthdate)) {
            $errors['birthdate'] = 'Votre date de naissance n\'est pas valide !';
        }
        //verification email
        $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING));
        if (empty($mail)) {
            $errors['mail'] = 'Veuillez renseigner votre email';
        } elseif (!filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = 'Le mail est invalide !';
        }
        //favorite category control
        if (isset($_POST['favoriteCategory']) && count($_POST['favoriteCategory']) >= 1) {
            foreach ($_POST['favoriteCategory'] as $favoriteCategory) {
                $favoriteCategories = filter_var($favoriteCategory, FILTER_SANITIZE_NUMBER_INT);
                array_push($favoriteCategoryArray, $favoriteCategories);
            }
        } elseif (empty($_POST['favoriteCategory'])) {
            $errors['favoriteCategory'] = 'Veuillez selectionner une ou plusieurs categories';
        } elseif (!filter_var($_POST['favoriteCategory'], FILTER_VALIDATE_INT)) {
            $errors['favoriteCategory'] = 'Votre catégorie n\'existe pas !';
        }
    } else {
        //password control
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        if (empty($password)) {
            $errors['password'] = 'Veuillez renseigner votre mot de passe';
        } elseif (!preg_match($passwordRegex, $password)) {
            $errors['password'] = 'Votre mot de passe doit contenir au moins une majuscule, un caractère spécial et minimum 8 caractères';
        }
        //confirm password control
        $confirmPassword = trim(filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_STRING));
        if (empty($confirmPassword)) {
            $errors['confirmPassword'] = 'Veuillez confirmer votre mot de passe';
        } elseif ($password != $confirmPassword) {
            $errors['confirmPassword'] = 'Votre mot de passe est différent';
        }
    }
}

