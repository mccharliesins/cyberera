<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
<link rel="stylesheet" href="sstyle.css">
</head>
<body>
<?php require ("db.php"); ?> 
<?php
if (isset($_POST['email'])){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $sql = mysqli_query($conn, "SELECT `email`, `password` FROM `users` WHERE email='$email'"); 
$row = mysqli_num_rows($sql); 
while ($row = mysqli_fetch_array($sql)){
    if($row['email']==$email&&$row['password']==$password){
        session_start();
$_SESSION['email'] = $_POST['email'];
    }else{
        //logged out!
    }
}
}

if(isset($_SESSION['email'])) {header('Location: '.'khatam.html');}


?><nav>
<div class="logo" id="logo"><h1 data-value="Cyberera" class="logotext">Cyberera</h1></div>
<div class="menu-items">
  <ul>
	<li><a href="index.php" data-value="home" class="active">Home</a></li>
	<li><a href="courses.php" data-value="courses">Courses</a></li>
	<li><a href="login.php" data-value="login">Login</a></li>
	<li><a href="signup.php" data-value="register">Register</a></li>
  </ul>
</div>
<div class="hamburger" id="hamburger">
  <div id="line1"></div>
  <div id="line3"></div>
</div>
</nav>
<div class="navwhole" id="menuheight">
<div id="undernav"></div>
</div>
	<div id="blur"></div>
	<div id="blob"></div>
	<div id="undernav"></div>

	<div class="everything">
	  <div class="home">
		<div class="mainsection">
		  <div class="one">
			<div class="insideone">
			<div class="subtitlemain">Log In to</div>
			<div class="titlemain">Cyberera</div>               
		  </div>
		  </div>
		  <div class="two">
		  <div class="login-box">
		<form action="login.php" method='POST'>
			<p class="usernamehead">Username</p>
			<input type="text" name="email" placeholder="Enter Username" required>
			<p class="usernamehead">Password</p>
			<input type="password" name="password" placeholder="Enter Password" required>
			<input type="submit" name="submit" value="Login">
		</form>
	</div>
		  </div>
		</div>
		</div></div></div>
<script src="main.js"></script>
</body>
</html>
