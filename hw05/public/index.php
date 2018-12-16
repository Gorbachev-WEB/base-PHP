<?php
require $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
require ENGINE_DIR . "/db.php";
require ENGINE_DIR . "/render.php";
require ENGINE_DIR . "/resize.php";
require ENGINE_DIR . "/uploads.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    uploadFile(PUBLIC_DIR . '/img/full/', 'image');
    create_thumbnail(PUBLIC_DIR . "/img/full/" . $_FILES['image']['name'], PUBLIC_DIR . "/img/min/" . $_FILES['image']['name'], 100, 100);
    execute("INSERT INTO `images` (name, size) values('" . $_FILES['image']['name'] . "', '" . $_FILES['image']['size'] . "');");
}
$images = array_filter(query('SELECT max(id) as id, name FROM images GROUP BY name;'), function($item){if (is_file(PUBLIC_DIR . '/img/full/' . $item['name']) && (is_file(PUBLIC_DIR . '/img/min/' . $item['name']))){return true;}});
foreach ($images as $key => $image){
    $images[$image['id']] = $image['name'];
    unset($images[$key]);

}
echo '<br>';
echo render('gallery', ['images' => $images], 'main');
