<?php
	header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php 
		$title = "Домашняя работа №3";
		echo "<title>$title</title>";
	?>
</head>
<body>
	<?php
		echo "<h1>$title</h1>";
		
		// Задание №1
		echo "<br><br>Задание №1<br>";
		$a = 0;
		while($a < 100){
			$a++;
			if($a % 3 == 0){
				echo "$a<br>";
			}
		}
		// Задание №2
		echo "<br><br>Задание №2<br>";
		$a = 0;
		do{
			if($a === 0) {
				echo "$a - это ноль.<br>";
			}
			else if($a % 2 === 0) {
				echo "$a - это четное число.<br>";
			} else {
				echo "$a - это нечетное число.<br>";
			}
			$a++;
		}while($a <= 10);
		// Задание №3
		echo "<br><br>Задание №3<br>";
		$arr = [
			'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
			'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
			'Рязанская область' => ['Рязань', 'Касимов', 'Скопин']
		];
		foreach($arr as $region => $cities){
			echo $region, "<br>", implode(', ', $cities), '.<br>';
			
		}
		// Задание №4
		echo "<br><br>Задание №4<br>";
		$str = "тест";
		
		function translit($str){
			$alph = [
				'а'=> 'a',
				'б' => 'b',
				'в' => 'v',
				'г' => 'g',
				'д' => 'd',
				'е' => 'e',
				'ё' => 'yo',
				'ж' => 'zh',
				'з' => 'z',
				'и' => 'i',
				'й' => 'j',
				'к' => 'k',
				'л' => 'l',
				'м' => 'm',
				'н' => 'n',
				'о' => 'o',
				'п' => 'p',
				'р' => 'r',
				'с' => 's',
				'т' => 't',
				'у' => 'u',
				'ф' => 'f',
				'х' => 'h',
				'ц' => 'c',
				'ч' => 'ch',
				'ш' => 'sh',
				'щ' => 'sh',
				'ь' => '',
				'ы' => 'y',
				'ъ' => '',
				'э' => 'e',
				'ю' => 'yu',
				'я' => 'ya'
			];
			$result = '';
			for($i = 0; $i < mb_strlen($str); $i++){
				if(isset($alph[mb_substr($str, $i, 1)])){
					$result .=$alph[mb_substr($str, $i, 1)];
				}
				else{
					$result .= mb_substr($str, $i, 1);
				}
			}
			return $result;
		}
		echo 'Исходная строка: ', $str, '<br>';
		echo 'Результат: ', translit($str);
		// Задание №5
		echo "<br><br>Задание №5<br>";
		$str = "Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.";
		
		function spaceBetween($str){
			for($i = 0; $i < mb_strlen($str); $i++){
				if(mb_substr($str, $i, 1) == ' '){
					$result .= '_';
				}
				else{
					$result .= mb_substr($str, $i, 1);
				}
			}
			return $result;
		}
		echo 'Исходная строка: ', $str, '<br>';
		echo 'Результат: ', spaceBetween($str);
		// Задание №6
		echo "<br><br>Задание №6<br>";
		$menuItems = [
			'Главная' => '#',
			'Каталог' => '#',
			[
				'Одежда для мужчин' => '#',
				'Одежда для женщин' => '#',
				'Одежда для детей' => '#',
				[
					'Одежда для малышей' => '#',
					'Одежда для школьников' => '#',
					'Одежда для подростков' => '#'
				],
			],
			'Контакты' => '#'
		];
		function renderMenu($menuItems){
			$menu = '<ul>';
			foreach($menuItems as $text => $link){
				if(is_numeric($text)){
					$menu = mb_strimwidth($menu, 0, mb_strlen($menu)-5);
					$menu .= renderMenu($link);
					$menu .= '</li>';
				}
				else{
					$menu .= '<li><a href="' . $link . '">' . $text .'</a></li>'; 
				}
			}
			$menu .= '</ul>';
			return $menu;
		}
		echo renderMenu($menuItems);
	?>
</body>
</html>