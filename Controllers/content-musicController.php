<?php

require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/Content.php';

$content = new Content();
$contentsListbyIdMusic = $content->getPosterByMedia(3);

require_once ROOT. '/Views/content-music.php';
