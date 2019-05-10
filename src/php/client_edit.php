<?php
// SET CONFIG
include("config.php");

if (
    isset($_POST['id']) &&
    isset($_POST['nome-cliente']) &&
    isset($_POST['cpf']) &&
    isset($_POST['endereco']) &&
    isset($_POST['nascimento']) &&
    isset($_POST['renda']) &&

    $_POST['id'] != '' &&
    $_POST['nome-cliente'] != '' &&
    $_POST['cpf'] != '' &&
    $_POST['endereco'] != '' &&
    $_POST['nascimento'] != '' &&
    $_POST['renda'] != ''
) {
    $id = strip_tags($_POST['id']);
    $nome_cliente = strip_tags($_POST['nome-cliente']);
    $cpf = strip_tags($_POST['cpf']);
    $nascimento = strip_tags($_POST['nascimento']);
    $endereco = strip_tags($_POST['endereco']);
    $renda = strip_tags($_POST['renda']);

    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql   = "UPDATE `takeoff1_test`.`clients` SET
    `name` = '" . $nome_cliente . "',
    `cpf` = '" . $cpf . "',
    `birth` = '" . $nascimento . "',
    `address` = '" . $endereco . "',
    `income` = '" . $renda . "'
    WHERE `clients`.`id` = '$id' LIMIT 1";

    $edit  = mysqli_query($connect, $sql);
    $connect->close();

    if ($edit) {
        echo json_encode(1);
    } else {
        echo json_encode(0);
    }
}
