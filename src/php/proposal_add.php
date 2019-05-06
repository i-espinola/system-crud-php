<?php
// SET CONFIG
include("config.php");

if (
    isset($_POST['nome-proposta']) &&
    isset($_POST['data-proposta']) &&
    isset($_POST['id-reserva']) &&
    isset($_POST['id-cliente']) &&
    isset($_POST['id-unidade']) &&
    isset($_POST['pagamento']) &&

    $_POST['nome-proposta'] != '' &&
    $_POST['data-proposta'] != '' &&
    $_POST['id-reserva'] != '' &&
    $_POST['id-cliente'] != '' &&
    $_POST['id-unidade'] != '' &&
    $_POST['pagamento'] != ''
) {
    $nome_proposta = strip_tags($_POST['nome-proposta']);
    $data_proposta = strip_tags($_POST['data-proposta']);
    $id_reserva = strip_tags($_POST['id-reserva']);
    $id_cliente = strip_tags($_POST['id-cliente']);
    $id_unidade = strip_tags($_POST['id-unidade']);
    $pagamento = strip_tags($_POST['pagamento']);

    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql   = "INSERT  INTO `takeoff1_test`.`proposals` (
    `name`,
    `date`,
    `id_reservation`,
    `id_client`,
    `id_unit`,
    `payment`
    )
    VALUE (
    '" . $nome_proposta . "',
    '" . $data_proposta . "',
    '" . $id_reserva . "',
    '" . $id_cliente . "',
    '" . $id_unidade . "',
    '" . $pagamento . "'
    );";

    $push  = mysqli_query($connect, $sql) or die(error());
    $connect->close();

    if ($push) {
        echo "success";
    }
}
