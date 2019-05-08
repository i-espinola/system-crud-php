<?php
// SET CONFIG
include("config.php");

if (
    isset($_POST['nome-reserva']) &&
    isset($_POST['data-reserva']) &&
    isset($_POST['id-unidade']) &&
    isset($_POST['id-cliente']) &&


    $_POST['nome-reserva'] != '' &&
    $_POST['data-reserva'] != '' &&
    $_POST['id-unidade'] != '' &&
    $_POST['id-cliente'] != ''
) {
    $nome_reserva = strip_tags($_POST['nome-reserva']);
    $data = strip_tags($_POST['data-reserva']);
    $id_unidade = strip_tags($_POST['id-unidade']);
    $id_cliente = strip_tags($_POST['id-cliente']);

    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql   = "INSERT  INTO `takeoff1_test`.`reservations` (
    `name`,
    `date`,
    `id_unit`,
    `id_client`
    )
    VALUE (
    '" . $nome_reserva . "',
    '" . $data . "',
    '" . $id_unidade . "',
    '" . $id_cliente . "'
    );";

    $push  = mysqli_query($connect, $sql) or die(error());
    $connect->close();

    if ($push) {
        echo json_encode(success);
    } else {
        echo json_encode(fail);
    }
}
