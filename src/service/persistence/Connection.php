<?php

namespace andreaguayo\teste\service\persistence;

use PDO;

class Connection
{
    public static function createConnection(): PDO
    {
        $connection = new PDO('mysql:host=localhost;dbname=andreaguayo_teste; charset=utf8', 'root', '');
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;
    }
}
