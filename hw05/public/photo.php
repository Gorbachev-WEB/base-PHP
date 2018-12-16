<?php
require $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
require ENGINE_DIR . "/db.php";
require ENGINE_DIR . "/render.php";
require ENGINE_DIR . "/resize.php";
require ENGINE_DIR . "/uploads.php";


$photo = query("SELECT name FROM images where id = " . $_GET['id'] . ";")[0]['name'];
execute("update images set rate = rate + 1 where id = " . $_GET['id'] . ";");

echo render('photo', ['photo' => $photo], 'main');