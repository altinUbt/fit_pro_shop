<?php

// include_once 'UserDBHandler.php';
require_once 'DBUser.php';

class LoginControll
{
    private $errorMessage;

    public function __construct()
    {
        $this->errorMessage;
    }

    public function handleLogin()
    {
        if (isset($_POST['loginBtn'])) {
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            if (empty($email) || empty($password)) {
                $this->errorMessage = "Fill The Fields";
                return;
            }
            $userDBHandler = new DBUser();
            $user = $userDBHandler->getUserEmailPass($email, $password);
            if (empty($user)) {
                $this->errorMessage = "Email or Password invalid";
            } else {
                session_start();
                if ($user['role'] == "user") {
                    $_SESSION['useremail'] = $email;
                    header("Location: index.php");
                } else {
                    $_SESSION['adminemail'] = $email;
                    header("Location: dashboard.php");
                }
                exit;
            }
        }
    }
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
}
?>