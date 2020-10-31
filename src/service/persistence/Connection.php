<?php

namespace andreaguayo\teste\service\persistence;

use PDO;

class Connection
{
    public static function createConnection(): PDO
    {
        $connection = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . '; charset=utf8', USERNAME, PASSWORD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;
    }
}
