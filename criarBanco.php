<?php

use andreaguayo\teste\service\admin\GerenciarUsuarios;
use andreaguayo\teste\service\persistence\Connection;

require_once 'vendor/autoload.php';

$cadastrarUsuario = new GerenciarUsuarios();
$connection = new Connection();

$stm = $connection->createConnection();

$queryTabela = "CREATE TABLE IF NOT EXISTS `andreaguayo_teste`.`usuarios` ( 
        `id` INT NOT NULL , 
        `nome_usuario` VARCHAR(50) NOT NULL , 
        `altura` FLOAT NOT NULL , 
        `lactose` BOOLEAN NOT NULL , 
        `peso` FLOAT NOT NULL , 
        `atleta` BOOLEAN NOT NULL , 
        UNIQUE `id` (`id`)
        );";

var_dump($stm->query($queryTabela));

$cadastrarUsuario->cadastrarUsuarioCSV('assets/arquivo_lanches.csv');
