<?php

	$host = 'localhost'; // адрес сервера 
	$database = 'usertb'; // имя базы данных людей
	$database1 = 'tabl'; //имя базы данных топов
	$user = 'root'; // имя пользователя
	$password = ''; // пароль
	
	$link = mysqli_connect($host, $user, $password, $database)
	or die("Ошибка " . mysqli_error($link));
	$lank = mysqli_connect($host, $user, $password, $database1)
	or die("Ошибка " . mysqli_error($lank));
	
?>