<?php
namespace App\Services\Business;

use App\Models\UserModel;
use App\Services\Data\SecurityDAO;

class SecurityService
{
    private $dao;
    
    function __construct() {
        $this->dao = new SecurityService('users');
    }
    
    public function login(UserModel $user) {
        $dao = new SecurityDAO();
        $query = $dao->findByUser($user);
        return (isset($query->ID));
    }
        
}

