<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senac Report</title>
    <link rel="stylesheet" href="assets/css/boletim.css">
    <style>
        button{
            margin-left:150px;
        }
    </style>
</head>
<body>
    
<!-- Painel do Menu Lateral -->
<div class="menu-lateral">
    <a href="painel.html" class="item-menu ativo">Voltar</a>
</div>

<div class="container">
    <header>
        <div class="logo">
            <img src="assets/img/download.png" alt="Senac Logo">
        </div>
        <div class="header-text">
            <p>SERVIÇO NACIONAL DE APRENDIZAGEM COMERCIAL</p>
            <p>DEPARTAMENTO REGIONAL DE PERNAMBUCO</p>
            <p>UNIDADE EDUCAÇÃO PROFISSIONAL DO PAULISTA</p>
            <p>CURSO TÉCNICO DE INFORMÁTICA INTEGRADO AO ENSINO MÉDIO</p>
            <p>CURSO TÉCNICO EM ANÁLISE E DESENVOLVIMENTO DE SISTEMAS INTEGRADO AO ENSINO MÉDIO</p>
        </div>
        <div class="date">
            <p>DATA</p>
            <p><time datetime="<?php echo date('c'); ?>"><?php echo date('d/m/Y'); ?></time></p>
        </div>
    </header>
    <main>
        <div class="student-info">
            <form method="POST" action="">
                <label for="student-name">NOME:</label>
                <input type="text" id="student-name" name="student-name" required>
                <button type="submit">Buscar</button>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "boletim";

                // Cria a conexão
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verifica a conexão
                if ($conn->connect_error) {
                    die("Falha na conexão: " . $conn->connect_error);
                }

                $student_name = $_POST['student-name'];

                // Consulta SQL para buscar o aluno pelo nome
                $sql = "SELECT * FROM alunosa1B WHERE nome_aluno LIKE '%$student_name%'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<p>NOME: <span>{$row['nome_aluno']}</span></p>";
                        echo "<p>TURMA: <span>B</span></p>";
                        echo "<p>ANO: <span>2024</span></p>";

                        // Consulta para buscar as notas do aluno
                        $aluno_id = $row['aluno_id'];
                        $notas_sql = "SELECT d.nome AS disciplina, n.unidade, n.av1, n.av2, n.conceito, n.pos_noa
                                      FROM notas_1B n
                                      JOIN disciplinas d ON n.id_disciplina = d.id_disciplina
                                      WHERE n.aluno_id = $aluno_id
                                      ORDER BY n.unidade";
                        $notas_result = $conn->query($notas_sql);

                        if ($notas_result->num_rows > 0) {
                            echo '<table>
                                    <thead>
                                        <tr>
                                            <th rowspan="2">COMPONENTE CURRICULAR</th>
                                            <th colspan="4">1ª UNIDADE</th>
                                            <th colspan="4">2ª UNIDADE</th>
                                            <th colspan="4">3ª UNIDADE</th>
                                            <th rowspan="2">MENÇÃO FINAL ANUAL</th>
                                            <th rowspan="2">TOTAL DE FALTAS</th>
                                            <th rowspan="2">MENÇÃO FINAL ANUAL PÓS NOA</th>
                                            <th rowspan="2">RESULTADO</th>
                                        </tr>
                                        <tr>
                                            <th>AV1</th>
                                            <th>AV2</th>
                                            <th>MENÇÃO UNIDADE</th>
                                            <th>MENÇÃO PÓS NOA</th>
                                            <th>AV1</th>
                                            <th>AV2</th>
                                            <th>MENÇÃO UNIDADE</th>
                                            <th>MENÇÃO PÓS NOA</th>
                                            <th>AV1</th>
                                            <th>AV2</th>
                                            <th>MENÇÃO UNIDADE</th>
                                            <th>MENÇÃO PÓS NOA</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

                            $disciplinas = [];
                            while ($nota_row = $notas_result->fetch_assoc()) {
                                $disciplinas[$nota_row['disciplina']][$nota_row['unidade']] = $nota_row;
                            }

                            foreach ($disciplinas as $disciplina => $unidades) {
                                echo "<tr><td>{$disciplina}</td>";
                                for ($i = 1; $i <= 3; $i++) {
                                    if (isset($unidades[$i])) {
                                        echo "<td>{$unidades[$i]['av1']}</td><td>{$unidades[$i]['av2']}</td><td>{$unidades[$i]['conceito']}</td><td>{$unidades[$i]['pos_noa']}</td>";
                                    } else {
                                        echo "<td></td><td></td><td></td><td></td>";
                                    }
                                }
                                echo "<td></td><td></td><td></td><td></td></tr>";
                            }
                            echo '</tbody></table>';
                        } else {
                            echo "<p>Nenhuma nota encontrada para o aluno.</p>";
                        }
                    }
                } else {
                    echo "<p>Nenhum aluno encontrado com o nome '$student_name'.</p>";
                }

                $conn->close();
            }
            ?>
        </div>
        <footer>
            <p>COORDENAÇÃO PEDAGÓGICA</p>
        </footer>
    </main>
</div>
<button onclick="window.print()">Imprimir</button>
</body>
</html>
