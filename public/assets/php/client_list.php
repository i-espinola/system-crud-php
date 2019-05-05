<?php

function listClients()
{

    include("config.php");
    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql = "SELECT `id`, `name`, `cpf`, `address`, `birth`, `income` FROM `takeoff1_test`.`clients`";
    $arr = $connect->query($sql);
    $connect->close();

    return $arr;
}
