<?php
// SET CONFIG
include("config.php");

if (isset($_POST['id']) && isset($_POST['nome-bloco']) && $_POST['id'] != '' && $_POST['nome-bloco'] != '') {

    $id = strip_tags($_POST['id']);
    $nome_bloco = strip_tags($_POST['nome-bloco']);

    $connect = mysqli_connect($host, $user, $pass, $base);

    $sql   = "UPDATE `takeoff1_test`.`blocks` SET
    `name` = '" . $nome_bloco . "'
    WHERE `blocks`.`id` = '$id' LIMIT 1";

    $edit  = mysqli_query($connect, $sql) or die(error());

    if ($edit) {
        echo "success";
    }

    $connect->close();
}
