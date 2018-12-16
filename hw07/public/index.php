<?php
require $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
require ENGINE_DIR . "/db.php";
require ENGINE_DIR . "/render.php";

session_start();
$isAuth = false;
if($_SESSION){
    $isAuth = $_SESSION['isAuth'];
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $login = $_POST['login'];
    if($user = query("SELECT * FROM user WHERE login = '$login' ;")){
        $isAuth = true;
        $_SESSION['isAuth'] = true;
        $_SESSION['profile'] = $user[0];
    }
    else{
        echo "<h3 style='color: #b94a48'>Неверное имя пользователя, попробуйте снова:</h3>";
    }
}

if(!$isAuth){
    echo "
    <form action='' method='post'>
        Введите ваш логин, для доступа к каталогу: <br>
        <input name='login' type='text'>
        <input type='submit' value='Вход'>
    </form>
    ";
    exit;
}
else{
    echo "<h1>Добро пожаловать в каталог, {$_SESSION['profile']['name']}({$_SESSION['profile']['login']}):</h1>";
}

if($_SERVER['REQUEST_METHOD'] == "GET"){
    $addid = $_GET['addid'];
    $remid = $_GET['remid'];
    if($addid){
        $res = query("select id, type, `desc`, price from product where id = $addid;");
        if($_SESSION['cartContent']){
            for($i = 0; $i<count($_SESSION['cartContent']); $i++){
                if($_SESSION['cartContent'][$i]['id'] == $addid){
                    $_SESSION['cartContent'][$i]['count']++;
                    break;
                }
                elseif($i == count($_SESSION['cartContent']) - 1){
                    array_push($_SESSION['cartContent'], ['id' => $res[0]['id'], 'type' => $res[0]['type'], 'price' => $res[0]['price'], 'count' => 0]);
                }
            }
        }
        else{
            $_SESSION['cartContent'] = [['id' => $res[0]['id'], 'type' => $res[0]['type'], 'price' => $res[0]['price'], 'count' => 1]];
        }

    }
    elseif($remid){
        $res = query("select id, type, `desc`, price from product where id = $remid;");
        for($i = 0; $i<count($_SESSION['cartContent']); $i++){
            if($_SESSION['cartContent'][$i]['id'] == $remid){
                if($_SESSION['cartContent'][$i]['count'] == 1){
                    unset($_SESSION['cartContent'][$i]);
                    sort($_SESSION['cartContent']);
                    break;
                }
                else {
                    $_SESSION['cartContent'][$i]['count']--;
                    break;
                }

            }
        }
    }

}

if($_SESSION['cartContent']){
    echo renderTemplate('cart', ['cartContent' => $_SESSION['cartContent']]);
}else{
    echo '<div><p4>Ваша корзина пуста</p4></div>';
}

$result = query("select * from product;");
foreach ( $result as $item):?>
    <div>
        <h3><?=$item['type']?></h3>
        <p><?=$item['desc']?></p>
        <a href="?addid=<?=$item['id']?>">Купить за <?=$item['price']?></a>
    </div>
<?endforeach;