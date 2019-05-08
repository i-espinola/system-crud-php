<?php
// SET CONFIG
include("config.php");

if (isset($_POST['nome-andar']) && isset($_POST['posicao']) && $_POST['nome-andar'] != '' && $_POST['posicao'] != '') {

    $nome_bloco = strip_tags($_POST['nome-andar']);
    $posicao = strip_tags($_POST['posicao']);

    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql   = "INSERT  INTO `takeoff1_test`.`storeys` (`name`, `position`) VALUE ('" . $nome_bloco . "', '" . $posicao . "');";

    $push  = mysqli_query($connect, $sql) or die(error());
    $connect->close();

    if ($push) {
        echo json_encode(success);
    } else {
        echo json_encode(fail);
    }
}
