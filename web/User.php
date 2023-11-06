<?php
require_once "UserDao.php";
class User
{

    const GUEST = "GUEST";
    const MEMBER = "MEMBER";
    const ADMIN = "ADMIN";
    private $userid;
    private $username;
    private $email;
    private $password;
    private $date;
    private $permissions;

    public function __construct($userid, $username, $password, $email, $date, $permissions)
    {
        $this->userid = $userid;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->date = $date;
        $this->permissions = $permissions;
    }


//    public function __construct()
//    {
//        if ($row = $query->fetch())
//
//        $this->username = $;
//        $this->password = $password;
//        $this->email = $email;
//        $this->date = $date;
//        $this->permissions = $permissions;
//    }

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

    public function hasPermission($permission)
    {
        // return true if permission is found
        return in_array($permission, $this->permissions);
    }

} // end User