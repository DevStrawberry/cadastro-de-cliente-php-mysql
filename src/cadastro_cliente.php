<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Detalhes da Conexão com o Banco de Dados
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cadastro_clientes";

    // Cria a conexão (usando o estilo orientado a objetos do mysqli)
    $conn = new mysqli($hostname, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        // Encerra a execução e exibe o erro de conexão
        die("Falha na conexão: " . $conn->connect_error);
    }
    
    // 2. Coleta dos Dados do Formulário
    $nome = $_POST["nome"] ?? '';
    $data = $_POST["data"] ?? '';
    $cpf = $_POST["cpf"] ?? '';
    $rg = $_POST["rg"] ?? '';
    $estado_civil = $_POST["estado_civil"] ?? '';
    $cep = $_POST["cep"] ?? '';
    $rua = $_POST["rua"] ?? '';
    $numero = $_POST["numero"] ?? '';
    $bairro = $_POST["bairro"] ?? '';
    $cidade = $_POST["cidade"] ?? '';
    $estado = $_POST["estado"] ?? '';
    $telefone = $_POST["telefone"] ?? '';
    $celular = $_POST["celular"] ?? '';
    $email = $_POST["email"] ?? '';
    $profissao = $_POST["profissao"] ?? ''; // Campo 'profissao' incluído

    // 3. Prepara a Instrução SQL (Usando '?' como placeholders)
    $sql = "INSERT INTO cliente (
                nome, data, cpf, rg, estado_civil, cep, rua, numero, 
                bairro, cidade, estado, telefone, celular, email, profissao
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        // Encerra em caso de erro na preparação da SQL
        die("Erro na preparação SQL: " . $conn->error);
    }
    
    // 4. Associa os parâmetros (Bind parameters)
    /* * A string "sssssssssssssss" define o tipo de cada variável:
     * 's' = string (o tipo mais seguro para a maioria dos dados de formulário)
     * Temos 15 parâmetros, portanto, 15 's'.
     */
    $bind_types = "sssssssssssssss"; 

    $stmt->bind_param(
        $bind_types, 
        $nome, $data, $cpf, $rg, $estado_civil, $cep, $rua, $numero, 
        $bairro, $cidade, $estado, $telefone, $celular, $email, $profissao
    );

    // 5. Executa a Instrução e Verifica o Resultado
    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    // 6. Fecha o statement e a conexão
    $stmt->close();
    $conn->close();
}

?>
