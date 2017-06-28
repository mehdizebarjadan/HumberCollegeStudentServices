<?php
//include 'header.php';
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $pass = $_POST['password'];
    if($pass == "" || $username== ""){
        echo '<p class="error">Fields cannot be null</p><br><a href="logintest.php">Back</a>';
    }
    else{
        echo '<p class="success">Successful login!</p>';
    }
}
//include 'footer.php';
?>