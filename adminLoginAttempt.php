<?php
if(isset($_POST['login'])){
session_start();
$user = $_POST['username'];
$pass = $_POST['password'];
//a simple way of encrypting a password
$dbpass = password_hash($pass, PASSWORD_BCRYPT);

//how to encrypt a password and then check if the encrypted password matches
//this will return 1 if true, 0 if false
password_verify($dbpass, PASSWORD_BCRYPT); 
include 'header.php';
if($user == "phil" && $pass=="testpass")
{   echo "Login Attempt <br />";
    echo '<h2 class="success">You have successfully logged in.</h2>'
    . '<h2><a href="admin/admin.php">Click here to get started</a></h2>';
    $_SESSION['username'] = "admin1";
}
else {
   echo "Login Attempt <br />";
   echo '<div class="col-md-12 text-center"><h2 class="error">Incorrect credentials. Access denied.</h2>';
   echo '<img src="images/crying.png" alt="" class="img-circle">';
   echo '<h3><a href="adminLogin.php">Back to Login</a></h3></div>';
   die(); 
    
}   
}
include 'footer.php';
?>

