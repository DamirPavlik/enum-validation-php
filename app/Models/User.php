<?php

namespace app\Models;

class User extends BaseModel
{
    public function register(string $email, string $password): void
    {
        $password = password_hash(password: $password, algo: PASSWORD_DEFAULT);

        $email = $this->db->real_escape_string($email);
        $password = $this->db->real_escape_string($password);

        $this->db->query("INSERT INTO users (email, password) VALUES ('{$email}', '{$password}')");
    }

    public function exists(string $email): bool
    {
        $email = $this->db->real_escape_string($email);
        $result = $this->db->query("SELECT id FROM users WHERE email = '{$email}'");

        return $result->num_rows !== 0;
    }
}