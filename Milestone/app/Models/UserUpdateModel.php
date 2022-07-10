<?php
namespace App\Models;

class UserUpdateModel
{
    private $id;
    private $username;
    private $password;
    private $role;
    private $suspended;

    function __construct($id, $username, $role, $suspended)
    {
        $this->id = $id;
        $this->username = $username;
        $this->role = $role;
        $this->suspended = $suspended;
    }

    public function getId() 
    {
        return $this->id;
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
    
    public function setId($id)
    {
        return $this->id = $id;
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

