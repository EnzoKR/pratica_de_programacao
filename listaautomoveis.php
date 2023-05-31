<!DOCTYPE html>
<html>
<head>
    <title>Lista de Automóveis</title>
    <!-- Inclua aqui o link para o CSS do Bootstrap ou outro framework de sua preferência -->
    <link rel="stylesheet" href="link_para_o_css_do_bootstrap.css">
</head>
<body>
    <h1>Lista de Automóveis</h1>
    <form method="GET" action="">
        <label for="buscar">Buscar por nome:</label>
        <input type="text" name="buscar" id="buscar">
        <input type="submit" value="Buscar">
    </form>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Placa</th>
                <th>Chassi</th>
                <th>Montadora</th>
            </tr>
        </thead>
        <tbody>
            <?php
           
            $conn = new mysqli("localhost", "usuario", "senha", "carros");

            if ($conn->connect_error) {
                die("Erro na conexão com o banco de dados: " . $conn->connect_error);
            }

            $buscar = $_GET['buscar'] ?? '';

            $query = "SELECT a.nome, a.placa, a.chassi, m.nome as montadora
                      FROM automoveis a
                      INNER JOIN montadora m ON a.montadora_codigo = m.codigo
                      WHERE a.nome LIKE '%$buscar%'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['placa'] . "</td>";
                    echo "<td>" . $row['chassi'] . "</td>";
                    echo "<td>" . $row['montadora'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum automóvel encontrado.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
