<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Automóveis</title>
</head>
<body>
    <h1>Cadastro de Automóveis</h1>
    <form method="POST" action="salvar.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br><br>
        
        <label for="placa">Placa:</label>
        <input type="text" name="placa" id="placa" required><br><br>
        
        <label for="chassi">Chassi:</label>
        <input type="text" name="chassi" id="chassi" required><br><br>
        
        <label for="montadora">Montadora:</label>
        <select name="montadora" id="montadora" required>
            <?php

            $conn = new mysqli("localhost", "usuario", "senha", "carros");
            
            if ($conn->connect_error) {
                die("Erro na conexão com o banco de dados: " . $conn->connect_error);
            }
            
            $query = "SELECT codigo, nome FROM montadora";
            $result = $conn->query($query);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['codigo'] . "'>" . $row['nome'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>
        
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>