<?php

// Aqui você se conecta ao banco
$mysqli = new mysqli('localhost', 'root', '', 'mydb');

// Executa uma consulta que pega cinco notícias
$sql = "SELECT `id`, `titulo` FROM `noticias` LIMIT 5";
$query = $mysqli->query($sql);
while ($dados = $query->mysqli_fetch_array()) {
    echo 'ID: ' . $dados['id'] . '';
    echo 'Título: ' . $dados['titulo'] . '';
}
echo 'Registros encontrados: ' . $query->num_rows;
