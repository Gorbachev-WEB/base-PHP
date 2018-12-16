<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <?php
	$title = "Название страницы";
	$h1 = "Год: ";
	$date = date('Y');
	echo "<title>$title</title>";
  ?>
</head>
<body>
	<?php
	echo "<h1> $h1 $date </h1>";
	$a = 5;
	$b = '05';
	var_dump($a==$b); // Почему true: Строка 05 преобразовалась в число - как реузльтат пять равно пяти.
	var_dump((int)'012345'); // Почему 12345: Интерпретатор приводит строку к указанному типу, т.е. к целому числу.
	var_dump((float)123.0 === (int)123.0); // Почему false: строгое сравнение - типы отличаются.
	var_dump((int)0 === (int)'hello, world'); // Почему true: При приведении строки 'hello, world' к целому числу получаем 0.
	echo "<br> <br>";
	
	$a = 5;
	$b = 15;
	echo "Первоначальные значения: a = $a, b = $b <br>";
	
	$a = $a + $b;
	$b = $a - $b;
	$a = $a - $b;
	
	echo "Текущие значения: a = $a, b = $b <br>"
	?>
</body>
</html>
