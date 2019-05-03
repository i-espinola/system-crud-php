<?php

if (
    isset($_POST['nome-empreendimento']) &&
    isset($_POST['tipo']) &&
    isset($_POST['endereco']) &&
    isset($_POST['area-total']) &&
    isset($_POST['inicio']) &&
    isset($_POST['conclusao']) &&

    isset($_POST['nome-bloco']) &&

    isset($_POST['nome-andar']) &&

    isset($_POST['nome-unidade']) &&
    isset($_POST['area-privativa']) &&
    isset($_POST['area-comum']) &&
    isset($_POST['valor']) &&
    isset($_POST['valor-minimo']) &&


    $_POST['nome-empreendimento'] != '' &&
    $_POST['endereco'] != '' &&
    $_POST['area-total'] != '' &&
    $_POST['inicio'] != '' &&
    $_POST['conclusao'] != '' &&
    $_POST['tipo'] != '' &&

    $_POST['nome-bloco'] != '' &&

    $_POST['nome-andar'] != '' &&
    $_POST['nome-unidade'] != '' &&
    $_POST['area-privativa'] != '' &&
    $_POST['area-comum'] != '' &&
    $_POST['valor'] != '' &&
    $_POST['valor-minimo'] != ''
) {

    $nome = strip_tags($_POST['nome']);
    $cidade = strip_tags($_POST['cidade']);
}
