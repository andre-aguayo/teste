<?php

namespace andreaguayo\teste\service\admin;

use andreaguayo\teste\model\Usuario;
use andreaguayo\teste\service\persistence\Connection;
use PDO;

class GerenciarUsuarios
{
    private $connection;

    public function __construct()
    {
        $connection = new Connection();
        $this->connection = $connection->createConnection();
    }

    public function cadastrarUsuario(Usuario $usuario): bool
    {
        $id = $usuario->getId();

        //Cadastra o usuario apenas se nao houver outro com o mesmo id cadastrado.
        if (!$this->verificarSeUsuarioExiste($id)) {
            $nome = $usuario->getNome();
            $altura = $usuario->getAltura();
            $lactose = $usuario->getLactose();
            $peso = $usuario->getPeso();
            $atleta = $usuario->getAtleta();

            $query = "INSERT INTO usuarios (id, nome_usuario, altura, lactose, peso, atleta) 
                    VALUES (:id, :nome, :altura, :lactose, :peso, :atleta);";

            $stm = $this->connection->prepare($query);

            $stm->bindParam(':id', $id, PDO::PARAM_INT);
            $stm->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stm->bindParam(':altura', $altura, PDO::PARAM_STR);
            $stm->bindParam(':lactose', $lactose, PDO::PARAM_STR);
            $stm->bindParam(':peso', $peso, PDO::PARAM_STR);
            $stm->bindParam(':atleta', $atleta, PDO::PARAM_STR);


            //Nao é uma boa pratica misturar o controler com os views mas para facilitar escreverei a resposta do cadastro aqui.
            echo "Usuario id: {$id} e nome {$nome} foi cadastrado!<br><br>";

            return $stm->execute();
        }

        //Nao é uma boa pratica misturar o controler com os views mas para facilitar escreverei a resposta do cadastro aqui.
        echo "Não foi possivel cadastrar o usuario id: {$id}, pois o id já esta cadastrado!<br><br>";

        return false;
    }

    public function removerUsuario(int $id): bool
    {
        $query = "DELETE FROM usuarios WHERE id = :id;";

        $stm = $this->connection->prepare($query);

        $stm->bindParam(':id', $id, PDO::PARAM_INT);

        return $stm->execute();
    }

    /*
    * Funcao com o objetivo de receber um arquivo CSV no formato fornecido no teste (Cabeçalho e usuarios da primeira linha em diante).
    *E cadastrar os usuarios fornecidos na tabela
    */
    public function cadastrarUsuarioCSV($caminhoDoArquivo): void
    {
        //Indica o delimitador e a cerca do arquivo CSV
        $delimitador = ';';
        $cerca = '"';

        $arquivo = fopen($caminhoDoArquivo, 'r');

        //Variavel utilizada para desconsiderar a primeira linha do arquivo.
        $primeiraLinha = true;

        if ($arquivo) {
            while (!feof($arquivo)) {

                //Retorna a linha da planilha com as informaçoes dos usuarios.
                $linha = fgetcsv($arquivo, 0, $delimitador, $cerca);

                if (!$linha) {
                    continue;
                }
                if (!$primeiraLinha) {

                    //Trata os valores de entrada, substituindo a virgula por ponto e convertendo para float.
                    $altura = floatval(str_replace(',', '.', $linha[2]));
                    $peso = floatval(str_replace(',', '.', $linha[4]));

                    //Cria o objeto Usuario para efetuar o cadastro.  
                    $usuario = new Usuario(
                        $linha[0],
                        $linha[1],
                        $altura,
                        $linha[3],
                        $peso,
                        $linha[5]
                    );
                    
                    //Cadastra o usuario no Banco de dados.
                    $this->cadastrarUsuario($usuario);
                }
                $primeiraLinha = false;
            }
            fclose($arquivo);
        }
    }

    /*
    *Assum-se q a identificacao do usuario seja unica para cada um, portanto se existir usuario com o id nao sera cadastrado.
    *Retorna false caso nao exista usuario com o id, e true caso exista.
    */
    public function verificarSeUsuarioExiste(int $id): bool
    {
        $query = "SELECT id FROM usuarios WHERE id = :id";

        $stm = $this->connection->prepare($query);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        if (empty($stm->fetchAll())) {
            return false;
        }
        return true;
    }
}
