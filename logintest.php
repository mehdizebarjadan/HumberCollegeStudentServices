<?php //include 'header.php'; ?>

<h2>Login</h2>
<form name="login" method="post" action="loginSuccess.php">
         <label for="username">Username: </label>
        <input type="text" name="username" />
        <br>
        <label for="password">Password: </label>
        <input type="text" name="password" />
        <input type="submit" name="submit" value="submit" />
</form>

<?php //include 'footer.php'; ?>