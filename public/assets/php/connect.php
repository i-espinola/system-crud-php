<?php

$host = 'robb0472.publiccloud.com.br';
$user = 'takeof_adm';
$pass = '123Mudar!@#';
$base = 'takeoff1_test';

// Conecta-se ao base de dados MySQL
$mysqli = new mysqli($host, $user, $pass, $banco);

// Caso algo tenha dado errado, exibe uma mensagem de erro
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

$foi = "INSERT INTO `takeoff1_test`.`enterprises` (`id`, `name`, `start`, `end`, `type`, `area`) VALUES ('1', 'xxx', '06/05/2019', '\'1\', \'xxx\', \'06/05/2019\', NULL, NULL, NULL\n', 'apto', '93')";

if ($foi) {
    echo "gravou";
}
