<?php
	session_start();
	require_once 'connect.php';
	mysqli_query($lank, "SET NAMES utf8");
	mysqli_query($lank, "SET CHARACTER utf8");
	mysqli_query($lank, "SET character_set_client = utf8");
	mysqli_query($lank, "SET character_set_connection = utf8");
	mysqli_query($lank, "SET character_set_results = utf8");	
	if(isset($_POST['name']) && isset($_POST['years']) && isset($_POST['num_s']))
					{
					$perid = $_SESSION['session_username'];
					$name = htmlentities(mysqli_real_escape_string($lank, $_POST['name']));
					$year = htmlentities(mysqli_real_escape_string($lank, $_POST['years']));
					$num_s = htmlentities(mysqli_real_escape_string($lank, $_POST['num_s']));
					}
					 $query ="INSERT INTO per_ser VALUES('$perid', '$name','$year', '$num_s')";
					 $result = mysqli_query($lank, $query) or die("Ошибка " . mysqli_error($lank)); 
					if($result)
					{
						echo "<span style='color:blue;'>Данные добавлены</span>";
					}
	mysqli_close($lank);			
	header('Location: main.php?level=3.2');
?>