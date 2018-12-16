<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php 
		$title = "Домашняя работа №2";
		echo "<title>$title</title>";
	?>
</head>
<body>
	<?php
		echo "<h1>$title</h1>";
		
		// Задание №1
		echo "<br><br>Задание №1<br>";
		$a = 15;
		$b = -7;
		if ($a >= 0 and $b >= 0) {
			echo 'Разность чисел: ' . ($a - $b);
		} else if ($a < 0 and $b < 0) {
			echo 'Произведение чисел: ' . ($a * $b);
		} else {
			echo 'Сумма чисел: ' . ($a + $b);
		}
		// Задание №2
		echo "<br><br>Задание №2<br>";
		$a = 9;
		switch($a){
			case 0:
				echo " 0 ";
			case 1:
				echo " 1 ";
			case 2:
				echo " 2 ";
			case 3:
				echo " 3 ";
			case 4:
				echo " 4 ";
			case 5:
				echo " 5 ";
			case 6:
				echo " 6 ";
			case 7:
				echo " 7 ";
			case 8:
				echo " 8 ";
			case 9:
				echo " 9 ";
			case 10:
				echo " 10 ";
			case 11:
				echo " 11 ";
			case 12:
				echo " 12 ";
			case 13:
				echo " 13 ";
			case 14:
				echo " 14 ";
			case 15:
				echo " 15 ";
				break;
			default:
				echo "Введите число из диапазона [0;15]";
			
		}
		// Задание №3
		echo "<br><br>Задание №3<br>";
		function summ($a, $b){
			return $a + $b;
		}
		function diff($a, $b){
			return $a - $b;
		}
		function mult($a, $b){
			return $a * $b;
		}
		function divn($a, $b){
			if($b==0) return "Ошибка: деление на ноль.";
			return $a / $b;
		}
		echo "2 * 2 = " . mult(2, 2) . ".";
		// Задание №4
		echo "<br><br>Задание №4<br>";
		function doMath($a, $b, $task = "+"){
			switch ($task) {
				case "+":
					echo "Cумма чисел равна: " . summ($a, $b) . ".";
					break;
				case "-":
					echo "Разность чисел равна: " . diff($a, $b) . ".";
					break;
				case "*":
					echo "Произведение чисел равно: " . mult($a, $b) . ".";
					break;
				case "/":
					echo "Частное чисел равно: " . divn($a, $b) . ".";
					break;
				default:
					echo "Ошибка: задана неверная операция.";
					break;
			}
		}
		doMath(3, 1.5, '/');
		// Задание №5
		echo "<br><br>Задание №5<br>";
		$date = date('Y');
		echo "<hr> Copyright &copy $date <hr>";
	?>
</body>
</html>