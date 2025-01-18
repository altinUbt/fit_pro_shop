<?php

class UserEntity
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $role;


    function __construct($id, $username, $email, $password, $role)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    function getId()
    {
        return $this->id;
    }
    function getUsername()
    {
        return $this->username;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getPassword()
    {
        return $this->password;
    }
    function getRole()
    {
        return $this->role;
    }


    function __tostring()
    {
        return "User: " . $this->username . " - " . $this->email;
    }
}

?>