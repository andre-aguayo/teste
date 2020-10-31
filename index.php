<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste prático</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/javascript/pagina.js"></script>
    <link rel="stylesheet" href="assets/css/pagina.css">
</head>

<body>
    <div class="topo">
        <div class="titulo">Informações dos usuários</div>
    </div>
    <div class="barraSubtitulo">
        <div class="subtitulo">
            Usuários
        </div>
    </div>
    <div class="conteudo">
        <div class="barraTopo">
            <ul class="pesquisa">
                <li>
                    <div>
                        <img class="iconeFiltro" src="assets/images/filtro.svg">
                        <a>Filtro</a>
                    </div>
                    <ul>
                        <form class="filtrosUsuarios" name="filtroUsuarios" method="POST" action="filtrar">
                            <table>
                                <tr>
                                    <td>
                                        <p class="subtituloFiltro">Peso</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="botaoFiltro" onclick="alteraEstadoCheckbox('abaixoPeso')">
                                        <label class="tituloFiltro" for="abaixoPeso">Abaixo do peso</label>
                                        <input type="checkbox" name="peso[]" id="abaixoPeso" value="abaixoPeso">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="botaoFiltro" onclick="alteraEstadoCheckbox('pesoIdeal')">
                                        <label class="tituloFiltro" for="pesoIdeal">Peso ideal</label>
                                        <input type="checkbox" name="peso[]" id="pesoIdeal" value="pesoIdeal">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="botaoFiltro" onclick="alteraEstadoCheckbox('acimaPeso')">
                                        <label class="tituloFiltro" for="acimaPeso">Acima do peso</label>
                                        <input type="checkbox" name="peso[]" id="acimaPeso" value="acimaPeso">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="divisaoPesquisa"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="subtituloFiltro">Altura</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="botaoFiltro" onclick="alteraEstadoCheckbox('pessoasBaixas')">
                                        <label class="tituloFiltro" for="pessoasBaixas">Pessoas baixas</label>
                                        <input type="checkbox" name="altura[]" id="pessoasBaixas" value="pessoasBaixas">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="botaoFiltro" onclick="alteraEstadoCheckbox('pessoasMedianas')">
                                        <label class="tituloFiltro" for="pessoasMedianas">Pessoas medianas</label>
                                        <input type="checkbox" name="altura[]" id="pessoasMedianas" value="pessoasMedianas">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="botaoFiltro" onclick="alteraEstadoCheckbox('pessoasAltas')">
                                        <label class="tituloFiltro" for="pessoasAltas">Pessoas altas</label>
                                        <input type="checkbox" name="altura[]" id="pessoasAltas" value="pessoasAltas">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="divisaoPesquisa"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="subtituloFiltro">Intolerates a lactose</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="botaoFiltro" onclick="alteraEstadoCheckbox('intolerante')">
                                        <label class="tituloFiltro" for="intolerante">Sim</label>
                                        <input type="checkbox" name="lactose[]" id="intolerante" value="intolerante">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="botaoFiltro" onclick="alteraEstadoCheckbox('tolerante')">
                                        <label class="tituloFiltro" for="tolerante">Não</label>
                                        <input type="checkbox" name="lactose[]" id="tolerante" value="tolerante">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="divisaoPesquisa"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="subtituloFiltro">Atletas</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="botaoFiltro" onclick="alteraEstadoCheckbox('atleta')">
                                        <label class="tituloFiltro" for="atleta">Sim</label>
                                        <input type="checkbox" name="atleta[]" id="atleta" value="atleta">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="botaoFiltro" onclick="alteraEstadoCheckbox('naoAtleta')">
                                        <label class="tituloFiltro" for="naoAtleta">Não</label>
                                        <input type="checkbox" name="atleta[]" id="naoAtleta" value="naoAtleta">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </ul>
                </li>
                <li>
                    <button class="enviarBusca" type="button" onclick="filtro()">Buscar</button>
                </li>
            </ul>
        </div>
        <div id="usuarios" class="usuarios">
            <table class="tabelaResultado" id="tabelaResultado" cellspacing="0">
                <tr class="indice">
                    <td class="resultadoTd">Identificação</td>
                    <td class="resultadoTd">Nome do usuário</td>
                    <td class="resultadoTd">Altura</td>
                    <td class="resultadoTd">Lactose</td>
                    <td class="resultadoTd">Peso</td>
                    <td class="resultadoTd">Atleta</td>
                    <td class="resultadoTd"></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>