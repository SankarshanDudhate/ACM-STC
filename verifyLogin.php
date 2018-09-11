<?php
	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$dbName = "acm quiz";
	
	$retCode = -1;
	
	$con = new mysqli($serverName, $userName, $password, $dbName);
	
	if($con -> connect_error) {
		die("Connection error");
	}
	
	$upass = "select username,passHash from users";
	$res = $con->query($upass);
	$res = $res->fetch_all(MYSQLI_ASSOC);
	//echo $res[0]['username'];
	
	for($i=0; $i<count($res); $i++) {
		if( $res[$i]['username'] == $_POST['username']) {
			if( password_verify( $_POST['password'], $res[$i]['passHash']) ) {
				$retCode = 1;
				echo $retCode;
				setcookie('username', $_POST['username'], time()+60*60 );
				//setcookie('score', '0', 60*60);
				//echo var_dump($_COOKIE);
			} else {
				$retCode = 0;
				echo $retCode;
				die();
			}
		}
	}
	
	if( $retCode == -1 ) {
		echo $retCode;
		die();
	}
?>