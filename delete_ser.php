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
		$years=$masword[1];
		$num_s=$masword[2];
		mysqli_query($lank, "DELETE FROM `per_ser` WHERE `perid`='$usertake' AND `name`='$name' AND `years`='$years' AND `num_s`='$num_s'") 
			or die ("Ошибка подключения");
	}
	
    
   
    // перенаправление на скрипт main.php
    mysqli_close($lank);			
	header('Location: main.php?level=3.4');	
}else {echo"Ошибка удаления";}
	

?>
