<html>
<head>
	<title>Login Page</title>
	<script src="jquery-3.3.1.min.js"></script>
</head>

<script>
	function bodyOnLoad() {
		expDate = new Date();
		expDate.setTime( expDate.getTime() - (120*1000));
		//document.cookie = "username=; expires=" + expDate.toUTCString() + ";";
		//console.log(document.cookie);
	}

	function loginUser() {
		unameInput = document.getElementById("usernameInput");
		passInput = document.getElementById("passwordInput");
		
		uname = unameInput.value;
		pass = passInput.value;
		
		$.post("verifyLogin.php", {username: uname, password: pass}, onSuccess );
	}
	
	function onSuccess(data) {
		/*if( data == "1") {
			//window.location = "index.php";
			alert("Session Started");
		} else if ( data == "0")  {
			alert("Wrong Password");
		} else {
			alert("Wrong username");
		}*/
		//alert(data);
		if( document.cookie.indexOf("username") > -1 ) window.location = "index.php";
	}
</script>

<body onload="bodyOnLoad()">
	<label for="usernameInput">Username</label>		<br>
	<input type="text" id="usernameInput" class="inputs"></input>	<br>
	<label for="passwordInput">Password</label>		<br>
	<input type="password" id="passwordInput" class="inputs"></input>	<br>
	<button id="loginButton" onclick="loginUser()">Login</button>
</body>

</html>