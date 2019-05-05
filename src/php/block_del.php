<?php
// SET CONFIG
include("config.php");

$id = $_POST['id'];

$connect = mysqli_connect($host, $user, $pass, $base);
$sql   = "DELETE FROM `takeoff1_test`.`blocks` WHERE `id` = '$id' LIMIT 1";
$del = $connect->query($sql);

if ($del) {
    return "success";
}
