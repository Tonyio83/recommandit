<?php

$isSubmit = false;
$nameRegex = '/\w+/';
$nationalityRegex = '/^[A-Za-zéèàçëêùô]?/';
$dateRegex = '/^((?:19|20)[0-9]{2})-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/';
$errors = [];
$content = [];
$genresArray = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isSubmit = true;
    //media control
    $id_media = trim(filter_input(INPUT_POST, 'media', FILTER_SANITIZE_NUMBER_INT));
    if (empty($id_media)) {
        $errors['media'] = 'Veuillez selectionner une catégorie';
    } elseif (!filter_input(INPUT_POST, 'media', FILTER_VALIDATE_INT)) {
        $errors['media'] = 'Votre catégorie n\'existe pas !';
    }
    //title control
    $content['title'] = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    if (empty($content['title'])) {
        $errors['title'] = 'Veuillez renseigner le titre du contenu !';
    } elseif (!preg_match($nameRegex, $content['title'])) {
        $errors['title'] = 'Le titre est invalide !';
    }
    //synopsis control
    $content['synopsis'] = trim(filter_input(INPUT_POST, 'synopsis', FILTER_SANITIZE_STRING));
    if (empty($content['synopsis'])) {
        $errors['synopsis'] = 'Veuillez renseigner le synopsis !';
    }
    if ($id_medias === '1' || $id_medias === '2' || $id_medias === '3') {
        //nationality control
        $content['nationality'] = trim(filter_input(INPUT_POST, 'nationality', FILTER_SANITIZE_STRING));
        if (empty($content['nationality'])) {
            $errors['nationality'] = 'Veuillez renseigner la nationalité !';
        } elseif (!preg_match($nationalityRegex, $content['nationality'])) {
            $errors['nationality'] = 'Veuillez renseigner une nationalité valide !';
        }
    }
    //dateReleased control
    $content['dateReleased'] = trim(filter_input(INPUT_POST, 'dateReleased', FILTER_SANITIZE_STRING));
    if (empty($content['dateReleased'])) {
        $errors['dateReleased'] = 'Veuillez renseigner la date de sortie !';
    } elseif (!preg_match($dateRegex, $content['dateReleased'])) {
        $errors['dateReleased'] = 'Veuillez renseigner une date valide !';
    }
    if ($id_medias === '1' || $id_medias === '2') {
        //cast control
        $content['cast'] = trim(filter_input(INPUT_POST, 'cast', FILTER_SANITIZE_STRING));
        if (empty($content['cast'])) {
            $errors['cast'] = 'Veuillez renseigner ce champ !';
        } elseif (!preg_match($nameRegex, $content['cast'])) {
            $errors['cast'] = 'Ce champ n\'est pas valide !';
        }
    }
    //si la catégorie est musique
    if ($id_medias === '3') {
        //artist control
        $content['artist'] = trim(filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_STRING));
        if (empty($content['artist'])) {
            $errors['artist'] = 'Veuillez renseigner ce champ !';
        } elseif (!preg_match($nameRegex, $content['artist'])) {
            $errors['artist'] = 'Ce champ n\'est pas valide !';
        }
    }
    if ($id_medias === '4' || $id_medias === '5') {
        //editor control
        $content['editor'] = trim(filter_input(INPUT_POST, 'editor', FILTER_SANITIZE_STRING));
        if (empty($content['editor'])) {
            $errors['editor'] = 'Veuillez renseigner ce champ !';
        } elseif (!preg_match($nameRegex, $content['editor'])) {
            $errors['editor'] = 'Ce champ n\'est pas valide !';
        }
    }
    if ($id_medias === '1') {
        //director control
        $content['director'] = trim(filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING));
        if (empty($content['director'])) {
            $errors['director'] = 'Veuillez renseigner ce champ !';
        } elseif (!preg_match($nameRegex, $content['director'])) {
            $errors['director'] = 'Ce champ n\'est pas valide !';
        }
    }
    if ($id_medias === '2') {
        //creator control
        $content['creator'] = trim(filter_input(INPUT_POST, 'creator', FILTER_SANITIZE_STRING));
        if (empty($content['creator'])) {
            $errors['creator'] = 'Veuillez renseigner ce champ !';
        } elseif (!preg_match($nameRegex, $content['creator'])) {
            $errors['creator'] = 'Ce champ n\'est pas valide !';
        }
    }
    //si la catégorie est musique
    if ($id_medias === '3') {
        //copyright control
        $content['copyright'] = trim(filter_input(INPUT_POST, 'copyright', FILTER_SANITIZE_STRING));
        if (empty($content['copyright'])) {
            $errors['copyright'] = 'Veuillez renseigner ce champ !';
        } elseif (!preg_match($nameRegex, $content['copyright'])) {
            $errors['copyright'] = 'Ce champ n\'est pas valide !';
        }
    }
    if ($id_medias === '4') {
        //developer control
        $content['developer'] = trim(filter_input(INPUT_POST, 'developer', FILTER_SANITIZE_STRING));
        if (empty($content['developer'])) {
            $errors['developer'] = 'Veuillez renseigner ce champ !';
        } elseif (!preg_match($nameRegex, $content['developer'])) {
            $errors['developer'] = 'Ce champ n\'est pas valide !';
        }
        //support control
        $content['support'] = trim(filter_input(INPUT_POST, 'support', FILTER_SANITIZE_STRING));
        if (empty($content['support'])) {
            $errors['support'] = 'Veuillez renseigner ce champ !';
        } elseif (!preg_match($nameRegex, $content['support'])) {
            $errors['support'] = 'Ce champ n\'est pas valide !';
        }
    }
    if ($id_medias === '5') {
        //author control
        $content['author'] = trim(filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING));
        if (empty($content['author'])) {
            $errors['author'] = 'Veuillez renseigner ce champ !';
        } elseif (!preg_match($nameRegex, $content['author'])) {
            $errors['author'] = 'Ce champ n\'est pas valide !';
        }
    }
    //poster control
    if (isset($_FILES['poster']) && $_FILES['poster']['error'] == 0) {
        //Verifie si l'extension est autorisée
        $fileInfos = pathinfo($_FILES['poster']['name']);
        $content['poster'] = htmlspecialchars($fileInfos['basename']);
        $fileExtensions = $fileInfos['extension'];
        $authorizedExtensions = ['jpg', 'jpeg', 'png'];
        $fileVerification = in_array($fileExtensions, $authorizedExtensions);
        if (!$fileVerification) {
            $errors['poster'] = 'veuillez envoyer l\'image en format jpg, jpeg ou png !';
        }
    } else {
        $errors['poster'] = 'Veuillez insérer une image !';
    }
    //genre control
    if (isset($_POST['genre']) && count($_POST['genre']) >= 1) {
        foreach ($_POST['genre'] as $genre) {
            $genres = filter_var($genre, FILTER_SANITIZE_NUMBER_INT);
            //on récupère les valeurs dans un tableau
            array_push($genresArray, $genres);
        }
    } elseif (empty($_POST['genre'])) {
        $errors['genre'] = 'Veuillez selectionner un ou plusieurs genres';
    } elseif (!filter_var($_POST['genre'], FILTER_VALIDATE_INT)) {
        $errors['genre'] = 'Votre genre n\'existe pas !';
    }
}
