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
	
	$qqall = "select ansNum from answers";
	$resans = $con->query($qqall);
	$rowsans = $resans->fetch_all(MYSQLI_ASSOC);
	
	if($rowsans[0]['ansNum'] == $_POST['onea'] && $rowsans[1]['ansNum'] == $_POST['twoa'] && $rowsans[2]['ansNum'] == $_POST['threea'] && $rowsans[3]['ansNum'] == $_POST['foura']
	&& $rowsans[4]['ansNum'] == $_POST['fivea']) {
		//"Correct Answer";
		echo 1;
	} else {
		echo 0;
	}
?>