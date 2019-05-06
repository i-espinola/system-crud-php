<?php
// SET CONFIG
include("config.php");

$action = ($_GET['action']);

if ($action === "add") {
    if (
        isset($_POST['nome-cliente']) &&
        isset($_POST['cpf']) &&
        isset($_POST['endereco']) &&
        isset($_POST['nascimento']) &&
        isset($_POST['renda']) &&

        $_POST['nome-cliente'] != '' &&
        $_POST['cpf'] != '' &&
        $_POST['endereco'] != '' &&
        $_POST['nascimento'] != '' &&
        $_POST['renda'] != ''
    ) {
        $nome_cliente = strip_tags($_POST['nome-cliente']);
        $cpf = strip_tags($_POST['cpf']);
        $endereco = strip_tags($_POST['endereco']);
        $nascimento = strip_tags($_POST['nascimento']);
        $renda = strip_tags($_POST['renda']);

        $connect = mysqli_connect($host, $user, $pass, $base);
        $sql   = "INSERT  INTO `takeoff1_test`.`clients` (
        `name`,
        `cpf`,
        `birth`,
        `address`,
        `income`
        )
        VALUE (
        '" . $nome_cliente . "',
        '" . $cpf . "',
        '" . $nascimento . "',
        '" . $endereco . "',
        '" . $renda . "'
        );";

        $push  = mysqli_query($connect, $sql) or die(error());
        $connect->close();

        if ($push) {
            echo "success";
        }
    }
} elseif ($action === "edit") {

    if (
        isset($_POST['id']) &&
        isset($_POST['nome-cliente']) &&
        isset($_POST['cpf']) &&
        isset($_POST['endereco']) &&
        isset($_POST['nascimento']) &&
        isset($_POST['renda']) &&

        $_POST['id'] != '' &&
        $_POST['nome-cliente'] != '' &&
        $_POST['cpf'] != '' &&
        $_POST['endereco'] != '' &&
        $_POST['nascimento'] != '' &&
        $_POST['renda'] != ''
    ) {
        $id = strip_tags($_POST['id']);
        $nome_cliente = strip_tags($_POST['nome-cliente']);
        $cpf = strip_tags($_POST['cpf']);
        $nascimento = strip_tags($_POST['nascimento']);
        $endereco = strip_tags($_POST['endereco']);
        $renda = strip_tags($_POST['renda']);

        $connect = mysqli_connect($host, $user, $pass, $base);
        $sql   = "UPDATE `takeoff1_test`.`clients` SET
        `name` = '" . $nome_cliente . "',
        `cpf` = '" . $cpf . "',
        `birth` = '" . $nascimento . "',
        `address` = '" . $endereco . "',
        `income` = '" . $renda . "'
        WHERE `clients`.`id` = '$id' LIMIT 1";

        $edit  = mysqli_query($connect, $sql) or die(error());
        $connect->close();

        if ($edit) {
            echo $edit;
        }
    }
} elseif ($action === "del") {

    $id = $_POST['id'];

    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql   = "DELETE FROM `takeoff1_test`.`clients` WHERE `id` = '$id' LIMIT 1";
    $del = $connect->query($sql);
    $connect->close();

    if ($del) {
        return "success";
    }
}
