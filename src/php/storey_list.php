<?php

function listStoreys()
{

    include("config.php");
    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql = "SELECT `id`, `name`, `position` FROM `takeoff1_test`.`storeys`";
    $arr = $connect->query($sql);
    $connect->close();

    return $arr;
}
