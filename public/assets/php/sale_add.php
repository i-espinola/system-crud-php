<?php
// SET CONFIG
include("config.php");

if (
    isset($_POST['nome-venda']) &&
    isset($_POST['data-venda']) &&
    isset($_POST['id-cliente']) &&
    isset($_POST['id-unidade']) &&
    isset($_POST['valor-unidade']) &&
    isset($_POST['valor-total']) &&

    $_POST['nome-venda'] != '' &&
    $_POST['data-venda'] != '' &&
    $_POST['id-cliente'] != '' &&
    $_POST['id-unidade'] != '' &&
    $_POST['valor-unidade'] != '' &&
    $_POST['valor-total'] != ''
) {
    $nome_venda = strip_tags($_POST['nome-venda']);
    $data_venda = strip_tags($_POST['data-venda']);
    $id_cliente = strip_tags($_POST['id-cliente']);
    $id_unidade = strip_tags($_POST['id-unidade']);
    $valor_unidade = strip_tags($_POST['valor-unidade']);
    $valor_total = strip_tags($_POST['valor-total']);

    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql   = "INSERT  INTO `takeoff1_test`.`sales` (
    `name`,
    `date`,
    `id_client`,
    `id_unit`,
    `unit_value`,
    `full_value`
    )
    VALUE (
    '" . $nome_venda . "',
    '" . $data_venda . "',
    '" . $id_cliente . "',
    '" . $id_unidade . "',
    '" . $valor_unidade . "',
    '" . $valor_total . "'
    );";

    $push  = mysqli_query($connect, $sql) or die(error());
    $connect->close();

    if ($push) {
        echo "success";
    }
}
