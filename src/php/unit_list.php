<?php

function listUnits()
{

    include("config.php");
    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql = "SELECT `id`, `name`, `status`, `private_area`, `commom_area`, `value`, `min_value`, `vendible` FROM `takeoff1_test`.`units`";

    $arr = $connect->query($sql);
    $connect->close();

    return $arr;
}
