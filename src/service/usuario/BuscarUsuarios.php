<?php

namespace andreaguayo\teste\service\usuario;

use andreaguayo\teste\service\persistence\Connection;

class BuscarUsuarios
{

    private $connection;

    public function __construct()
    {
        $connection = new Connection();
        $this->connection = $connection->createConnection();
    }
    
    public function buscarUsuarios(string $query): array
    {
        $stm = $this->connection->prepare($query);

        $stm->execute();

        return $stm->fetchAll();
    }
}
