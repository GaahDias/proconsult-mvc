'use strict';
////////////////////////////////////////////////////////
//pegando elementos da pagina
const prodDropdown = document.getElementById('nav-produtos-dropdown');
const prodLabel = document.getElementById('nav-produtos-container');

const divMessage = document.getElementById('div-mensagem');
const textMessage = document.getElementById('p-mensagem');

////////////////////////////////////////////////////////
//menu dropdown
prodLabel.addEventListener('mouseover', () => {
    prodDropdown.classList.toggle('fade');

    setTimeout(function () {
        prodDropdown.style.display = 'block';
    }, 150);
})

prodLabel.addEventListener('mouseout', () => {
    prodDropdown.classList.toggle('fade');

    setTimeout(function () {
        prodDropdown.style.display = 'none';
    }, 150);
})

////////////////////////////////////////////////////////
//mensagem
if (typeof messageFlag != 'undefined') {

    //passando mensagem de acordo com a variavel message, que é passada no controller
    switch (message) {
        case 'registerSuccess':
            message = 'Produto cadastrado com sucesso!';
            break;
        case 'registerFail':
            message = 'Por favor, preencha todos os campos antes de cadastrar um produto.';
            break;
        case 'deleteSuccess':
            message = 'Produto deletado com sucesso!';
            break;
        case 'deleteFail':
            message = 'Algo deu errado... O produto não pode ser deletado.'
            break;
        case 'updateSuccess':
            message = 'Produto atualizado com sucesso!';
            break;
        case 'updateFail':
            message = 'Não foi possível atualizar o Produto.';
            break;
        default:
            message = 'Erro desconhecido...';
    }
    textMessage.textContent = message;

    //fazendo efeito de fade in and out
    divMessage.classList.toggle('fade');

    setTimeout(function () {
        divMessage.classList.toggle('fade');
    }, 5000);
}