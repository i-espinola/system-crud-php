<?php

function listEnterprises()
{

    include("config.php");
    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql = "SELECT `id`, `name`, `type`, `address`, `address`, `area`, `start`, `end` FROM `takeoff1_test`.`enterprises`";
    $arr = $connect->query($sql);

    $connect->close();
    return $arr;
}
