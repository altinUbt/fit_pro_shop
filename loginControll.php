<?php

// include_once 'UserDBHandler.php';
include_once 'DBUser.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['loginBtn'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    if (empty($email) || empty($password)) {
        echo 'Fill the fields';
    } else {
        $email = $_POST['email'];
        $password = $_POST["password"];

        $dbUser = new DBUser();
        $user = $dbUser->getUserEmailPass($email, $password);

        if (empty($user)) {
            echo "Incorrect credidentials";
        } else {
            $_SESSION['useremail'] = $email;
            header("Location:index.php");
            exit;
        }
    }

}

?>