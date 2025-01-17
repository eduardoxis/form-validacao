<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $cep = $_POST['cep'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];

    // Funções de validação
    function validar_nome($nome) {
        return !empty($nome) && preg_match("/^[a-zA-Z\s]+$/", $nome);
    }

    function validar_endereco($endereco) {
        return !empty($endereco);
    }

    function validar_cep($cep) {
        return !empty($cep) && preg_match("/^\d{2}\.\d{3}-\d{3}$/", $cep);
    }

    function validar_email($email) {
        return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function validar_telefone($telefone) {
        return !empty($telefone) && preg_match("/^\(\d{2}\) \d{5}-\d{4}$/", $telefone);
    }

    function validar_cpf($cpf) {
        return !empty($cpf) && preg_match("/^\d{11}$/", $cpf);
    }

    // Verifica as validações
    $erros = [];

    if (!validar_nome($nome)) {
        $erros[] = "O nome é inválido ou vazio. Apenas letras são permitidas.";
    }

    if (!validar_endereco($endereco)) {
        $erros[] = "O endereço não pode ser vazio.";
    }

    if (!validar_cep($cep)) {
        $erros[] = "O CEP é inválido. Use o formato 00.000-000.";
    }

    if (!validar_email($email)) {
        $erros[] = "O e-mail é inválido.";
    }

    if (!validar_telefone($telefone)) {
        $erros[] = "O telefone é inválido. Use o formato (XX) XXXXX-XXXX.";
    }

    if (!validar_cpf($cpf)) {
        $erros[] = "O CPF é inválido. Apenas números são permitidos.";
    }

    // Se houver erros, mostra-os, caso contrário, exibe sucesso
    if (count($erros) > 0) {
        echo "<h2>Erros encontrados:</h2><ul>";
        foreach ($erros as $erro) {
            echo "<li>$erro</li>";
        }
        echo "</ul>";
    } else {
        echo "<h2>Formulário enviado com sucesso!</h2>";
    }
}
?>
