<?php

require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/Content.php';

$content = new Content();
$contentsListbyIdSerie = $content->getPosterByMedia(2);

require_once ROOT. '/Views/content-serie.php';

