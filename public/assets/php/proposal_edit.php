<?php
// SET CONFIG
include("config.php");

if (
    isset($_POST['id']) &&
    isset($_POST['nome-proposta']) &&
    isset($_POST['data-proposta']) &&
    isset($_POST['id-reserva']) &&
    isset($_POST['id-cliente']) &&
    isset($_POST['id-unidade']) &&
    isset($_POST['pagamento']) &&

    $_POST['id'] != '' &&
    $_POST['nome-proposta'] != '' &&
    $_POST['data-proposta'] != '' &&
    $_POST['id-reserva'] != '' &&
    $_POST['id-cliente'] != '' &&
    $_POST['id-unidade'] != '' &&
    $_POST['pagamento'] != ''
) {
    $id = strip_tags($_POST['id']);
    $nome_proposta = strip_tags($_POST['nome-proposta']);
    $data_proposta = strip_tags($_POST['data-proposta']);
    $id_reserva = strip_tags($_POST['id-reserva']);
    $id_cliente = strip_tags($_POST['id-cliente']);
    $id_unidade = strip_tags($_POST['id-unidade']);
    $pagamento = strip_tags($_POST['pagamento']);

    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql   = "UPDATE `takeoff1_test`.`proposals` SET
    `name` = '" . $nome_proposta . "',
    `date` = '" . $data_proposta . "',
    `id_reservation` = '" . $id_reserva . "',
    `id_client` = '" . $id_cliente . "',
    `id_unit` = '" . $id_unidade . "',
    `payment` = '" . $pagamento . "'
    WHERE `proposals`.`id` = '$id' LIMIT 1";

    $edit  = mysqli_query($connect, $sql) or die(error());
    $connect->close();

    if ($edit) {
        echo "success";
    }
}
