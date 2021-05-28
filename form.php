<?php

// Обработка на данните, въведени от потребителя в HTML формуляра

if ( $_POST['submit'] ) {
	
	// Записване на въведените от потребителя данни в променливи
	
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$comments = $_POST['comments'];
	
	// Примери за валидация на данните с регулярни изрази
	
	if ( !preg_match( "/^[A-Z][a-z]{2,30}$/", $first_name ) ) {
		
		echo "Невалидно първо име";
	}

	if ( !preg_match( "/^[A-Z][a-z]{2,30}$/", $last_name ) ) {
		
		echo "Невалидна фамилия";
	}

	if ( $age < 18 || $age > 24 ) {
		
		echo "Невалидни години";
	}

}

// Пример за HTML формуляр :

?>

<form action="form.php" method="post">

<!-- Поле за първо име -->

<input type="text" name="first_name"><br><br>

<!-- Поле за фамилия -->

<input type="text" name="last_name"><br><br>

<!-- Поле за години -->

<input type="text" name="age"><br><br>

<!-- Поле за коментар -->

<textarea name="comments"></textarea><br><br>

<!-- Меню за избор -->

<select name="gender">
	<option value="m">Male</option>
	<option value="f">Female</option>
</select>

<!-- Бутон Submit -->

<input type="submit" name="submit" >


</form>
