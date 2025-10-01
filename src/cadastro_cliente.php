<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $data = $_POST["data"];
    $cpf = $_POST["cpf"];
    $rg = $_POST["rg"];
    $estado_civil = $_POST["estado_civil"];
    $cep = $_POST["cep"];
    $rua = $_POST["rua"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $telefone = $_POST["telefone"];
    $celular = $_POST["celular"];
    $novo_email = $_POST["email"];

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cadastro_clientes";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    $query = "INSERT INTO cliente (nome, data, cpf, rg, estado_civil, cep, rua, 
                     numero, bairro, cidade, estado, telefone, celular, email) VALUES
    ('$nome', '$data', '$cpf', '$rg' '$estado_civil', '$cep', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$telefone', '$celular', '$novo_email')";

    $insert = mysqli_query($conn, $query);

    if ($insert) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro";
    }

}


?>