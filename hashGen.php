<?php
	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$dbName = "acm quiz";
	
	$con = new mysqli($serverName, $userName, $password, $dbName);
	
	if($con -> connect_error) {
		die("Connection error");
	} /*else {
		echo "Connected";
	}*/
	
	$upass = "select passHash from users";
	$res = $con->query($upass);
	$res = $res->fetch_all(MYSQLI_ASSOC);
	//echo $res[0]['passHash'];
	
	/*Proves that associative arrays only need to be shuffled once instead of recurring shuffling.
	$arr = array(['code' => 'asdas', 'num'=>1], ['code' => 'vstret', 'num'=>2]);
	shuffle($arr);
	var_dump($arr);
	*/
?>