<?php
namespace App\Models;

class UserModel
{
    private $id;
    private $username;
    private $password;
    private $role;
    private $suspended;

    function __construct($username, $password, $role, $suspended)
    {
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
        $this->suspended = $suspended;
    }
    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getSuspended()
    {
        return $this->suspended;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setSuspended($suspended)
    {
        $this->suspended = $suspended;
    }
}

