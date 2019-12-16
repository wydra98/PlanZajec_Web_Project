<?php

class User {
    private $email;
    private $password;
    private $nick;

    public function __construct(
        string $email,
        string $password,
        string $nick,
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->nick = $nick;
    }

    public function getEmail(): string 
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getNick()
    {
        return $this->nick;
    }
}