<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="s_main.css" rel="stylesheet">
        <title>Домашняя фильмотека. Администрация</title>
    </head>
    <body>
		<?php require_once 'connect.php';
		mysqli_query($link, "SET NAMES utf8");
		mysqli_query($link, "SET CHARACTER utf8");
		mysqli_query($link, "SET character_set_client = utf8");
		mysqli_query($link, "SET character_set_connection = utf8");
		mysqli_query($link, "SET character_set_results = utf8");	?>
	
	
        <div id="header">
            <h1>Домашняя фильмотека</h1>
			<h2>Добро пожаловать, Администратор</h2>
			<nav>
			    <ul>
			         <li><a href="logout.php" >Выход</a></li>
			    </ul>
		</nav>  
        </div>
		 
          
        <div class="wrapper">
         
            <div id="article">             
                <?php         
				$query ="SELECT * FROM pers";				 
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 					
						$row=mysqli_num_rows($result);
						if($result)
						{
							//$rows = mysqli_num_rows($result); // количество полученных строк
							echo '<form method="POST" action="ad_del.php">
							<p><select name="list[]" size="15" multiple required >';	 
							
							for($i=0; $i<$row; ++$i)
							{
								$arr=mysqli_fetch_array($result);
								
							echo '<option value="'.$arr[0].'~'.$arr[1].'~'.$arr[2].'~'.$arr[3].'~'.$arr[4].'~'.$arr[5].'">ID: '.$arr[0].', Имя: '.$arr[1].', Email: '.$arr[2].', Логин: '.$arr[3].', Пароль: '.$arr[4].', Роль: '.$arr[5].'</option>';
								
							}
							
							echo '</select></p>
							<p><input type="submit" value="Удалить"></p> </form>';
							 mysqli_free_result($result);
						}
				?>
			</div>
		</div>
		
        <div id="footer">
            <p>Контакты: vup.rum@mail.ru</p>
            <p>Roflan developer, 2018</p>
        </div>
    </body>
</html>
<?php

?>
