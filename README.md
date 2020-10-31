# Teste
O teste é a resolução do exercicio proposto pela Elofy. 

## Instalação
Primeiro: use o arquivo Config.php, que encontra-se em src/Config.php, para definir os parametros da conexão.

```php

/*
* Define as constantes de configuraçao da conexão da aplicação.
*/

//Nome do host
define('HOST', 'localhost'); //Exemplo: altere de 'localhots' para o local do seu banco de dados.

//Nome do banco de dados
define('DBNAME', 'andreaguayo_teste');

//Nome do usuario
define('USERNAME', 'root');

//Senha 
define('PASSWORD', '');
```
Segundo: acesse o arquivo criarBanco.php, que esta localizado na pasta raiz da aplicação para criar a tabela de usuarios e cadastrá-los no banco, e assim permitira a exibição na tabela.

encontra-se em /teste/criarBanco.php.

## Uso
Para filtrar os usuarios basta posicionar o mouse acima do campo "Filtro", e selecionar as opçoes desejadas.
Como por exemplo, usuarios com o peso ideal, e abaixo do peso q sejam atletas. E assim em diante.

## Tecnologias
A pagina utiliza jquery e ajax para realizar requisiçoes assincronas e assim preencher a tabela com os usuarios sem a necessidade de recarregar toda a pagina.

Foi utilizado o composer pela praticidade do autoload.php e para definir as constantes de configuração da aplicação.

## Observações
Nos arquivos removerUsuario.php e criarBanco.php, foi ignorado algumas questões de boas praticas como verificação do provilegio do usuario para cadastrar e remover usuarios apenas para demonstração de habilidades e conhecimenco de manipulação de dados do banco, e processamento de resposta
