$(document).ready(function () {
    $('#cnpj').blur(function () {
        cnpj = $(this).val().replace(/\D/g, '');

        if (cnpj == '')
            alert('Cnpj Invalido');

        if (cnpj.length != 14)
            alert('Cnpj Invalido');

        // Elimina CNPJs invalidos conhecidos
        if (cnpj == "00000000000000" ||
            cnpj == "11111111111111" ||
            cnpj == "22222222222222" ||
            cnpj == "33333333333333" ||
            cnpj == "44444444444444" ||
            cnpj == "55555555555555" ||
            cnpj == "66666666666666" ||
            cnpj == "77777777777777" ||
            cnpj == "88888888888888" ||
            cnpj == "99999999999999")
            alert('Cnpj Invalido');

        // Valida DVs
        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0, tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0))
            alert('Cnpj Invalido');

        tamanho = tamanho + 1;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
            alert('Cnpj Invalido');

        $("#nome").val("Aguarde...");
        $("#cep").val("Aguarde...");
        $("#logradouro").val("Aguarde...");
        $("#bairro").val("Aguarde...");
        $("#cidade").val("Aguarde...");
        $("#estado").val("Aguarde...");
        $("#Contato").val("Aguarde...");
        $.getJSON("http://www.receitaws.com.br/v1/cnpj/" + cnpj + "?callback=?", function (dados) {
            $("#nome").val(dados.nome);
            $("#fantasia").val(dados.fantasia);
            $("#cep").val(dados.cep);
            $("#logradouro").val(dados.logradouro+", "+dados.numero);
            $("#bairro").val(dados.bairro);
            $("#cidade").val(dados.municipio);
            $("#estado").val(dados.uf);
            $("#contato").val(dados.telefone);

            $("#btnCadastrar").focus();
        });

    });

});