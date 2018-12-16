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
	
	
	for ($i=0; $i<count($arr); $i++)
	{
		$masword=explode("~", $arr[$i]);
		$usertake=$masword[0];;
		$full_name=$masword[1];
		$email=$masword[2];
		$username=$masword[3];
		$password=$masword[4];
		$role=$masword[5];
		mysqli_query($lank, "DELETE FROM `per_films` WHERE `perid`='$username'") 
			or die ("Ошибка подключения");
			mysqli_query($lank, "DELETE FROM `per_ser` WHERE `perid`='$username'") 
			or die ("Ошибка подключения");
		mysqli_query($link, "DELETE FROM `pers` WHERE `id`='$usertake'") 
			or die ("Ошибка подключения");
		
	}
	
    
   
    // перенаправление на скрипт main.php
    mysqli_close($lank);			
	header('Location: admin.php');	
}else {echo"Ошибка удаления";}
	
