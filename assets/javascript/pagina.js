//Ao finalizar o carregamento da pagina executa a busca de todos os usuarios e imprime na tabela.
window.onload = filtro();

//Envia os paramentros selecionados e recebe o resultado da busca
function filtro() {
    var filtro = $("form").serializeArray();

    $.ajax({
        type: "POST",
        url: 'filtrar',
        data: filtro,
        success: function (response) {
            adicionarUsuariosTabela(response)
        }
    });
}

//Funcao altera o estado do checkbox caso o usuario clique em qualquer parte do elemento
function alteraEstadoCheckbox(id) {
    checkbox = document.getElementById(id)
    if (checkbox.checked) {
        checkbox.checked = false
    } else {
        checkbox.checked = true
    }
}

//Funcao imprime os usuarios na tabela.
function adicionarUsuariosTabela(usuarios) {

    var tabela = document.getElementById('tabelaResultado');

    //String com os elementos do indice da tabela.
    var indice = '<tr class="indice"><td class="resultadoTd">Identificação</td><td class="resultadoTd">Nome do usuário</td><td class="resultadoTd">Altura</td><td class="resultadoTd">Lactose</td><td class="resultadoTd">Peso</td><td class="resultadoTd">Atleta</td><td class="resultadoTd">Excluir</td></tr>';

    if (usuarios.length <= 0) {
        tabelaUsuarios = '<tr class="resultadoTr"><td class="resultadoTd"></td><td class="resultadoTd"></td><td class="resultadoTd"></td><td class="resultadoTd">Não há usuários para mostrar</td><td class="resultadoTd"></td><td class="resultadoTd"></td><td class="resultadoTd"></td></tr>';
        tabela.innerHTML = indice + tabelaUsuarios;
        return
    }

    var tabelaUsuarios = ''
    usuarios.forEach(element => {

        if (element['lactose'] == 1) {
            lactose = 'Intolerante';
        } else {
            lactose = 'Tolerante';
        }
        if (element['atleta'] == 1) {
            atleta = 'Atleta';
        } else {
            atleta = 'Não é atleta';
        }

        //Adiciona os elementos da tabela com os valores dos usuarios.
        tabelaUsuarios += '<tr class="resultadoTr"><td class="resultadoTd">' + element['id'] + '</td><td class="resultadoTd">' + element['nome_usuario'] + '</td><td class="resultadoTd">' + element['altura'] + '</td><td class="resultadoTd">' + lactose + '</td><td class="resultadoTd">' + element['peso'] + '</td><td class="resultadoTd">' + atleta + '</td><td class="resultadoTd"><img class="botaoAcao" src="assets/images/excluir.svg" onclick="removerUsuario(' + element['id'] + ',this)" alt="Remover usuario"></td></tr>';
    });

    //Imprime o resultado no DOM.
    tabela.innerHTML = indice + tabelaUsuarios;
}

//Remove o usuario do banco.
function removerUsuario(id, obj) {
    $.ajax({
        type: "POST",
        url: 'admin/removerUsuario',
        data: { 'id': id },
        success: function (response) {
            console.log(response);
            if (response == 1) {
                removerUsuarioTabela(obj);
            }
        }
    });
}

//Remove o usuario da tabela no DOM.
function removerUsuarioTabela(obj) {
    var objTR = obj.parentNode.parentNode;
    var objTable = objTR.parentNode;
    var numeroTR = objTR.rowIndex;
    objTable.deleteRow(numeroTR);
}