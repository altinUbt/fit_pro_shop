<?php

class DBConnection
{
    private $server = "localhost";
    private $username = 'root';
    private $password = '';
    private $database = 'fit_pro_shop';


    function startConn()
    {
        if (!$conn = mysqli_connect($this->server, $this->username, $this->password, $this->database)) {
            return null;
        } else {
            echo 'Connected';
            return $conn;
        }
    }
}

?>