<?php

namespace app\Models;

class BaseModel
{
    protected $db;

    public function __construct()
    {
        $this->db = mysqli_connect("localhost", "root", "", "mvc-traits");
    }
}