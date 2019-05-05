<?php
// SET CONFIG
include("config.php");

if (
    isset($_POST['nome-empreendimento']) &&
    isset($_POST['tipo']) &&
    isset($_POST['endereco']) &&
    isset($_POST['area-total']) &&
    isset($_POST['inicio']) &&
    isset($_POST['conclusao']) &&

    $_POST['nome-empreendimento'] != '' &&
    $_POST['tipo'] != '' &&
    $_POST['endereco'] != '' &&
    $_POST['area-total'] != '' &&
    $_POST['inicio'] != '' &&
    $_POST['conclusao'] != ''
) {
    $nome_empreendimento = strip_tags($_POST['nome-empreendimento']);
    $tipo = strip_tags($_POST['tipo']);
    $endereco = strip_tags($_POST['endereco']);
    $area_total = strip_tags($_POST['area-total']);
    $inicio = strip_tags($_POST['inicio']);
    $conclusao = strip_tags($_POST['conclusao']);

    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql   = "INSERT  INTO `takeoff1_test`.`enterprises` (
    `name`,
    `type`,
    `address`,
    `start`,
    `end`,
    `area`
    )
    VALUE (
    '" . $nome_empreendimento . "',
    '" . $tipo . "',
    '" . $endereco . "',
    '" . $inicio . "',
    '" . $conclusao . "',
    '" . $area_total . "'
    );";

    $push  = mysqli_query($connect, $sql) or die(error());

    if ($push) {
        echo "success";
    }

    $connect->close();
}


// isset($_POST['nome-bloco']) &&

// isset($_POST['nome-andar']) &&

// isset($_POST['nome-unidade']) &&
// isset($_POST['area-privativa']) &&
// isset($_POST['area-comum']) &&
// isset($_POST['valor']) &&
// isset($_POST['valor-minimo']) &&

// $_POST['nome-bloco'] != '' &&

// $_POST['nome-andar'] != '' &&
// $_POST['nome-unidade'] != '' &&
// $_POST['area-privativa'] != '' &&
// $_POST['area-comum'] != '' &&
// $_POST['valor'] != '' &&
// $_POST['valor-minimo'] != ''
