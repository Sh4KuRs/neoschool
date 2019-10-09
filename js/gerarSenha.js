function gerarSenha() {

    var alfabeto = "abcdefghijklmnopqrstuvwxyz";

    // letras aleatorias
    var letras = [];
    for (var i = 0; i < 4; ++i)
        letras[i] = alfabeto.charAt(Math.floor(Math.random() * 25));

    // numero aleatorios
    var numeros = [];
    for (var i = 0; i < 4; ++i) {
        var sorteio = Math.floor(Math.random() * 9);

        if (sorteio === 0)
            sorteio = 1; // 1 - 9

        numeros[i] = sorteio;
    }

    var senha = letras.join('') + numeros.join('');

    document.getElementById('inputSenha').value = senha;
}

function gerarSenhaResponsavel() {

    var alfabeto = "abcdefghijklmnopqrstuvwxyz";

    // letras aleatorias
    var letras = [];
    for (var i = 0; i < 4; ++i)
        letras[i] = alfabeto.charAt(Math.floor(Math.random() * 25));

    // numero aleatorios
    var numeros = [];
    for (var i = 0; i < 4; ++i) {
        var sorteio = Math.floor(Math.random() * 9);

        if (sorteio === 0)
            sorteio = 1; // 1 - 9

        numeros[i] = sorteio;
    }

    var senha = letras.join('') + numeros.join('');

    document.getElementById('inputSenhaResponsavel').value = senha;
}