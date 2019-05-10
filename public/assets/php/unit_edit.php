<?php
// SET CONFIG
include("config.php");

if (
    isset($_POST['id']) &&
    isset($_POST['nome-unidade']) &&
    isset($_POST['status']) &&
    isset($_POST['vendavel']) &&
    isset($_POST['area-privativa']) &&
    isset($_POST['area-comum']) &&
    isset($_POST['valor']) &&
    isset($_POST['valor-minimo']) &&

    $_POST['id'] != '' &&
    $_POST['nome-unidade'] != '' &&
    $_POST['status'] != '' &&
    $_POST['area-privativa'] != '' &&
    $_POST['area-comum'] != '' &&
    $_POST['valor'] != '' &&
    $_POST['valor-minimo'] != '' &&
    $_POST['vendavel'] != ''
) {
    $id = strip_tags($_POST['id']);
    $nome_unidade = strip_tags($_POST['nome-unidade']);
    $status = strip_tags($_POST['status']);
    $area_privada = strip_tags($_POST['area-privativa']);
    $area_comum = strip_tags($_POST['area-comum']);
    $valor = strip_tags($_POST['valor']);
    $valor_minimo = strip_tags($_POST['valor-minimo']);
    $vendavel = strip_tags($_POST['vendavel']);

    $connect = mysqli_connect($host, $user, $pass, $base);

    $sql   = "UPDATE `takeoff1_test`.`units` SET
    `name` = '" . $nome_unidade . "',
    `status` = '" . $status . "',
    `private_area` = '" . $area_privada . "',
    `commom_area` = '" . $area_comum . "',
    `value` = '" . $valor . "',
    `min_value` = '" . $valor_minimo . "',
    `vendible` = '" . $vendavel . "'
    WHERE `units`.`id` = '$id' LIMIT 1";

    $edit = mysqli_query($connect, $sql);
    $connect->close();

    if ($edit) {
        echo json_encode(1);
    } else {
        echo json_encode(0);
    }
}
