<?php
// SET CONFIG
include("config.php");

if (
    isset($_POST['nome-unidade']) &&
    isset($_POST['status']) &&
    isset($_POST['vendavel']) &&
    isset($_POST['area-privativa']) &&
    isset($_POST['area-comum']) &&
    isset($_POST['valor']) &&
    isset($_POST['valor-minimo']) &&

    $_POST['nome-unidade'] != '' &&
    $_POST['status'] != '' &&
    $_POST['vendavel'] != '' &&
    $_POST['area-privativa'] != '' &&
    $_POST['area-comum'] != '' &&
    $_POST['valor'] != '' &&
    $_POST['valor-minimo'] != ''
) {
    $nome_unidade = strip_tags($_POST['nome-unidade']);
    $status = strip_tags($_POST['status']);
    $area_privada = strip_tags($_POST['area-privativa']);
    $area_comum = strip_tags($_POST['area-comum']);
    $valor = strip_tags($_POST['valor']);
    $valor_minimo = strip_tags($_POST['valor-minimo']);
    $vendavel = strip_tags($_POST['vendavel']);

    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql   = "INSERT  INTO `takeoff1_test`.`units` (
    `name`,
    `status`,
    `private_area`,
    `commom_area`,
    `value`,
    `min_value`,
    `vendible`
    )
    VALUE (
    '" . $nome_unidade . "',
    '" . $status . "',
    '" . $area_privada . "',
    '" . $area_comum . "',
    '" . $valor . "',
    '" . $valor_minimo . "',
    '" . $vendavel . "'
    );";

    $push  = mysqli_query($connect, $sql) or die(error());
    $connect->close();

    if ($push) {
        echo "success";
    }
}
