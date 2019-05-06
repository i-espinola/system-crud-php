<?php

function listProposals()
{

    include("config.php");
    $connect = mysqli_connect($host, $user, $pass, $base);
    $sql = "SELECT `id`, `name`, `date`, `id_reservation`, `id_client`, `id_unit`, `payment` FROM `takeoff1_test`.`proposals`";
    $arr = $connect->query($sql);
    $connect->close();

    return $arr;
}
