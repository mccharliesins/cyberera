<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
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
        echo "logged in";
        session_start();
$_SESSION['email'] = $_POST['email'];
    }else{
        //logged out!
    }
}
}

if(isset($_SESSION['email'])) {header('Location: '.'dashboard.php');}


?>
	<div class="login-box">
		<h2>Login Here</h2>
		<form action="login.php" method='POST'>
			<p>Username</p>
			<input type="text" name="email" placeholder="Enter Username" required>
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password" required>
			<input type="submit" name="submit" value="Login">
			<a href="#">Forgot Password</a><br>
			<a href="#">Don't have an account? Sign up</a>
		</form>
	</div>
</body>
</html>
