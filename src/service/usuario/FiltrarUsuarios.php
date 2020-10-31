<?php

namespace andreaguayo\teste\service\usuario;

/*
* Esta classe tem como objetivo criar a query dos parametros da busca inseridas pelo usuarios.
*/

class FiltrarUsuarios
{

    /*
    * Processa os parametros de busca vindos do formulario, adicionando a busca na query para ser buscada.
    */
    public function processarFiltro(array $filtro): string
    {
        if (empty($filtro)) {
            return "SELECT * FROM usuarios";
        }

        //Variavel onde a query sera armazenada.
        $query = "SELECT * FROM usuarios WHERE ";

        //Variavel responsavel por adicionar o 'AND' na query caso exista mais de um parametro na busca
        $and = "";

        foreach ($filtro as $parametro => $busca) {
            switch ($parametro) {
                case 'peso':
                    $query .= $and . '(' . $this->peso($busca) . ')';
                    break;
                case 'altura':
                    $query .= $and . '(' . $this->altura($busca) . ')';
                    break;
                case 'lactose':
                    $query .= $and . '(' . $this->lactose($busca) . ')';
                    break;
                case 'atleta':
                    $query .= $and . '(' . $this->atleta($busca) . ')';
                    break;
            }
            $and = ' AND ';
        }
        return $query;
    }

    private function peso(array $busca): string
    {
        //Variavel onde a query sera armazenada.
        $query = "";

        //Variavel responsavel por adicionar o 'OR' na query caso exista mais de um parametro na busca
        $or = "";

        foreach ($busca as $peso) {
            switch ($peso) {
                case 'abaixoPeso':
                    $query .= $or . " peso < 70 ";
                    break;
                case 'pesoIdeal':
                    $query .= $or . " (peso >= 70 AND peso <= 90) ";
                    break;
                case 'acimaPeso':
                    $query .= $or . " peso > 90 ";
                    break;
            }
            $or = ' OR ';
        }
        return $query;
    }

    private function altura(array $busca): string
    {
        //Variavel onde a query sera armazenada.
        $query = "";

        //Variavel responsavel por adicionar o 'OR' na query caso exista mais de um parametro na busca
        $or = "";

        foreach ($busca as $altura) {
            switch ($altura) {
                case 'pessoasBaixas':
                    $query .= $or . " altura < 1.6 ";
                    break;
                case 'pessoasMedianas':
                    $query .= $or . " (altura >= 1.6 AND altura <= 1.8) ";
                    break;
                case 'pessoasAltas':
                    $query .= $or . " altura > 1.8 ";
                    break;
            }
            $or = ' OR ';
        }
        return $query;
    }

    private function lactose(array $busca): string
    {
        //Variavel onde a query sera armazenada.
        $query = "";

        //Variavel responsavel por adicionar o 'OR' na query caso exista mais de um parametro na busca
        $or = "";

        foreach ($busca as $lactose) {
            switch ($lactose) {
                case 'intolerante':
                    $query .= $or . " lactose = 1 ";
                    break;
                case 'tolerante':
                    $query .= $or . " lactose = 0 ";
                    break;
            }
            $or = ' OR ';
        }

        return $query;
    }

    private function atleta(array $busca): string
    {
        //Variavel onde a query sera armazenada.
        $query = "";

        //Variavel responsavel por adicionar o 'OR' na query caso exista mais de um parametro na busca
        $or = "";

        foreach ($busca as $lactose) {
            switch ($lactose) {
                case 'atleta':
                    $query .= $or . " atleta = 1 ";
                    break;
                case 'naoAtleta':
                    $query .= $or . " atleta = 0 ";
                    break;
            }
            $or = ' OR ';
        }

        return $query;
    }
}
