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
	
	//Query to get some columns from questions database.
	$qqall = "select qid,output from questions";
	$resque = $con->query($qqall);
	$rowsque = $resque->fetch_all(MYSQLI_ASSOC);
	
	/*Get all the answers
	$qa1 = "select qid,code,ansNum,_ansNum from answers";
	$resans = $con->query($qa1);
	$rowsans = $resans->fetch_all(MYSQLI_ASSOC); 
	
	$ansCount = count($rowsans);
	$arrAns = range(0, $ansCount-1, 1);
	shuffle($arrAns);
	//var_dump($arrAns);
	*/
	
	
	if( isset($_GET['type']) ) {
		if( $_GET['type'] == 'allQuestions' ) getQuestions();
		if( $_GET['type'] == 'questionOutput') getQuestionOutput( $_GET['qnum'] );
		if( $_GET['type'] == 'questionOptions') getQuestionOptions( $_GET['qnum']);
	}
	
	if( isset($_POST['type']) ) {
		if( $_POST['type'] == 'finishAttempt' ) finishSession();
	}
	
	
	function getQuestions() {
		$quearr = range(1,1);
		shuffle($quearr);
		foreach( $quearr as $qnum ) {
			echo $qnum;
		}
	}
	
	function getQuestionOutput($n) {
		global $rowsque;
		echo $rowsque[$n-1]['output'];
	}
	
	function getQuestionOptions($n) {
		global $con;
		
		$qopt = "select code,ansNum from answers where qid=$n";
		$resqopt = $con->query($qopt);
		$rowsqopt = $resqopt->fetch_all(MYSQLI_ASSOC);
		shuffle($rowsqopt);
		$options = array( "optCount" => count($rowsqopt) );
		for($i=0; $i<count($rowsqopt); $i++) {
			$x = $i+1;
			$options["$x"]['code'] = $rowsqopt[$i]['code'];
			$options["$x"]['ansNum'] = $rowsqopt[$i]['ansNum'];
		}
		
		echo json_encode($options, JSON_FORCE_OBJECT);
	}
	
	function finishSession() {
		//unset( $_COOKIE['username']);
		//var_dump($_COOKIE);
		foreach( $_COOKIE as $val => $key) {
			unset($_COOKIE[$val]);	
			setcookie($val, '', 1);
		}
		var_dump($_COOKIE);
	}
?>