<?php

class UserDB
{
    //all Users
    public static function getUsers()
    {

        $db = Database::getDB();
        $query = 'SELECT * FROM user';
        $result = $db->query($query);

        $users = array();
        foreach ($result as $row) {
            $user = new User(
                $row['first_name'],
                $row['last_name'],
                $row['email'],
                $row['phone'],
                $row['user_name'],
                $row['password']
            );
            $user->setId($row['id']);
            $users[] = $user;
        }
        return $users;
    }

    // User by id
    public static function getUser($user_id)
    {
        $db = Database::getDB();
        $query = "SELECT * FROM user WHERE id = $user_id";
        $result = $db->query($query);

        $row = $result->fetch();
        $user = new User(
            $row['first_name'],
            $row['last_name'],
            $row['email'],
            $row['phone'],
            $row['user_name'],
            $row['password']

        );
        $user->setID($row['id']);
        return $user;
    }


    public static function InsertUser($user)
    {
        $db = Database::getDB();
        $first_name = $user->getFirstName();
        $last_name = $user->getLastName();
        $user_name = $user->getUserName();
        $password = $user->getPassword();
        $email = $user->getEmail();
        $phone = $user->getPhone();
        $query = "INSERT INTO user (first_name, last_name,email, phone, user_name, password)
                    VALUES ('$first_name', '$last_name','$email', '$phone', '$user_name', '$password' )";
        $row_count = $db->exec($query);
        return $row_count;
    }


    public static function UpdateUser($user, $user_id)
    {
        $db = Database::getDB();
        $first_name = $user->fetFirstName();
        $last_name = $user->getLastName();
        $user_name = $user->getUserName();
        $password = $user->getPassword();
        $email = $user->getEmail();
        $phone = $user->getPhone();
        $query = "UPDATE user SET
                 first_name = '$first_name',
                 last_name = '$last_name',
                 user_name = '$user_name',
                 password = '$password',
                 email = '$email',
                 phone = '$phone'
                 WHERE id = $user_id";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function DeleteUser($user_id)
    {
        $db = Database::getDB();
        $query = "DELETE FROM user WHERE id = $user_id";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function Login($user_name, $password) {
        $db = Database::getDB();
        $query = "SELECT * FROM user WHERE user_name = '$user_name'";
        $result = $db->query($query);
        //convert result into array
        $row = $result->fetch();
        $password_hash = $row['password'];
        if($password = $password_hash)
        {
            return $row['id'];
        }else{
            return false;
        }
    }

}
