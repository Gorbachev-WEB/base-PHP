<?php
$id = $_GET['id'];

$connection = mysqli_connect('localhost', 'root', '', 'shop');
$res = mysqli_fetch_all(mysqli_query($connection, "select type, `desc`, price from product where id = $id;"), MYSQLI_ASSOC);
?>
<h1><?=$res[0]['type']?></h1>
<p><?=$res[0]['desc']?></p>
<h4><?=$res[0]['price']?></h4>
