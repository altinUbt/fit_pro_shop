<?php
include_once 'DBConnection.php';

class DBUser
{
    private $connection;

    function __construct()
    {
        $conn = new DBConnection;
        $this->connection = $conn;
    }

    function insertUser($user)
    {
        $conn = $this->connection->startConn();

        $id = $user->getId();
        $userName = $user->getUserName();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $sql = "INSERT INTO users (id,username,email,password,role) VALUES
        ('$id','$userName','$email','$password','user')";
        if (mysqli_query($conn, $sql)) {
            // echo 'Query executed succesfuly';
        } else {
            echo 'This is an Error' . mysqli_error($conn);
        }


    }

    function getUserEmailPass($email, $password)
    {
        $conn = $this->connection->startConn();

        $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";

        if ($statement = $conn->query($sql)) {
            $result = $statement->fetch_assoc();
            return $result;
        } else {
            return null;
        }
    }

    function getUserByEmailorUsername($email, $username)
    {
        $conn = $this->connection->startConn();

        $sql = "SELECT * FROM users WHERE email = '$email' or username ='$username'";

        if ($statement = $conn->query($sql)) {
            $result = $statement->fetch_assoc();
            return $result;
        } else {
            return null;
        }
    }
}

?>