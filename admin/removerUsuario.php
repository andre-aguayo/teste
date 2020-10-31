<?php

use andreaguayo\teste\service\admin\GerenciarUsuarios;

require_once __DIR__ . '../../vendor/autoload.php';

// Aqui viria a verificacao dos previlegios do usuario para apenas administradores removerem.

$gerenciarUsuarios = new GerenciarUsuarios();
echo $gerenciarUsuarios->removerUsuario($_POST['id']);
