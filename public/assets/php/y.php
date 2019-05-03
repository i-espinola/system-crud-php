<?php

// Aqui você se conecta ao banco
$mysqli = new mysqli('localhost', 'root', '', 'mydb');

// Executa uma consulta que deleta uma notícia
$sql = "DELETE FROM `noticias` WHERE `id` = 2";
$query = $mysqli->query($sql);
echo 'Registros afetados: ' . $query->affected_rows;
