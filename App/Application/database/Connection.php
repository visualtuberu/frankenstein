<?php

namespace App\Application\database;

use App\application\Config\Config;

class Connection
{
    public function connect()
    {
        return new \PDO(
            'mysql:host=localhost;dbname=frank01;user=root;password=',
        );
    }
}