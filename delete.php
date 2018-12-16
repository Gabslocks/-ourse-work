<?php
session_start();
	require_once 'connect.php';
	mysqli_query($lank, "SET NAMES utf8");
	mysqli_query($lank, "SET CHARACTER utf8");
	mysqli_query($lank, "SET character_set_client = utf8");
	mysqli_query($lank, "SET character_set_connection = utf8");
	mysqli_query($lank, "SET character_set_results = utf8");   
if(isset($_POST['list']))
{
	
	$arr=$_POST['list'];
	$usertake=$_SESSION['session_username'];
	
	for ($i=0; $i<count($arr); $i++)
	{
		$masword=explode("~", $arr[$i]);
		$name=$masword[0];
		$year=$masword[1];
		$rej=$masword[2];
		$time=$masword[3];
		mysqli_query($lank, "DELETE FROM `per_films` WHERE `perid`='$usertake' AND `name`='$name' AND `year`='$year' AND `rej`='$rej' AND `time`='$time'") 
			or die ("Ошибка подключения");
	}
	
    
   
    // перенаправление на скрипт main.php
    mysqli_close($lank);			
	header('Location: main.php?level=2.4');	
}else {echo"Ошибка удаления";}
	

?>

