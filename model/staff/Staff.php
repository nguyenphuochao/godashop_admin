<?php
class Staff
{
    protected $id;
    protected $role_id;
    protected $name;
    protected $mobile;
    protected $username;
    protected $password;
    protected $email;
    protected $is_active;

    function __construct($id, $role_id, $name, $mobile, $username, $password, $email, $is_active)
    {
        $this->id = $id;
        $this->role_id = $role_id;
        $this->name = $name;
        $this->mobile = $mobile;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->is_active = $is_active;
    }

    // get attribute
    function getID()
    {
        return $this->id;
    }
    function getRoleID()
    {
        return $this->role_id;
    }
    function getName()
    {
        return $this->name;
    }
    function getMobile()
    {
        return $this->mobile;
    }
    function getUsername()
    {
        return $this->username;
    }
    function getPassword()
    {
        return $this->password;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getIsActive()
    {
        return $this->is_active;
    }
}
