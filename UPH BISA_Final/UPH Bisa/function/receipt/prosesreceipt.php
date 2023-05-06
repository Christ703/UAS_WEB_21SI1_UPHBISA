<?php
require "datareceipt.php";
require  '../info/info.php';

$action = $_REQUEST['action'];

if ($action=="Add"){
    $id_info = $_POST['id_info'];
    $id = $_POST['id'];
    $id_receipt = $_POST['id_receipt'];
    $jenis_benefit = $_POST['jenis_benefit'];
    $metode = $_POST['metode'];

    if ($jenis_benefit=="gold") {
        $x = findInfoById($id_info);
        $harga = $x['harga_gold'];
    }
    elseif ($jenis_benefit=="silver") {
        $x = findInfoById($id_info);
        $harga = $x['harga_silver'];
    }
    elseif ($jenis_benefit=="bronze") {
        $x = findInfoById($id_info);
        $harga = $x['harga_bronze'];
    }
    tambahReceipt($id, $id_info, $jenis_benefit, $metode, $harga, $id_receipt);
}

// if ($action==""){
//     $id_info = $_POST['id_info'];
//     $id = $_POST['id'];
//     $jenis_benefit = $_POST['jenis_benefit'];
//     $metode = $_POST['metode'];

//     if ($jenis_benefit=="gold") {
//         $x = findInfoById($id_info);
//         $harga = $x['harga_gold'];
//     }
//     elseif ($jenis_benefit=="silver") {
//         $x = findInfoById($id_info);
//         $harga = $x['harga_silver'];
//     }
//     elseif ($jenis_benefit=="bronze") {
//         $x = findInfoById($id_info);
//         $harga = $x['harga_bronze'];
//     }
//     tambahReceipt($id, $id_info, $jenis_benefit, $metode, $harga);
// } 

?>