
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show');
        }
    });
});



$(function () {
    $('[data-toggle="popover"]').popover()
});

$(function () {
    $('.popover-exemplo').popover({
      container: 'body'
    })
});

document.addEventListener('DOMContentLoaded', function() {
    // Obtém o valor do parâmetro 'url' da URL da página
    const urlParams = new URLSearchParams(window.location.search);
    const urlParamValue = urlParams.get('url');

    // Obtém todos os botões
    const botoes = document.querySelectorAll('.menuBtn');

    // Percorre os botões e verifica se o nome do botão corresponde ao valor do parâmetro 'url'
    botoes.forEach(botao => {
        botao.classList.forEach(classeSingle => {
            if (urlParamValue === classeSingle) {
                botao.classList.add('currentPageMenuBtn'); // Adiciona a classe CSS ao botão
            }
        })
    });
});


// Função para mostrar ou ocultar a div associada ao botão
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

function toggleContent(buttonId, text) {
    var content = document.getElementById(buttonId + "-content");
    var button = document.getElementById(buttonId);
    content.classList.toggle("open");
    button.classList.toggle("pressed");
}



var menuOpened = false;
var documents = document.documentElement || document.body;
//Toggle do menu formulário
function toggleNFEContent(keys) {

    if (menuOpened == false) {
        //Fazer aparecer
        var contents = document.getElementById(keys);
        contents.classList.toggle("openedKey");
        //Menu aberto
        menuOpened = true;
        //Scrollar página
        var elemento = document.querySelectorAll('mainTableMenuContainer');
        elemento.scrollIntoView({ behavior: 'smooth' });

    } else if (menuOpened == true) {
        var classe = ".openedKey";
        // Obter todos os elementos que possuem a classe desejada
        var elementos = document.querySelectorAll(classe);
        // Iterar sobre a lista de elementos e remover a classe
        elementos.forEach(function (elemento) {
            elemento.classList.remove("openedKey");
        });

        menuOpened = false;
    }
}

function copyToClipboard(id) {
    var textBox = document.getElementById(id);
    textBox.select();
    document.execCommand("copy");
    textBox.blur();
    $('#tooltip' + id).tooltip(options)
}


const hiddenElements = document.querySelectorAll('.hidden');
hiddenElements.forEach((el) => observer.observe(el));

function validarInputTracking() {
    var valor = $('#cpfInput').val();

    if (valor.length < 14) {
        alert('O valor precisa ter pelo menos 14 caracteres.');
        return false; // Impede o envio do formulário
    }

    return true; // Permite o envio do formulário
}

