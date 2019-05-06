<?php
// SET CONFIG
include("config.php");

if (
    isset($_POST['id']) &&
    isset($_POST['nome-reserva']) &&
    isset($_POST['data-reserva']) &&
    isset($_POST['id-unidade']) &&
    isset($_POST['id-cliente']) &&


    $_POST['id'] != '' &&
    $_POST['nome-reserva'] != '' &&
    $_POST['data-reserva'] != '' &&
    $_POST['id-unidade'] != '' &&
    $_POST['id-cliente'] != ''
) {
    $id = strip_tags($_POST['id']);
    $nome_reserva = strip_tags($_POST['nome-reserva']);
    $data = strip_tags($_POST['data-reserva']);
    $id_unidade = strip_tags($_POST['id-unidade']);
    $id_cliente = strip_tags($_POST['id-cliente']);

    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql   = "UPDATE `takeoff1_test`.`reservations` SET
    `name` = '" . $nome_reserva . "',
    `date` = '" . $data . "',
    `id_unit` = '" . $id_unidade . "',
    `id_client` = '" . $id_cliente . "'
    WHERE `reservations`.`id` = '$id' LIMIT 1";

    $edit  = mysqli_query($connect, $sql) or die(error());
    $connect->close();

    if ($edit) {
        echo "success";
    }
}
