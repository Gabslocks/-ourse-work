<?php
	session_start();
	?>
	<?php require_once("connect.php"); 
	mysqli_query($link, "SET NAMES utf8");
		mysqli_query($link, "SET CHARACTER utf8");
		mysqli_query($link, "SET character_set_client = utf8");
		mysqli_query($link, "SET character_set_connection = utf8");
		mysqli_query($link, "SET character_set_results = utf8");	?>
<!DOCTYPE html>
<html>
  <head>
	   <meta charset="utf-8">
       <title>Домашняя фильмотека. Логин</title>
      <link href="style.css" media="screen" rel="stylesheet">
	  	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>			
</head> 

	<body>
	
	<?php
	if(isset($_SESSION["session_username"])){
	
	header("Location: main.php?level=0");
	}
	if(isset($_POST["login"])){
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	
	$query=mysqli_query($link, "SELECT * FROM pers WHERE username='".$username."' AND password='".$password."'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0)
 {
while($row=mysqli_fetch_assoc($query))
 {
	$dbusername=$row['username'];
	$dbpassword=$row['password'];
	$dbrole=$row['role'];
	
 }
  if($username == $dbusername && $password == $dbpassword)
 {

	 $_SESSION['session_username']=$username;
	 $_SESSION['session_role']=$dbrole;
	
 /* Перенаправление браузера */
   header("Location: main.php?level=0");
	}
	} else {
		
	$message =   "Неверный логин или пароль";
 }
	} else {
    $message = "Все поля должны быть заполнены";
	}
	}
	?>

	<div class="container mlogin">
		<div id="login">
		<h1>Вход</h1>
		<form action="" id="loginform" method="POST"name="loginform">
		<p><label for="user_login">Имя пользователя<br>
		<input class="input" id="username" name="username" size="20" type="text" required value="" pattern = "[A-Za-zА-Яа-яЁё0-9]{4,20}" title = "Логин не может быть короче 4 символов и больше 20. Должен содержать буквы A-z и А-я и числа"></label></p>
		<p><label for="user_pass">Пароль<br>
		 <input class="input" id="password" minlength="8" name="password" size="32" required type="password" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[А-ЯЁ])(?=.*[а-яё]){8,32}" title = "Пароль не может быть короче 8 символов, больше 32 и должен содержать хотя бы одну цифру, одну маленькую и одну большую латинскую букву."  value=""></label></p> 
			<p class="submit"><input class="button" name="login"type= "submit" value="Войти"></p>
			<p class="regtext">Еще не зарегистрированы?<a href= "register.php">Регистрация</a>!</p>
		   </form>
		 </div>
	  </div>
 
<footer><p>Контакты: vup.rum@mail.ru</p>
            <p>Roflan developer, 2018</p> </footer>	
</body>
</html>

	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
