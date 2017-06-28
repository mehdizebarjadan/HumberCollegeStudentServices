<?php 
include 'header.php';
?>
<div class="col-md-12 text-center">
<h1>Admin Login</h2>
<form name="adminLogin" method="post" action="adminLoginAttempt.php" class="adminLogin">
         <div class="col-sm-12">
         <label for="username">Username: </label>
        <input type="text" name="username" class="login-form" />
        </div>
        <div class="col-sm-12">
        <label for="password">Password: </label>
        <input type="password" name="password" class="login-form" />
        </div>
        <div class="adminLogin">
        <input type="submit" name="login" value="Login" class="btn btn-default" />
        </div>
</form>
</div>
<?php
include 'footer.php'; ?>