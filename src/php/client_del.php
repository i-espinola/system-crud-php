<?php
// SET CONFIG
include("config.php");

$id = $_POST['id'];

$connect = mysqli_connect($host, $user, $pass, $base);
$sql   = "DELETE FROM `takeoff1_test`.`clients` WHERE `id` = '$id' LIMIT 1";
$del = $connect->query($sql);
$connect->close();

if ($del) {
    echo json_encode(1);
} else {
    echo json_encode(0);
}
