<?php

function listReservations()
{

    include("config.php");
    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql = "SELECT `id`, `name`, `date`, `id_unit`, `id_client` FROM `takeoff1_test`.`reservations`";
    $arr = $connect->query($sql);
    $connect->close();

    return $arr;
}
