<?php

use andreaguayo\teste\service\usuario\BuscarUsuarios;
use andreaguayo\teste\service\usuario\FiltrarUsuarios;

require_once 'vendor/autoload.php';

$filtrarUsuarios = new FiltrarUsuarios();
$buscarUsuarios = new BuscarUsuarios();

header('Content-Type: application/json; charset=utf-8');

//Retorna a query referente aos parametros fornecidos.
$busca = $filtrarUsuarios->processarFiltro($_POST);

//Retorna os usuarios buscados.
$usuarios = $buscarUsuarios->buscarUsuarios($busca);

//Imprime o json de resposta.
echo json_encode($usuarios, JSON_PRETTY_PRINT);
