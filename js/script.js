'use strict';

//pegando elementos da pagina
const prodDropdown = document.getElementById('nav-produtos-dropdown');
const prodLabel = document.getElementById('nav-produtos-container');

const divMessage = document.getElementById('div-mensagem-erro');
const textMessage = document.getElementById('p-mensagem-erro');

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

//mensagem de erro
if (typeof messageFlag != 'undefined') {
    divMessage.classList.toggle('fade');

    switch (message) {
        case 'register':
            message = 'Por favor, preencha todos os campos antes de cadastrar um produto.';
            break;
        default:
            message = 'Erro desconhecido...';
    }

    textMessage.textContent = message;

    setTimeout(function () {
        divMessage.classList.toggle('fade');
    }, 5000);
}