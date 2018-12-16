<?php
$connection = mysqli_connect('localhost', 'root', '', 'shop');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST["name"];
    $message = $_POST["message"];
    var_dump($message);
    var_dump(mysqli_query($connection, "insert into reviews (name, message) values ($name, $message);"));
    var_dump(mysqli_error($connection));
}
?>
<form action="" method="post">
    <input name="name" "text"><br>
    <textarea name="message" id="" cols="30" rows="10"></textarea><br>
    <input type="submit" name="option" value="Отправить">
</form>
<?php
if($res = mysqli_fetch_all(mysqli_query($connection, 'select name, message from reviews;'), MYSQLI_ASSOC)) {
    foreach ($res as $key):?>
        <div>
            <h3><?=$key['name']?></h3>
            <p><?=$key['message']?></p>
        </div>
    <? endforeach;
}
