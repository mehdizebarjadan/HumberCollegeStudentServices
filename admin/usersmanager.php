<?php

//include '../header.php';
include 'adminNav.php';

require '../model/database.php';
require '../model/user.php';
require '../model/userDB.php';

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    UserDB::DeleteUser($user_id);
    header("Location: usersmanager.php");
}



?>

<div id="main">
    <article class="placeholder">
        <h4>Users</h4>
    </article>

    <table class="table table-responsive table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $users = UserDB::getUsers();
        foreach ($users as $user):
            ?>
            <tr>
                <td><a href="contact_viewMessage.php?id=<?php echo $user->getID();?>">
                        <?php echo $user->getFirstName();?>  <?php echo $user->getLastName() ;?>
                    </a>
                </td>
                <td><?php echo $user->getEmail(); ?></td>
                <td><?php echo $user->getPhone(); ?></td>
                <td>
                    <form action="usersmanager.php" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user->getID(); ?>"/>
                        <button type="submit" value="Delete">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


</div>


<?php //include '../footer.php'; ?>
