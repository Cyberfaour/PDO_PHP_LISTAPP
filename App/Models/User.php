<?php

namespace App\Models;

class User
{
    private $id;
    private $username;
    private $password;
    private $mfa_secret;
    public function __construct($id = null, $username = null, $password = null, $mfa_secret = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->mfa_secret = $mfa_secret;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getMfaSecret()
    {
        return $this->mfa_secret;
    }

    public function getId()
    {
        return $this->id;
    }
}
