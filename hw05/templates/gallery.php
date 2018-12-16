<?php foreach ($images as $key => $image):?>
    <a href="photo.php?id=<?=$key?>">
        <img src="img/min/<?=$image?>" alt="Миниатюра">
    </a>
<?php endforeach;?>

<form action="" method="post" enctype="multipart/form-data">
    <input name="image" type="file">
    <input type="submit" value="Загрузить изображение">
</form>
