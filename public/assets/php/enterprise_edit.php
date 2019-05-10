<?php
// SET CONFIG
include("config.php");

if (
    isset($_POST['id']) &&
    isset($_POST['nome-empreendimento']) &&
    isset($_POST['tipo']) &&
    isset($_POST['endereco']) &&
    isset($_POST['area-total']) &&
    isset($_POST['inicio']) &&
    isset($_POST['conclusao']) &&

    $_POST['id'] != '' &&
    $_POST['nome-empreendimento'] != '' &&
    $_POST['tipo'] != '' &&
    $_POST['endereco'] != '' &&
    $_POST['area-total'] != '' &&
    $_POST['inicio'] != '' &&
    $_POST['conclusao'] != ''
) {
    $id = strip_tags($_POST['id']);
    $nome_empreendimento = strip_tags($_POST['nome-empreendimento']);
    $tipo = strip_tags($_POST['tipo']);
    $endereco = strip_tags($_POST['endereco']);
    $area_total = strip_tags($_POST['area-total']);
    $inicio = strip_tags($_POST['inicio']);
    $conclusao = strip_tags($_POST['conclusao']);

    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql   = "UPDATE `takeoff1_test`.`enterprises` SET
    `name` = '" . $nome_empreendimento . "',
    `type` = '" . $tipo . "',
    `address` = '" . $endereco . "',
    `start` = '" . $inicio . "',
    `end` = '" . $conclusao . "',
    `area` = '" . $area_total . "'
    WHERE `enterprises`.`id` = '$id' LIMIT 1";

    $edit  = mysqli_query($connect, $sql);
    $connect->close();

    if ($edit) {
        echo json_encode(1);
    } else {
        echo json_encode(0);
    }
}
