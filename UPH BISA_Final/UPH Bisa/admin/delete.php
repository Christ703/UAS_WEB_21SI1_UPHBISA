<?php
include '../function/info/info.php';
session_start();
// error_reporting(0);

$id_info = $_GET['id'];

findInfoById($id_info);
hapusInfo($id_info);

header ("location: events-admin.php");
?>