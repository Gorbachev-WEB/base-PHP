<?php


function renderTemplate($template, $params = []){
    ob_start();
    extract($params);
    include TEMPLATES_DIR . "/{$template}.php";
    return ob_get_clean();
}

function render($template, $params = [], $layout = null){
    $content = renderTemplate($template, $params);
    switch ($layout){
        case 'main' :
            $content = renderTemplate('layouts/main', ['content' => $content]);
            break;
    }
    return $content;
}