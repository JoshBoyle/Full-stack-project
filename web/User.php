<?php
require_once "UserDao.php";
class User
{

    const GUEST = "guest";
    const MEMBER = "member";
    const ADMIN = "admin";
    private $userid;
    private $username;
    private $email;
    private $password;
    private $date;
    private $permissions;

    public function __construct($userData)
    {
        $this->userid = $userData['user_id'];
        $this->username = $userData['user_name'];
        $this->password = $userData['password'];
        $this->email = $userData['email'];
        $this->date = $userData['sign_up_date'];
        $this->permissions = $userData['access'] ;
    }

   public function getUserName()
    {
        return $this->username;

    }


    public function getPass()
    {
        return $this->password;

    }

    public function getEmail()
    {
        return $this->email;
    }

    public function hasPermission($desiredPermission) {
        // Define the permission levels (adjust these as needed)
        $permissionLevels = [
            'admin' => 1,
            'guest' => 2,
            'member' => 3,
        ];

        if (array_key_exists($this->permissions, $permissionLevels) && array_key_exists($desiredPermission, $permissionLevels)) {
            return $permissionLevels[$this->permissions] <= $permissionLevels[$desiredPermission];
        }

        return false;
    }
} // end User