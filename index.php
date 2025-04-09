<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transportadora - Gestão de Frota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .tab-container {
            margin-bottom: 20px;
        }
        .tab-buttons {
            display: flex;
            margin-bottom: 10px;
        }
        .tab-btn {
            padding: 10px 20px;
            background-color: #ddd;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-right: 5px;
            border-radius: 5px 5px 0 0;
            transition: background-color 0.3s;
        }
        .tab-btn.active {
            background-color: #4CAF50;
            color: white;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
            position: sticky;
            top: 0;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e9e9e9;
        }
        .status {
            padding: 10px;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
            margin: 10px 0;
        }
        .success {
            background-color: #dff0d8;
            color: #3c763d;
        }
        .error {
            background-color: #f2dede;
            color: #a94442;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Transportadora - Gestão de Frota</h1>
        
        <div class="tab-container">
            <div class="tab-buttons">
                <button class="tab-btn active" onclick="openTab('caminhoes')">Caminhões</button>
                <button class="tab-btn" onclick="openTab('frotas')">Frotas</button>
                <button class="tab-btn" onclick="openTab('regioes')">Regiões</button>
            </div>
            
            <div id="caminhoes" class="tab-content active">
                <h2>Lista de Caminhões</h2>
                <?php
                try {
                    include_once("conexao.php");
                    $query = "SELECT c.*, f.nome_frota, r.regiao 
                              FROM caminhao c
                              JOIN frota f ON c.frota = f.id_frota
                              JOIN regiao r ON f.regiao = r.id_regiao
                              ORDER BY c.id_caminhao";
                    
                    $result = $conn->query($query);
                    $result->execute();
                    
                    if ($result->rowCount() > 0) {
                        echo '<table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Capacidade (kg)</th>
                                        <th>Frota</th>
                                        <th>Região</th>
                                        <th>Descritivo</th>
                                        <th>Consumo (km/l)</th>
                                    </tr>
                                </thead>
                                <tbody>';
                        
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr>
                                    <td>'.$row['id_caminhao'].'</td>
                                    <td>'.$row['nome_caminhao'].'</td>
                                    <td>'.$row['capacidade'].'</td>
                                    <td>'.$row['nome_frota'].'</td>
                                    <td>'.$row['regiao'].'</td>
                                    <td>'.$row['descritivo'].'</td>
                                    <td>'.$row['consumo'].'</td>
                                  </tr>';
                        }
                        
                        echo '</tbody></table>';
                    } else {
                        echo '<div class="status error">Nenhum caminhão encontrado na base de dados.</div>';
                    }
                } catch(PDOException $e) {
                    echo '<div class="status error">Falha ao listar caminhões: '.$e->getMessage().'</div>';
                }
                ?>
            </div>
            
            <div id="frotas" class="tab-content">
                <h2>Lista de Frotas</h2>
                <?php
                try {
                    include_once("conexao.php");
                    $query = "SELECT f.*, r.regiao 
                              FROM frota f
                              JOIN regiao r ON f.regiao = r.id_regiao
                              ORDER BY f.id_frota";
                    
                    $result = $conn->query($query);
                    $result->execute();
                    
                    if ($result->rowCount() > 0) {
                        echo '<table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Região</th>
                                    </tr>
                                </thead>
                                <tbody>';
                        
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr>
                                    <td>'.$row['id_frota'].'</td>
                                    <td>'.$row['nome_frota'].'</td>
                                    <td>'.$row['regiao'].'</td>
                                  </tr>';
                        }
                        
                        echo '</tbody></table>';
                    } else {
                        echo '<div class="status error">Nenhuma frota encontrada na base de dados.</div>';
                    }
                } catch(PDOException $e) {
                    echo '<div class="status error">Falha ao listar frotas: '.$e->getMessage().'</div>';
                }
                ?>
            </div>
            
            <div id="regioes" class="tab-content">
                <h2>Lista de Regiões</h2>
                <?php
                try {
                    include_once("conexao.php");
                    $query = "SELECT * FROM regiao ORDER BY id_regiao";
                    
                    $result = $conn->query($query);
                    $result->execute();
                    
                    if ($result->rowCount() > 0) {
                        echo '<table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Região</th>
                                    </tr>
                                </thead>
                                <tbody>';
                        
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr>
                                    <td>'.$row['id_regiao'].'</td>
                                    <td>'.$row['regiao'].'</td>
                                  </tr>';
                        }
                        
                        echo '</tbody></table>';
                    } else {
                        echo '<div class="status error">Nenhuma região encontrada na base de dados.</div>';
                    }
                } catch(PDOException $e) {
                    echo '<div class="status error">Falha ao listar regiões: '.$e->getMessage().'</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        function openTab(tabName) {
            const tabContents = document.getElementsByClassName('tab-content');
            for (let i = 0; i < tabContents.length; i++) {
                tabContents[i].classList.remove('active');
            }
            
            const tabButtons = document.getElementsByClassName('tab-btn');
            for (let i = 0; i < tabButtons.length; i++) {
                tabButtons[i].classList.remove('active');
            }
            
            document.getElementById(tabName).classList.add('active');
            event.currentTarget.classList.add('active');
        }
    </script>
</body>
</html>