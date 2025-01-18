<?php
include_once 'DBUser.php';
include_once 'UserEntity.php';

class SignInControll
{
    private $errorMessage;
    private $succedMessage;

    public function __construct()
    {
        $this->errorMessage = "";
        $this->succedMessage = "";
    }

    public function handleSignin()
    {
        if (isset($_POST["signinBtn"])) {
            $username = $_POST['username'] ? $_POST['username'] : '';
            $email = $_POST['email'] ? $_POST['email'] : '';
            $password = $_POST['password'] ? $_POST['password'] : '';

            if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
                $this->errorMessage = "Fill The Fields";
            }

            $id = rand(min: 100, max: 999);
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = new UserEntity($id, $username, $email, $password, 'user');

            $userDBHandler = new DBUser();
            $userExist = $userDBHandler->getUserByEmailorUsername($email, $username);
            if ($userExist) {
                $this->errorMessage = "User already exist";
                return;
            }
            $userDBHandler->insertUser($user);
            $this->succedMessage = "Registered succesfully";

        }
    }
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
    public function getSuccedMessage()
    {
        return $this->succedMessage;
    }
}

?>