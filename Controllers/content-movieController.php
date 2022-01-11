<?php

require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/Content.php';

$content = new Content();
$contentsListbyIdMovie = $content->getPosterByMedia(1);

require_once ROOT. '/Views/content-movie.php';