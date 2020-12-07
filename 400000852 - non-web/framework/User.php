<?php

class User
{
    private string $name;
    private string $email;
    private string $id;

    public function __construct(string $name, string $email, int $id)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getID(): string
    {
        return $this->id;
    }
}