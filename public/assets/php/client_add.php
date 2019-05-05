<?php
// SET CONFIG
include("config.php");

if (
    isset($_POST['nome-cliente']) &&
    isset($_POST['cpf']) &&
    isset($_POST['endereco']) &&
    isset($_POST['nascimento']) &&
    isset($_POST['renda']) &&

    $_POST['nome-cliente'] != '' &&
    $_POST['cpf'] != '' &&
    $_POST['endereco'] != '' &&
    $_POST['nascimento'] != '' &&
    $_POST['renda'] != ''
) {
    $nome_cliente = strip_tags($_POST['nome-cliente']);
    $cpf = strip_tags($_POST['cpf']);
    $endereco = strip_tags($_POST['endereco']);
    $nascimento = strip_tags($_POST['nascimento']);
    $renda = strip_tags($_POST['renda']);

    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql   = "INSERT  INTO `takeoff1_test`.`clients` (
    `name`,
    `cpf`,
    `birth`,
    `address`,
    `income`
    )
    VALUE (
    '" . $nome_cliente . "',
    '" . $cpf . "',
    '" . $nascimento . "',
    '" . $endereco . "',
    '" . $renda . "'
    );";

    $push  = mysqli_query($connect, $sql) or die(error());
    $connect->close();

    if ($push) {
        echo "success";
    }
}
