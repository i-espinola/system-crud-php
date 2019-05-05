<?php
// SET CONFIG
include("config.php");

if (isset($_POST['nome-bloco']) && $_POST['nome-bloco'] != '') {

    $nome_bloco = strip_tags($_POST['nome-bloco']);

    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql   = "INSERT  INTO `takeoff1_test`.`blocks` (`name`) VALUE ('" . $nome_bloco . "');";
    $push  = mysqli_query($connect, $sql) or die(error());

    if ($push) {
        echo "success";
    }

    $connect->close();
}
