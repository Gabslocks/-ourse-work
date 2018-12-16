<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} 

if($_SESSION["session_role"]==0)
	{
	
?>	
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="s_main.css" rel="stylesheet">
        <title>Домашняя фильмотека. Главная страница</title>
    </head>
    <body>
		<?php require_once 'connect.php';
		mysqli_query($lank, "SET NAMES utf8");
		mysqli_query($lank, "SET CHARACTER utf8");
		mysqli_query($lank, "SET character_set_client = utf8");
		mysqli_query($lank, "SET character_set_connection = utf8");
		mysqli_query($lank, "SET character_set_results = utf8");	?>
	
	
        <div id="header">
            <h1>Домашняя фильмотека</h1>
			<h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?></span></h2>
			<nav>
			    <ul>
			        <li><a href="main.php?level=0">Главная</a></li>
                    <li><a>Топы сайта</a>		
						<ul>
							<li><a href="main.php?level=1.1">Топ фильмов сайта</a></li>
							<li><a href="main.php?level=1.2">Топ сериалов сайта</a></li>
						</ul>
					</li>
                    <li><a >Ваши фильмы</a>
						<ul>
							<li><a href="main.php?level=2.1">Список Ваших фильмов</a></li>
							<li><a href="main.php?level=2.2">Добавить элемент в список</a></li>														
							<li><a href="main.php?level=2.4">Удалить элемент из списка</a></li>
						</ul>
					</li>
                    <li><a >Ваши сериалы</a>
						<ul>
							<li><a href="main.php?level=3.1">Список Ваших сериалов</a></li>
							<li><a href="main.php?level=3.2">Добавить элемент в список</a></li>						
							<li><a href="main.php?level=3.4">Удалить элемент из списка</a></li>
						</ul>
                    </li>
                    <li><a href="logout.php" >Выход</a></li>
			    </ul>
		</nav>  
        </div>
		 
          
        <div class="wrapper">
            <!--<div id="sidebar1" class="aside">
                <h2>Лента новостей</h2>
                <p>//////////////////</p>
                <h3>Options</h3>
                <ul>
                    <li>Item1</li>
                    <li>Item2</li>
                    <li>Item3</li>
                </ul>
            </div> -->
            <div id="article">             
                          
		
				<?php 		

					if ($_GET['level']==1.1) //вывод топа фильмов
					{	
						$query ="SELECT * FROM top_films";
						$result = mysqli_query($lank, $query) or die("Ошибка " . mysqli_error($lank)); 
						if($result)
						{
							$rows = mysqli_num_rows($result); // количество полученных строк
							 
							echo "<table><tr><th>Позиция</th><th>Название</th><th>Год производства</th><th>Режиссер</th><th>Длительность</th></tr>";
							for ($i = 0 ; $i < $rows ; ++$i)
							{
								$row = mysqli_fetch_row($result);
								echo "<tr>";
									for ($j = 0 ; $j < 5 ; ++$j) echo "<td>$row[$j]</td>";
								echo "</tr>";
							}
							echo "</table>";
							 
							// очищаем результат
							mysqli_free_result($result);
						}
											
					}
					if ($_GET['level']==1.2) // вывод топа сериалов
					{	
						$query ="SELECT * FROM top_ser";
						$result = mysqli_query($lank, $query) or die("Ошибка " . mysqli_error($lank)); 
						if($result)
						{
							$rows = mysqli_num_rows($result); // количество полученных строк
							 
							echo "<table><tr><th>Позиция</th><th>Название</th><th>Год производства</th><th>Количество серий</th></tr>";
							for ($i = 0 ; $i < $rows ; ++$i)
							{
								$row = mysqli_fetch_row($result);
								echo "<tr>";
									for ($j = 0 ; $j < 4 ; ++$j) echo "<td>$row[$j]</td>";
								echo "</tr>";
							}
							echo "</table>";
							 
							// очищаем результат
							mysqli_free_result($result);
						}
						
					}
					if ($_GET['level']==2.1) // вывод списка фильмов человека
					{	
						$query ="SELECT * FROM per_films";
						$result = mysqli_query($lank, $query) or die("Ошибка " . mysqli_error($lank)); 
						if($result)
						{
							$rows = mysqli_num_rows($result); // количество полученных строк
							 
							echo "<table><tr><th>Название</th><th>Год производства</th><th>Режиссер</th><th>Длительность</th></tr>";
							
										for ($i = 0 ; $i < $rows ; ++$i)
										{ 	
											$row1=mysqli_fetch_array($result);
											if ( $row1[0] == $_SESSION['session_username'] )
											{	
												//$row = mysqli_fetch_row($result);
												echo "<tr>";
												for ($j = 1 ; $j < 5 ; ++$j) echo "<td>$row1[$j]</td>";
												echo "</tr>";
											} 
										}															
								
							echo "</table>";					
							// очищаем результат
							mysqli_free_result($result);
						}
						
					}
					if ($_GET['level']==2.2) // Добавить элемент в кино
					{
						
						echo "<h4>Добавление</h4>
							<form method='POST' action='in_film.php'>
								<p>Название фильма: <br> 
								<input type='text' name='name' maxlength='50' required/></p>
								<p>Год производства: <br> 
								<input type='number' name='year' placeholder='1999' pattern = '[0-9]{4}' maxlength='10'/></p>
								<p>Режиссер: <br> 
								<input type='text' name='rej' maxlength='30' /></p>
								<p>Длительность фильма: <br> 
								<input type='number' name='time' maxlength='15'/></p>
								<input type='submit' value='Добавить'>
							</form>";
							
					}
					
					if ($_GET['level']==2.4) // удаление
					{
						$query ="SELECT * FROM per_films";				 
						$result = mysqli_query($lank, $query) or die("Ошибка " . mysqli_error($lank)); 					
						$row=mysqli_num_rows($result);
						if($result)
						{
							//$rows = mysqli_num_rows($result); // количество полученных строк
							echo '<form method="POST" action="delete.php">
							<p><select name="list[]" size="15" multiple required >';	 
							
							for($i=0; $i<$row; ++$i)
							{
								$arr=mysqli_fetch_array($result);
								if($arr[0]==$_SESSION['session_username'])
							echo '<option value="'.$arr[1].'~'.$arr[2].'~'.$arr[3].'~'.$arr[4].'">Название: '.$arr[1].', Год: '.$arr[2].', Режиссер: '.$arr[3].', Время: '.$arr[4].'</option>';
								
							}
							
							echo '</select></p>
							<p><input type="submit" value="Удалить"></p> </form>';
							 mysqli_free_result($result);
						}
						
					}
					if ($_GET['level']==3.1) // вывод списка сериалов человека
					{	
						$query ="SELECT * FROM per_ser";
						$result = mysqli_query($lank, $query) or die("Ошибка " . mysqli_error($lank)); 
						if($result)
						{
							$rows = mysqli_num_rows($result); // количество полученных строк
							 
							echo "<table><tr><th>Название</th><th>Годы производства</th><th>Количество серий</th></tr>";
							for ($i = 0 ; $i < $rows ; ++$i)
										{ 	
											$row1=mysqli_fetch_array($result);
											if ( $row1[0] == $_SESSION['session_username'] )
											{	
												//$row = mysqli_fetch_row($result);
												echo "<tr>";
												for ($j = 1 ; $j < 4 ; ++$j) echo "<td>$row1[$j]</td>";
												echo "</tr>";
												//echo "$rows";
											}
										}	
							echo "</table>";					
							// очищаем результат
							mysqli_free_result($result);
						}
						
					}
					if ($_GET['level']==3.2) // Добавить элемент в кино
					{
						
						echo "<h4>Добавление</h4>
							<form method='POST' action='in_ser.php'>
								<p>Название сериала: <br> 
								<input type='text' name='name' maxlength='50' required/></p>
								<p>Годы производства: <br> 
								<input type='text' maxlength='15' placeholder='1999-...' name='years' pattern = '[0-9]{4}\-[0-9]{4}|[.]{3}' /></p>
								<p>Количество серий: <br> 
								<input type='number' maxlength='30'  name='num_s' /></p>
								<input type='submit' value='Добавить'>
							</form>";
							
					}
					if ($_GET['level']==3.4) // удаление сериалов
					{
						$query ="SELECT * FROM per_ser";				 
						$result = mysqli_query($lank, $query) or die("Ошибка " . mysqli_error($lank)); 					
						$row=mysqli_num_rows($result);
						if($result)
						{
							//$rows = mysqli_num_rows($result); // количество полученных строк
							echo '<form method="POST" action="delete_ser.php">
							<p><select name="list[]" size="15" multiple required >';	 
							
							for($i=0; $i<$row; ++$i)
							{
								$arr=mysqli_fetch_array($result);
								if($arr[0]==$_SESSION['session_username'])
							echo '<option value="'.$arr[1].'~'.$arr[2].'~'.$arr[3].'">Название: '.$arr[1].', Годы: '.$arr[2].', Количество серий: '.$arr[3].'</option>';
								
							}
							
							echo '</select></p>
							<p><input type="submit" value="Удалить"></p> </form>';
							 mysqli_free_result($result);
						}
						
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
	} else header("location:admin.php");

?>
