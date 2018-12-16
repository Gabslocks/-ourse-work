<?php require_once("connect.php");
mysqli_query($link, "SET NAMES utf8");
		mysqli_query($link, "SET CHARACTER utf8");
		mysqli_query($link, "SET character_set_client = utf8");
		mysqli_query($link, "SET character_set_connection = utf8");
		mysqli_query($link, "SET character_set_results = utf8");	 ?>
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

if(isset($_POST["register"])){


if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
	$full_name=$_POST['full_name'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	

	
	$query=mysqli_query($link, "SELECT * FROM pers WHERE username='".$username."'");
	$numrows=mysqli_num_rows($query);
	
	if($numrows==0)
	{
	$sql="INSERT INTO pers
			(full_name, email, username,password) 
			VALUES('$full_name','$email', '$username', '$password')";

	$result=mysqli_query($link, $sql);


	if($result){
	 $message = "Аккаунт успешно зарегистрирован";
	} else {
	 $message = "Failed to insert data information";
	}

	} else {
	 $message = "Этот логин уже использован. Попробуйте другой";
	}

} else {
	 $message = "Требуется заполнить все поля";
}
}
?>


<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	
<div class="container mregister">
			<div id="login">
	<h1>Регистрация</h1>
<form name="registerform" id="registerform" action="register.php" method="post">
	<p>
		<label for="user_login">Ваше имя<br />
		<input type="text" name="full_name" placeholder="Иванов Римин" id="full_name" class="input" size="32" required /></label>
	</p>
	
	
	<p>
		<label for="user_pass">Email<br />
		<input type="email" name="email" placeholder="trururu@mail.ru" id="email" class="input" value="" size="32" required/></label>
	</p>
	
	<p>
		<label for="user_pass">Логин<br />
		<input type="text" name="username" id="username" placeholder="Trutut" class="input" value="" pattern = "[A-Za-zА-Яа-яЁё0-9]{4,20}" title = "Логин не может быть короче 4 символов и больше 20. Должен содержать буквы A-z и А-я и числа" size="20" required/></label>
	</p>
	
	<p>
		<label for="user_pass">Пароль<br />
		<input type="password" name="password" id="password" class="input" value="" minlength="8" name = "pswd" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[А-ЯЁ])(?=.*[а-яё]){5,32}" title = "Пароль не может быть короче 5 символов, больше 32 и должен содержать хотя бы одну цифру, одну маленькую и одну большую латинскую букву." size="32" required /></label>
	</p>	
	

		<p class="submit">
		<input type="submit" name="register" id="register" class="button" value="Регистрация" />
	</p>
	
	<p class="regtext">Вы уже зарегистрированы? <a href="login.php" >Войти здесь</a>!</p>
</form>
	
	</div>
	</div>
	
<footer><p>Контакты: vup.rum@mail.ru</p>
            <p>Roflan developer, 2018</p> </footer>	
</body>
</html>
