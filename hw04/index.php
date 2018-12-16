<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP уровень 1</title>
</head>

<body>
<?php
	
	require_once "resize.php";
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		move_uploaded_file($_FILES['file']['tmp_name'], "img/full/" . $_FILES['file']['name']);
		create_thumbnail("img/full/" . $_FILES['file']['name'], "img/min/" . $_FILES['file']['name'], 100, 100);
		
	}
	
	$min_images = scandir("img/min");
	for($i = 2; $i<count($min_images); $i++){ ?>
		<a href="<?= "img/full/" . $min_images[$i]?>" target = "_blank"><img src="<?= "img/min/" . $min_images[$i]?>" alt="Миниатюра"></a>
	<?php }
	
?>

<form enctype="multipart/form-data"	method="post" action="">
<input type="file" name="file"><input type="submit" value="Загрузить изображение">
</form>
</body>
</html>