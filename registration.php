<?php
require 'model/database.php';
require 'model/user.php';
require 'model/userDB.php';
include 'validation/validation.php';
include 'validation/validation_field.php';
include 'validation/validation_fields.php';
require 'header.php';


$first_name = '';
$last_name = '';
$email = '';
$phone = '';
$user_name = '';
$password = '';
$r_password = '';

$validation = new Validation();

$form_fields = $validation->getFields();
$form_fields->addField('first_name');
$form_fields->addField('last_name');
$form_fields->addField('user_name');
$form_fields->addField('password');
$form_fields->addField('r_password');
$form_fields->addField('email');
$form_fields->addField('phone');


if (isset($_POST['register'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $r_password = $_POST['r_password'];


    $validation->isCharsOnly('first_name', $first_name);
    $validation->isNotEmpty('last_name', $last_name);
    $validation->isCharsOnly('last_name', $last_name);
    $validation->isNotEmpty('user_name', $user_name);
    $validation->isPassword('password', $password, 8);
    $validation->isPasswordMatch('r_password', $r_password, $password);
    $validation->isEmail('email', $email);
    $validation->isInPattern('phone', $phone, '/^[0-9]\d{2}-\d{3}-\d{4}$/', 'Invalid Phone number');

    if ($form_fields->isValid()) {
        $user = new User($first_name, $last_name, $email, $phone, $user_name, $password);
        UserDB::InsertUser($user);
        header("location:index.php");

    }
}
?>
<div class="container">
    <h2>Registration <a href="user_login.php">Log In</a></h2>


    <form action="registration.php" method="post" id="registration" style="width: 500px;" enctype="multipart/form-data">

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name"
                   placeholder="Enter your first name" value="<?php echo $first_name ?>">
            <?php echo $form_fields->getField('first_name')->getHTMLError(); ?>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name"
                   placeholder="Enter your last name" value="<?php echo $last_name ?>">
        </div>
        <?php echo $form_fields->getField('last_name')->getHTMLError(); ?>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email"
                   value="<?php echo $email ?>">
        </div>
        <?php echo $form_fields->getField('email')->getHTMLError(); ?>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="ex: 416-222-1111"
                   value="<?php echo $phone ?>">
        </div>
        <?php echo $form_fields->getField('phone')->getHTMLError(); ?>

        <div class="form-group">
            <label for="user_name">User Name</label>
            <input type="text" class="form-control" name="user_name" id="user_name" placeholder="username"
                   value="<?php echo $user_name ?>">
        </div>
        <?php echo $form_fields->getField('user_name')->getHTMLError(); ?>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="password"
                   value="<?php echo $password ?>">
        </div>
        <?php echo $form_fields->getField('password')->getHTMLError(); ?>

        <div class="form-group">
            <label for="pwd">Confirm Password</label>
            <input type="password" class="form-control" name="r_password" id="r_password"
                   placeholder="Confirm password">
            <?php echo $form_fields->getField('r_password')->getHTMLError(); ?>
        </div>

        <button type="submit" class="btn btn-primary" name="register">Register</button>

    </form>
</div>

<?php
include 'footer.php';
?>
