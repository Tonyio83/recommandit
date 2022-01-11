<?php

require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/User.php';
require_once ROOT . '/Models/User_Medias.php';

$users = new User();
$userMedias = new User_Medias();
//on vérifie qu'il y a bien eu un get sinon on redirige
if (empty($_GET['userId']) || !filter_input(INPUT_GET, 'userId', FILTER_VALIDATE_INT)) {
    header('location: user-infos.php');
    exit();
}
//on défini le users_id avec le get récupérer
$userMedias->users_id = $_GET['userId'];
$idMedias = $userMedias->getIdMediasByIdUser();
try {
    $userMedias->db->beginTransaction();
    //on vérifie que le tableau est supérieur ou égale à 1
    if (count($idMedias) >= 1) {
        //on boucle le tableau idMedias
        foreach ($idMedias as $idMedia) {
            //pour chaque medias_id récupéré on supprime les lignes
            $userMedias->medias_id = $idMedia['medias_id'];
            $userMedias->delete();
        }
    }
    //on défini l'id de la table users par le get récupéré
    $users->id = $_GET['userId'];
    $users->delete();
    $users->db->commit();
    // on détruit les sessions récupérés
    $_SESSION['auth'] = [];
    session_destroy();
    $success = true;
    $sleep = 3;
    header('Refresh:' . $sleep . ';http://www.recommandit.com/home.php');
} catch (Exception $e) {
    $users->db->rollBack();
    header('Location: user-infos.php');
}
// si l'idMedias n'existe pas on redirige
if (!$idMedias) {
    $message = 'Ce genre n\'existe pas !';
    $sleep = 4;
    header('Refresh:' . $sleep . ';http://www.recommandit.com/user-infos.php');
}

require_once ROOT . '/Views/delete-content.php';

