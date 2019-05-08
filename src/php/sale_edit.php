<?php
// SET CONFIG
include("config.php");

if (
    isset($_POST['id']) &&
    isset($_POST['nome-venda']) &&
    isset($_POST['data-venda']) &&
    isset($_POST['id-cliente']) &&
    isset($_POST['id-unidade']) &&
    isset($_POST['valor-unidade']) &&
    isset($_POST['valor-total']) &&

    $_POST['id'] != '' &&
    $_POST['nome-venda'] != '' &&
    $_POST['data-venda'] != '' &&
    $_POST['id-cliente'] != '' &&
    $_POST['id-unidade'] != '' &&
    $_POST['valor-unidade'] != '' &&
    $_POST['valor-total'] != ''
) {
    $id = strip_tags($_POST['id']);
    $nome_venda = strip_tags($_POST['nome-venda']);
    $data_venda = strip_tags($_POST['data-venda']);
    $id_cliente = strip_tags($_POST['id-cliente']);
    $id_unidade = strip_tags($_POST['id-unidade']);
    $valor_unidade = strip_tags($_POST['valor-unidade']);
    $valor_total = strip_tags($_POST['valor-total']);

    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql   = "UPDATE `takeoff1_test`.`sales` SET
    `name` = '" . $nome_venda . "',
    `date` = '" . $data_venda . "',
    `id_client` = '" . $id_cliente . "',
    `id_unit` = '" . $id_unidade . "',
    `unit_value` = '" . $valor_unidade . "',
    `full_value` = '" . $valor_total . "'
    WHERE `sales`.`id` = '$id' LIMIT 1";

    $edit  = mysqli_query($connect, $sql) or die(error());
    $connect->close();

    if ($edit) {
        echo json_encode(success);
    } else {
        echo json_encode(fail);
    }
}
