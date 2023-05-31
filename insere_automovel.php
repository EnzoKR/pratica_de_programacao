<?php

$conn = new mysqli("localhost", "usuario", "senha", "carros");

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$placa = $_POST['placa'];
$chassi = $_POST['chassi'];
$montadora_codigo = $_POST['montadora'];

$query = "INSERT INTO automoveis (nome, placa, chassi, montadora_codigo) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssi", $nome, $placa, $chassi, $montadora_codigo);

if ($stmt->execute()) {
    echo "Automóvel cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o automóvel: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
