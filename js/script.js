'use strict';

//pegando elementos da pagina
const prodDropdown = document.getElementById('nav-produtos-dropdown');
const prodLabel = document.getElementById('nav-produtos-container');

//menu dropdown
prodLabel.addEventListener('mouseover', () => {
    prodDropdown.classList.remove('hidden');
})

prodLabel.addEventListener('mouseout', () => {
    prodDropdown.classList.add('hidden');
})