<?php

function listSales()
{

    include("config.php");
    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql = "SELECT `id`, `name`, `date`, `id_client`, `id_unit`, `unit_value`, `full_value` FROM `takeoff1_test`.`sales`";
    $arr = $connect->query($sql);
    $connect->close();

    return $arr;
}
