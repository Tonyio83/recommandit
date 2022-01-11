<?php

require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/Content.php';

$content = new Content();
$contentsListbyIdVideogame = $content->getPosterByMedia(4);

require_once ROOT. '/Views/content-videogame.php';
