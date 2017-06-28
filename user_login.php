<?php
require 'model/database.php';
require 'model/user.php';
require 'model/userDB.php';

include 'validation/validation.php';
include 'validation/validation_field.php';
include 'validation/validation_fields.php';

require 'header.php';


$user_name = '';
$password = '';
$error_msg = '';

$validation = new Validation();

$form_fields = $validation->getFields();
$form_fields->addField('user_name');
$form_fields->addField('password');

if(isset($_POST['user_login'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $validation->isNotEmpty('user_name', $user_name);
    $validation->isPassword('password', $password,8);

    if($form_fields->isValid()){
        if (UserDB::Login($user_name, $password) != false)
        {
            header("Location: index.php");
        }else{
            $error_msg =  'Invalid Username and Password';
        }
    }
}

?>
<p></p>
<div class="container">
    <h1>Log in!</h1>
    <br/>
    <form role="form" action="user_login.php" method="post" id="login_form" style="width: 300px;" enctype="multipart/form-data">

        <div class="form-group">
            <label for="user_name">User Name</label>
            <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter user name" value="<?php echo $user_name ?>">
            <?php echo $form_fields->getField('user_name')->getHTMLError(); ?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" value="<?php echo $password ?>" >
            <?php echo $form_fields->getField('password')->getHTMLError(); ?>
        </div>
        <button type="submit" class="btn btn-primary" name="user_login" id="user_login">Sign In</button>
        <a class="btn btn-default" href="index.php">Cancel</a>
    </form>
    <?php echo $error_msg; ?>
</div>


<?php
include 'footer.php';
?>
