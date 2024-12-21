<?php
include_once 'DBUser.php';
include_once 'UserEntity.php';

$username = $email = $password = "";

if (isset($_POST['signinBtn'])) {
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo "<pre style='color:red; font-size: 14px;'>Fill The Fields</pre>";
    } else {
        $id = rand(min: 100, max: 999);
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new UserEntity($id, $username, $email, $password);

        $userDBHandler = new DBUser();
        $userExist = $userDBHandler->getUserByEmailorUsername($email, $username);
        if ($userExist) {
            echo "User already exist";
        } else {
            $userDBHandler->insertUser($user);
        }
    }
}

?>