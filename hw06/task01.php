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
        case "dif":
            $res = $arg1 - $arg2;
            break;
        case "mul":
            $res = $arg1 * $arg2;
            break;
        case "div":
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
    <select name="option">
        <option selected value="sum">Сложить</option>
        <option value="dif">Вычесть</option>
        <option value="mul">Умножить</option>
        <option value="div">Поделить</option>
    </select>
    <input name="arg2" type="text">
    <input type="submit" name="Отправить">
    <?php if($res) echo "Результат: $res."?>
</form>
