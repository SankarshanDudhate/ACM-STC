<?php
	if( !isset($_COOKIE['username']) ) {
			echo 'Please Login';
			echo '<script>window.location = "login.php"</script>';
	} /*else {
		//echo $_COOKIE['username'];
	}*/
?>

<html>

<head>
	<title>Sherlocked</title>
	<script src="jquery-3.3.1.min.js"></script>
</head>

<script>
	var curQuestion=1,rightScore=0;
	function bodyOnLoad() {
			$.get("functions.php", {type: 'allQuestions'}, onGetQuestions);
	}
	
	function onGetQuestions(data) {
		//console.log(data);
		queTime = new Date();
		queTime.setTime( queTime.getTime() + 60*60 );
		document.cookie = 'questions=' + data + ";expires=" + queTime.toUTCString() + ";";
		var indexEq = document.cookie.lastIndexOf("=");
		var queString = document.cookie.substr(indexEq+1,4);
		questionNums = queString.split("");
		//alert("onGetQuestions: "+document.cookie);
		qnumString = questionNums[curQuestion-1].toString();
		$.get("functions.php", {type:'questionOutput', qnum: qnumString}, setNextQuestion );
		$.get("functions.php", {type:"questionOptions", qnum: qnumString}, setNextOptions );
	}
	
	function setNextQuestion(data) {
		//console.log("Question:\n"+data);
		//outputField = document.getElementById("outputInput");
		//outputField.value = data;
	}
	
	function setNextOptions(data) {
		data=JSON.parse(data);
		//alert(data);

		var tempElmt = document.getElementsByClassName("options");
		
		for(i=0; i<data['optCount']; i++) {
			tempElmt[i].value = data[""+(i+1)]['code'];
			tempElmt[i].answerId = data[""+(i+1)]['ansNum'];
			//console.log(tempElmt[i].answerId);
		}
	}
	
	function finishAttempt() {
		//console.log("finishAttempt(): "+document.cookie);
		$.post("functions.php", {type:'finishAttempt',score: rightScore.toString()}, onFinish);
	}
	
	function onFinish(data) {
		//console.log("Session finished");
		console.log(data);
		console.log("onFinish(): "+document.cookie);
		window.location='login.php';
	}

	function postAnswer() {
		var ansArray = [];
		var tempElmt = document.getElementsByClassName("options");
		
		for(i=0; i<tempElmt.length; i++) {
			ansArray[i] = tempElmt[i].answerId;
		}		
		$.post("validate.php", {onea:ansArray[0], twoa:ansArray[0], threea:ansArray[2], foura: ansArray[3], fivea: ansArray[4]}, onSuccess );
	}
	
	function onSuccess(data) {
		if(data=="1") console.log("Correct Answer");
		if(data=="0") console.log("Wrong Answer");
		//nextQuestion();
	}
	
	function nextQuestion(){
		curQuestion++;
		if(curQuestion>1) {
			alert("You're done");
			finishAttempt();
		} else {
			var qnumString = questionNums[curQuestion-1].toString();
			$.get("functions.php", {type:'questionOutput', qnum: qnumString}, setNextQuestion );
			$.get("functions.php", {type:"questionOptions", qnum: qnumString}, setNextOptions );
		}
		console.log("nextQuestion: "+document.cookie);
	}
</script>

<body onload="bodyOnLoad()">

	<input type='text' id='opt-1' class='options'></input>
	<input type='text' id='opt-2' class='options'></input>
	<input type='text' id='opt-3' class='options'></input>
	<input type='text' id='opt-4' class='options'></input>
	<input type='text' id='opt-5' class='options'></input>
	<input type='text' id='opt-6' class='options'></input>
	<input type='text' id='opt-7' class='options'></input>
	<a id="pbut" href="#" onclick='postAnswer()'>POST</a>
	<button id="pbut" href="#" onclick="finishAttempt()">Finish</button>
</body>
</html>