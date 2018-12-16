<?php
	session_start();
	require_once 'connect.php';
	mysqli_query($lank, "SET NAMES utf8");
	mysqli_query($lank, "SET CHARACTER utf8");
	mysqli_query($lank, "SET character_set_client = utf8");
	mysqli_query($lank, "SET character_set_connection = utf8");
	mysqli_query($lank, "SET character_set_results = utf8");	
	if(isset($_POST['name']) && isset($_POST['year']) && isset($_POST['rej']) && isset($_POST['time']))
					{
					$perid = $_SESSION['session_username'];
					$name = htmlentities(mysqli_real_escape_string($lank, $_POST['name']));
					$year = htmlentities(mysqli_real_escape_string($lank, $_POST['year']));
					$rej = htmlentities(mysqli_real_escape_string($lank, $_POST['rej']));
					$time = htmlentities(mysqli_real_escape_string($lank, $_POST['time']));
					}
					 $query ="INSERT INTO per_films VALUES('$perid', '$name','$year', '$rej','$time')";
					 $result = mysqli_query($lank, $query) or die("Ошибка " . mysqli_error($lank)); 
					if($result)
					{
						echo "<span style='color:blue;'>Данные добавлены</span>";
					}
	mysqli_close($lank);			
	header('Location: main.php?level=2.2');
?>