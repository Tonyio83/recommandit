<?php

require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/Content.php';
//appel de la classe content
$content = new Content();
//on récupère les images des contenus via l'id_medias
$contentsListbyIdBook = $content->getPosterByMedia(5);

require_once ROOT. '/Views/content-book.php';

