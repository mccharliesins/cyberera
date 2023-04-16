<!DOCYPE html>
<?php require ("db.php"); ?> 
<html>
  <head>
    <title>Sign-Up</title>
  </head>
  <body>

<!--php code in order to  -->
<?php
if (isset($_POST['Name'])){
  $name=$_POST['Name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $sql = "INSERT INTO `users` (`fullname`,`email`, `password`) VALUES ('$name','$email', '$password')";
  mysqli_query($conn,$sql);
} 
  session_start();

if (isset($_POST['email'])) {$_SESSION['email'] = $_POST['email'];}
if(isset($_SESSION['email'])) {header('Location: '.'dashboard.php');}

?>
<div class="login-box">
    <form action="signup.php" method="post">
      <h1>Sign-Up</h1>
      
     
      <label for="Name">Name:</label>
      <input type="text" id="Name" name="Name" required>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <label for="confirm-password">Confirm Password:</label>
      <input type="password" id="confirm-password" name="confirm-password" required>
      <input type="submit" value="Sign Up">

    </form></div>
    <script>
  const form = document.querySelector('form');
  const fullNameInput = document.getElementById('Name');

  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting by default

    const fullName = fullNameInput.value.trim();

    if (!/^[a-zA-Z ]+$/.test(fullName)) {
      alert('Please enter a valid full name (letters and spaces only)');
      fullNameInput.focus();
      return false;
    }

    // The full name is valid, you can submit the form now
    form.submit();
  });
</script>
    <script>// get references to the password input and confirmation input
const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirm-password");

confirmPasswordInput.addEventListener("input", function() {
  const password = passwordInput.value;
  const confirmPassword = confirmPasswordInput.value;

  // check if the passwords match
  if (password === confirmPassword) {
    // passwords match, set the input field to green and clear the error message
    confirmPasswordInput.style.borderColor = "green";
    confirmPasswordInput.setCustomValidity("");
  } else {
    // passwords don't match, set the input field to red and display an error message
    confirmPasswordInput.style.borderColor = "red";
    confirmPasswordInput.setCustomValidity("Passwords do not match");
  }
});
</script>
  </body>
</html>
