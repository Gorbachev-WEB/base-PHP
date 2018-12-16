<?php
require $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
require ENGINE_DIR . "/db.php";
require ENGINE_DIR . "/render.php";
require ENGINE_DIR . "/resize.php";
require ENGINE_DIR . "/uploads.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $arg1 = (int) $_POST['arg1'];
    $arg2 = (int) $_POST['arg2'];;
    $option = $_POST['option'];;
    switch ($option){
        case "Вычесть":
            $res = $arg1 - $arg2;
            break;
        case "Умножить":
            $res = $arg1 * $arg2;
            break;
        case "Разделить":
            if ($arg2 == 0){
                $res = 'бесконечность';
                break;
            }
            $res = $arg1 / $arg2;
            break;
        default:
            $res = $arg1 + $arg2;
    }
    if (!$res){
        $res = 'не получился';
    }
}
?>
<form action="" method="post">
    <input name="arg1" "text">
    <input name="arg2" type="text">
    <input type="submit" name="option" value="Сложить">
    <input type="submit" name="option" value="Вычесть">
    <input type="submit" name="option" value="Умножить">
    <input type="submit" name="option" value="Разделить">
    <?php if($res) echo "Результат: $res."?>
</form>
