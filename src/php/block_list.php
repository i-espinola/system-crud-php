<?php

function listBlocks()
{

    include("config.php");
    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql = "SELECT `id`, `name` FROM `takeoff1_test`.`blocks`";
    $arr = $connect->query($sql);

    $connect->close();
    return $arr;
}
