<?php
// SET CONFIG
include("config.php");

if (isset($_POST['id']) && isset($_POST['nome-andar']) && isset($_POST['posicao']) && $_POST['id'] != '' && $_POST['nome-andar'] != '' && $_POST['posicao'] != '') {

    $nome_andar = strip_tags($_POST['nome-andar']);
    $posicao = strip_tags($_POST['posicao']);
    $id = strip_tags($_POST['id']);

    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql   = "UPDATE `takeoff1_test`.`storeys` SET
    `name` = '" . $nome_andar . "',
    `position` = '" . $posicao . "'
    WHERE `storeys`.`id` = '$id' LIMIT 1";

    $edit = mysqli_query($connect, $sql) or die(error());
    $connect->close();

    if ($edit) {
        echo json_encode(success);
    } else {
        echo json_encode(fail);
    }
}
